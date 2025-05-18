<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Dashboard - Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('/css/all_min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ url('/css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Background overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px); /* Blurred effect */
        }

        /* Floating reset form */
        .reset-card {
            max-width: 400px;
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Floating effect */
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

</head>

<body>

    <div class="overlay">
        <div class="reset-card">
            <h2 class="text-center">Reset Password</h2>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <strong>Error!</strong> {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('reset.password') }}" method="post">
                @csrf
                <input type="hidden" name="email" value="{{ session('reset_email') }}">

                <div class="mb-3">
                    <label for="newPassword" class="form-label"><i class="fas fa-lock"></i> New Password</label>
                    <input type="password" id="newPassword" name="password" class="form-control" placeholder="New Password" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label"><i class="fas fa-check"></i> Confirm New Password</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Reset Password</button>
            </form>

            <p class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
