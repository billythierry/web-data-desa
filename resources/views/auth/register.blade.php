<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        *{
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

        .register-container {
            background: white;
            width: 450px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 8px 18px rgba(0,0,0,0.2);
            text-align: center;
        }

        .register-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
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
            border: 1px solid #b5c7d8;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        .error-text {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .register-btn {
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

        .register-btn:hover {
            background: #34a371;
        }

        .login-text {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-text a {
            color: #4080ff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-title">DAFTAR</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
                <label>Nama Depan</label>
                <input type="text" name="nama_depan" value="{{ old('nama_depan') }}" required>
                @error('nama_depan')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Nama Belakang</label>
                <input type="text" name="nama_belakang" value="{{ old('nama_belakang') }}" required>
                @error('nama_belakang')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" minlength="6" required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="register-btn">BUAT AKUN</button>

            <div class="login-text">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk disini</a>
            </div>
        </form>
    </div>

</body>
</html>
