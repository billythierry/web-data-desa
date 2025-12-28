<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* RESET AGAR RAPI DAN SIMETRIS */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #dfe7f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/desaloginreg.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }

        .login-container {
            background: white;
            width: 450px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 8px 18px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
            position: relative; /* Penting untuk icon */
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            /* Padding kanan lebih besar agar teks tidak nabrak icon */
            padding-right: 45px; 
            border: 1px solid #85D18F;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        /* Style Icon Mata */
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 14px; /* Sesuaikan agar pas tengah vertikal input */
            cursor: pointer;
            color: #777;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            background: #3fb682;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #34a371;
        }

        .forgot {
            display: block;
            margin-top: -10px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #4080ff;
            text-decoration: none;
            text-align: right;
        }

        .register {
            margin-top: 20px;
            font-size: 14px;
        }

        .register a {
            color: #4080ff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-title">MASUK</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required autofocus>
                @error('email')
                    <div style="color:red; font-size:12px;">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <input type="password" name="password" id="passwordInput" placeholder="Password" required>
                
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fas fa-eye" id="eyeIcon"></i>
                </span>

                @error('password')
                    <div style="color:red; font-size:12px;">{{ $message }}</div>
                @enderror
            </div>

            <!-- <a class="forgot" href="#">lupa password?</a> -->

            <button type="submit" class="login-btn">MASUK</button>

            <div class="register">
                Belum punya akun? <a href="{{ route('register') }}">Buat akun</a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("passwordInput");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>
</html>