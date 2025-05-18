<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Dashboard - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('/css/all_min.css') }}">
    <link rel="stylesheet" href="{{ url('/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ url('/css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="login-card">
        <h2>Smart Dashboard Login</h2>

        <!-- Display Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <strong>Error!</strong> {{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Login</button>
            <p class="mt-3 text-center">
                <a href="{{ route('forgot.password') }}" class="forgot-password">Forgot Password?</a>
            </p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
