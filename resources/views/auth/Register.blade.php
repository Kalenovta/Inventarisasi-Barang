<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AdminLTE Style</title>
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
        .register-box {
            width: 360px; /* Lebar standar kotak AdminLTE */
        }
        .card {
            /* Shadow ringan khas AdminLTE */
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
            border: 0; /* Hilangkan border Bootstrap default */
        }
        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }
        .input-group-text {
            /* Fix for icon width */
            width: 40px; 
            justify-content: center;
        }
    </style>
</head>
<body>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg text-center mb-4">Daftar akun baru</p>

                <form action="{{ route('registerProcess') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="name" id="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                        <div class="input-group-text">
                            <span class="fas fa-user"></span> </div>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span> </div>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Password" required>
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span> </div>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                               class="form-control @error('password_confirmation') is-invalid @enderror" 
                               placeholder="Ulangi Password" required>
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span> </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select name="role" id="role" 
                                class="form-control @error('role') is-invalid @enderror" 
                                required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="karyawan" {{ old('role') == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <div class="input-group-text">
                            <span class="fas fa-user-tag"></span> </div>
                        
                        @error('role')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block w-100">Register</button>
                        </div>
                        </div>
                </form>
                
                <p class="mb-0 mt-3 text-center">
                    <a href="/login" class="text-center">sudah punya akun?</a>
                </p>
            </div>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>
</html>