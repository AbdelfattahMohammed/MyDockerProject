<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Dashboard - Forgot Password</title>
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
            background: rgba(0, 0, 0, 0.5); /* Dark semi-transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px); /* Blurred background effect */
        }

        /* Floating form */
        .reset-card {
            max-width: 400px;
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Floating effect */
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Smooth fade-in effect */
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
            <h2 class="text-center">Forgot Password</h2>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> <strong>Error!</strong> {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('send.reset.code') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="resetEmail" class="form-label"><i class="fas fa-envelope"></i> Enter your email</label>
                    <input type="email" id="resetEmail" name="email" class="form-control" placeholder="Enter your email" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Send Code</button>
            </form>

            <p class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
