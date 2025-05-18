<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendence');
    }

    public function attendancel1()
{

    return view('L1_attendence');
}


    public function attendancel2()
    {
        return view('L2_attendence');
    }

    public function attendancel3()
    {
        return view('L3_attendence');
    }

    public function attendancel4()
    {
        return view('L4_attendence');
    }

    public function getAttendance(Request $request)
{
    $query = Student::leftJoin('attendance', function ($join) {
            $join->on('students.id', '=', 'attendance.student_id');
        })
        ->select('students.name', 'attendance.attendance_date', 'attendance.status', 'students.year');

    // Filter students by level if provided
    if ($request->has('year')) {
        $query->where('students.year', $request->year);
    }

    // If a date is provided, filter by that date
    if ($request->has('date')) {
        $query->whereDate('attendance.attendance_date', $request->date);
    }

    $attendanceRecords = $query->get();
    return response()->json($attendanceRecords);
}

public function getAttendanceLev2(Request $request)
{
    $query = Attendance::join('students', 'attendance.student_id', '=', 'students.id')
        ->where('students.year', 2) // Only fetch students in Year 2
        ->select('students.name', 'attendance.attendance_date', 'attendance.status');

    // If a date is provided, filter by the exact date
    if ($request->has('date') && !empty($request->date)) {
        $query->whereDate('attendance.attendance_date', $request->date);
    }

    $attendanceRecords = $query->get();
    return response()->json($attendanceRecords);
}

public function getAttendanceLev3(Request $request)
{
    $query = Attendance::join('students', 'attendance.student_id', '=', 'students.id')
        ->where('students.year', 3) // Fetch only Year 3 students
        ->select('students.name', 'attendance.attendance_date', 'attendance.status');

    if ($request->has('date') && !empty($request->date)) {
        $query->whereDate('attendance.attendance_date', $request->date);
    }

    return response()->json($query->get());
}

public function getAttendanceLev4(Request $request)
{
    $query = Attendance::join('students', 'attendance.student_id', '=', 'students.id')
        ->where('students.year', 4) // Fetch only Year 4 students
        ->select('students.name', 'attendance.attendance_date', 'attendance.status');

    if ($request->has('date') && !empty($request->date)) {
        $query->whereDate('attendance.attendance_date', $request->date);
    }

    return response()->json($query->get());
}



public function getAttendanceRate()
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $attendanceRates = [];

        $totalStudents = Student::count(); // Get total students

        for ($i = 0; $i < 5; $i++) { // Last 5 months
            $month = Carbon::now()->subMonths($i)->month;
            $year = Carbon::now()->subMonths($i)->year;

            $present = Attendance::whereMonth('attendance_date', $month)
                ->whereYear('attendance_date', $year)
                ->where('status', 'Present')
                ->count();

            // Calculate attendance rate considering total students
            $rate = $totalStudents > 0 ? round(($present / $totalStudents) * 100, 2) : 0;

            $attendanceRates[] = [
                'month' => $months[$month - 1],
                'rate' => $rate
            ];
        }

        $overallRate = count($attendanceRates) > 0 ? round(array_sum(array_column($attendanceRates, 'rate')) / count($attendanceRates), 2) : 0;
        $change = count($attendanceRates) > 1 ? round($attendanceRates[0]['rate'] - $attendanceRates[1]['rate'], 2) : 0;

        return response()->json([
            'overallRate' => $overallRate,
            'change' => $change,
            'monthlyRates' => array_reverse($attendanceRates), // Reverse to start from oldest month
        ]);
    }



}
