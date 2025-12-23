<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Inventory Skincare</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;

            background:
                linear-gradient(
                    rgba(248, 182, 210, 0.75),
                    rgba(214, 51, 132, 0.75)
                ),
                url("{{ asset('images/bg-login.jpeg') }}");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-card {
            width: 380px;
            background: rgba(255, 255, 255, 0.95);
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            backdrop-filter: blur(8px);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #f8b6d2;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-pink {
            background-color: #f06292;
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
        }

        .btn-pink:hover {
            background-color: #ec407a;
        }

        .text-pink {
            color: #ec407a;
        }
    </style>
</head>

<body>

<div class="login-card text-center">

    <!-- LOGO -->
    <img src="{{ asset('images/logo.jpeg') }}" class="logo" alt="Logo">

    <h4 class="text-pink fw-bold mb-1">Inventory Skincare</h4>
    <p class="text-muted mb-4">Silakan login untuk melanjutkan</p>

    <!-- ERROR -->
    @if ($errors->any())
        <div class="alert alert-danger text-start">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- FORM LOGIN -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3 text-start">
            <label class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
        </div>

        <div class="mb-3 text-start">
            <label class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-pink">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </div>
    </form>

</div>

</body>
</html>
