<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Coffee Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;

            background:
                linear-gradient(rgba(0, 0, 0, 0.55),
                    rgba(0, 0, 0, 0.55)),
                url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085') center/cover no-repeat;

            height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* CARD */
        .register-box {
            width: 400px;

            padding: 40px;

            border-radius: 24px;

            background: rgba(255, 255, 255, 0.12);

            backdrop-filter: blur(18px);

            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.45),
                inset 0 0 10px rgba(255, 255, 255, 0.1);

            text-align: center;

            color: white;
        }

        /* TITLE */
        .register-title {
            font-size: 32px;
            font-weight: 700;

            margin-bottom: 30px;
        }

        .register-title span {
            color: #ffd28d;
        }

        /* INPUT */
        .input-group {
            margin-bottom: 18px;
        }

        .input-group input {
            width: 100%;

            padding: 14px 16px;

            border: none;
            outline: none;

            border-radius: 14px;

            background: rgba(255, 255, 255, 0.2);

            color: white;

            font-size: 14px;

            transition: 0.3s;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, 0.28);

            box-shadow: 0 0 12px rgba(255, 210, 141, 0.35);
        }

        .input-group input::placeholder {
            color: #e0e0e0;
        }

        /* BUTTON */
        .btn-register {
            width: 100%;

            padding: 14px;

            border: none;
            border-radius: 14px;

            background: linear-gradient(135deg, #6f4e37, #a67b5b);

            color: white;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.3s;

            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-3px);

            background: #4b2e2e;
        }

        /* ERROR */
        .error-box {
            margin-bottom: 18px;

            padding: 12px 14px;

            border-radius: 12px;

            background: rgba(255, 0, 0, 0.12);

            text-align: left;

            font-size: 14px;

            color: #ffcccc;
        }

        .error-box div {
            margin-bottom: 4px;
        }

        /* LINK */
        .link {
            margin-top: 18px;

            font-size: 14px;
        }

        .link a {
            color: #ffd28d;

            text-decoration: none;

            font-weight: 600;

            transition: 0.3s;
        }

        .link a:hover {
            text-decoration: underline;
        }

        /* MOBILE */
        @media(max-width:480px) {

            .register-box {
                width: 92%;
                padding: 30px;
            }

            .register-title {
                font-size: 28px;
            }
        }
    </style>

</head>

<body>

    <div class="register-box">

        <h2 class="register-title">
            Coffee <span>Finder</span>
        </h2>

        @if($errors->any())
            <div class="error-box">

                @foreach($errors->all() as $error)

                    <div>• {{ $error }}</div>

                @endforeach

            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="input-group">
                <input type="text" name="name" placeholder="Masukkan Nama" required>
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn-register">
                Daftar Sekarang
            </button>

        </form>

        <div class="link">

            Sudah punya akun?

            <a href="/login">
                Login di sini
            </a>

        </div>

    </div>

</body>

</html>