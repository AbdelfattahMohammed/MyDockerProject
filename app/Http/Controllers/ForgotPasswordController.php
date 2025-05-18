<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Mail\ResetCodeMail;

class ForgotPasswordController extends Controller
{
    /**
     * Show Forgot Password Form
     */
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    /**
     * Handle Sending Reset Code
     */
    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $resetCode = rand(100000, 999999); // Generate a 6-digit code

        // Store reset code in the database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => Hash::make($resetCode), 'created_at' => now()]
        );


        // Send email with reset code
        Mail::to($request->email)->send(new ResetCodeMail($resetCode));

        Session::put('reset_email', $request->email);

        return redirect()->route('verify.code.form')->with('success', 'Reset code sent to your email.');
    }

    /**
     * Show Verify Reset Code Form
     */
    public function showVerifyResetCodeForm()
    {
        return view('verify-reset-code');
    }

    /**
     * Handle Reset Code Verification
     */
    public function verifyResetCode(Request $request)
    {
        $request->validate([
            'reset_code' => 'required|digits:6'
        ]);


        $resetData = DB::table('password_reset_tokens')
            ->where('email', Session::get('reset_email'))
            ->first();

        if (!$resetData || !Hash::check($request->reset_code, $resetData->token)) {
            return back()->withErrors(['reset_code' => 'Invalid or expired reset code.']);
        }


        return redirect()->route('reset.password')->with('success', 'Reset code verified. You can now reset your password.');
    }

    /**
     * Show Reset Password Form
     */
    public function showResetPasswordForm()
    {
        return view('reset-password');
    }

    /**
     * Handle Password Reset
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('email', Session::get('reset_email'))->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        // Remove the reset record
        DB::table('password_reset_tokens')->where('email', Session::get('reset_email'))->delete();
        Session::forget('reset_email');

        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }
}

























// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Hash;
// use App\Models\User;

// class ForgotPasswordController extends Controller
// {
//     public function sendResetCode(Request $request)
//     {
//         $request->validate(['email' => 'required|email']);

//         $user = User::where('email', $request->email)->first();
//         if (!$user) {
//             return response()->json(['success' => false], 404);
//         }

//         $code = rand(100000, 999999);
//         DB::table('password_reset_tokens')->updateOrInsert(
//             ['email' => $request->email],
//             ['token' => $code, 'created_at' => now()]
//         );

//         // Send email
//         Mail::raw("Your password reset code is: $code", function ($message) use ($request) {
//             $message->to($request->email)->subject("Password Reset Code");
//         });

//         return response()->json(['success' => true]);
//     }

//     public function verifyResetCode(Request $request)
//     {
//         $request->validate(['code' => 'required']);

//         $tokenData = DB::table('password_reset_tokens')->where('token', $request->code)->first();
//         if (!$tokenData) {
//             return response()->json(['success' => false], 400);
//         }

//         return response()->json(['success' => true]);
//     }

//     public function resetPassword(Request $request)
// {
//     $request->validate([
//         'password' => ['required', 'string', 'min:6', 'confirmed'],
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (!$user) {
//         return response()->json(['success' => false, 'message' => 'User not found!']);
//     }

//     $user->password = bcrypt($request->password); // Encrypt the password before saving
//     $user->save();

//     return response()->json(['success' => true, 'message' => 'Password reset successfully!']);
// }

// }
