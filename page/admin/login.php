<!-- <?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/tanah_blambangan/config/koneksi.php';

$database = new Database();
$koneksi = $database->getConnection();

if (isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
?>

<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Tanah Blambangan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            min-height: 100vh;
            background:
            linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
            url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1400&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card{
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 8px 32px rgba(0,0,0,0.25);
            color: white;
        }

        .logo{
            width: 80px;
            height: 80px;
            background: white;
            color: #198754;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .login-title{
            text-align: center;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .login-subtitle{
            text-align: center;
            font-size: 14px;
            color: rgba(255,255,255,0.8);
            margin-bottom: 30px;
        }

        .form-label{
            font-weight: 500;
        }

        .form-control{
            height: 50px;
            border-radius: 12px;
            border: none;
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .form-control:focus{
            background: rgba(255,255,255,0.2);
            color: white;
            box-shadow: none;
            border: 1px solid #198754;
        }

        .form-control::placeholder{
            color: rgba(255,255,255,0.7);
        }

        .input-group-text{
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            border-radius: 12px 0 0 12px;
        }

        .btn-login{
            height: 50px;
            border-radius: 12px;
            font-weight: 600;
            background: #198754;
            border: none;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #157347;
            transform: translateY(-2px);
        }

        .footer-text{
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: rgba(255,255,255,0.7);
        }

        @media(max-width: 576px){

            .login-card{
                margin: 20px;
                padding: 30px 25px;
            }

        }

    </style>
</head>
<body>

    <div class="login-card">

        <div class="logo">
            <i class="fas fa-map-marked-alt"></i>
        </div>

        <h2 class="login-title">
            Admin Login
        </h2>

        <p class="login-subtitle">
            Tanah Blambangan Dashboard
        </p>

        <form action="proses_login.php" method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Username
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan username"
                        required
                    >

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                </div>

            </div>

            <button
                type="submit"
                name="login"
                class="btn btn-success btn-login w-100"
            >
                <i class="fas fa-sign-in-alt me-2"></i>
                Login
            </button>

        </form>

        <div class="footer-text">
            © 2026 Tanah Blambangan
        </div>

    </div>

</body>
</html>