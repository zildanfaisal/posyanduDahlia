<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .login-container {
            width: 300px;
            padding: 30px;
            background-color: #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 100px;
            height: 100px;
            background-color: #d6d6d6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border-radius: 8px;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <div class="logo" style="margin-bottom: 70px">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 200px; height:auto;">
        </div>
        <div class="login-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Username"
                        name="username"
                        id="name"
                        required>
                        @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <div class="mb-3">
                    <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        name="password"
                        id="password"
                        required>
                        @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>