<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AdminLTE Style</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    
    <style>
        body {
            /* Warna latar belakang AdminLTE/Bootstrap */
            background-color: #f4f6f9; 
            font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-box {
            width: 360px; /* Lebar standar kotak login AdminLTE */
        }
        .card {
            /* Shadow ringan khas AdminLTE */
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
            border: 0; /* Hilangkan border Bootstrap default */
        }
        .btn-primary {
            /* Ganti warna primary jika AdminLTE kamu menggunakan biru yang berbeda */
            background-color: #007bff; 
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-center mb-4">Login untuk memulai sesi Anda</p>

                <form action="/loginProcess" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" 
                               placeholder="Email" required value="{{ old('email') }}">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span> </div>
                        
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" 
                               placeholder="Password" required>
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span> </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                           
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
                        </div>
                        </div>
                </form>
                <p class="mb-0">
                    <a href="/register" class="text-center">Daftar Akun Baru</a>
                </p>
            </div>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>
</html>