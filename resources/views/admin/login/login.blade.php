<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Portfolio Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #e0e7ff, #f3e8ff);
            overflow: hidden;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.2), transparent);
            animation: subtle-glow 8s linear infinite;
            transform: rotate(45deg);
            z-index: -1;
        }

        @keyframes subtle-glow {
            0% { transform: translateX(-50%) rotate(45deg); }
            100% { transform: translateX(50%) rotate(45deg); }
        }

        h2 {
            color: #1e3a8a;
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-label {
            color: #4b5563;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 1rem;
            color: #1f2937;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            outline: none;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .btn-primary {
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .error-message {
            color: #dc2626;
            font-size: 0.85rem;
            text-align: center;
            margin-top: 1rem;
            display: block;
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-right: none;
            border-radius: 8px 0 0 8px;
            color: #6b7280;
        }

        .form-control {
            border-left: none;
            border-radius: 0 8px 8px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <h2>Sign In</h2>
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            @if (session('error'))
                <span class="error-message">{{ session('error') }}</span>
            @endif
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
