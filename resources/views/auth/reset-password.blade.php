<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password - Coffee Finder</title>

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
                linear-gradient(rgba(0, 0, 0, .55),
                    rgba(0, 0, 0, .55)),
                url('https://images.unsplash.com/photo-1509042239860-f550ce710b93') center/cover no-repeat;

            height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* CARD */
        .box {
            width: 400px;

            padding: 40px;

            border-radius: 24px;

            background: rgba(255, 255, 255, .12);

            backdrop-filter: blur(18px);

            box-shadow:
                0 10px 40px rgba(0, 0, 0, 0.45),
                inset 0 0 10px rgba(255, 255, 255, 0.1);

            color: white;

            text-align: center;
        }

        /* TITLE */
        .title {
            font-size: 30px;
            font-weight: 700;

            margin-bottom: 30px;
        }

        .title span {
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

            background: rgba(255, 255, 255, .2);

            color: white;

            font-size: 14px;

            transition: 0.3s;
        }

        .input-group input:focus {
            background: rgba(255, 255, 255, .28);

            box-shadow: 0 0 12px rgba(255, 210, 141, .35);
        }

        .input-group input::placeholder {
            color: #ddd;
        }

        /* BUTTON */
        .btn {
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

            box-shadow: 0 6px 18px rgba(0, 0, 0, .3);
        }

        .btn:hover {
            transform: translateY(-3px);

            background: #4b2e2e;
        }

        /* BACK BUTTON */
        .btn-back {
            display: inline-block;

            margin-top: 18px;

            color: #ffd28d;

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            transition: 0.3s;
        }

        .btn-back:hover {
            text-decoration: underline;
        }

        /* MOBILE */
        @media(max-width:480px) {

            .box {
                width: 92%;
                padding: 30px;
            }

            .title {
                font-size: 26px;
            }
        }
    </style>

</head>

<body>

    <div class="box">

        <h2 class="title">
            🔒 Reset <span>Password</span>
        </h2>

        <form action="{{ route('reset.password.post', $user->id) }}" method="POST">

            @csrf

            <div class="input-group">

                <input type="password" name="password" placeholder="Masukkan Password Baru" required>

            </div>

            <div class="input-group">

                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru" required>

            </div>

            <button type="submit" class="btn">

                Simpan Password Baru

            </button>

        </form>

        <!-- BUTTON KEMBALI -->
        <a href="/forgot-password" class="btn-back">

            ← Kembali ke Lupa Password

        </a>

    </div>

</body>

</html>