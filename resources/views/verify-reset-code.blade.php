<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Reset Code</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Full-screen background overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px); /* Blurred background */
        }

        /* Floating window */
        .floating-box {
            max-width: 400px;
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Deeper shadow for floating effect */
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Fade-in effect */
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
        <div class="floating-box">
            <h2 class="text-center mb-4">Enter Reset Code</h2>
            <form action="{{ route('password.verifyResetCode') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="resetCode" class="form-label">Reset Code</label>
                    <input type="text" id="resetCode" name="reset_code" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Verify Code</button>
            </form>
        </div>
    </div>

</body>
</html>
