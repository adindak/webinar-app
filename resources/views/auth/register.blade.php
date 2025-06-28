<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Golden English</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Links Of CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 50%, #581c87 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Background Elements */
        .bg-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 1;
        }
        
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 15%;
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 25%;
            left: 20%;
            animation-delay: 4s;
        }
        
        .floating-element:nth-child(4) {
            width: 100px;
            height: 100px;
            bottom: 15%;
            right: 10%;
            animation-delay: 1s;
        }
        
        .floating-element:nth-child(5) {
            width: 50px;
            height: 50px;
            top: 50%;
            left: 5%;
            animation-delay: 3s;
        }
        
        .floating-element:nth-child(6) {
            width: 70px;
            height: 70px;
            top: 70%;
            right: 25%;
            animation-delay: 2.5s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        /* Glass effect for register card */
        .glass-card {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Form styling */
        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #f59e0b;
            box-shadow: 0 0 0 4px rgba(245, 158, 11, 0.1);
            outline: none;
        }
        
        .form-control::placeholder {
            color: rgba(107, 114, 128, 0.7);
        }
        
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px 12px;
            padding-right: 40px;
        }
        
        /* Button styling */
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            border: none;
            border-radius: 12px;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            border-radius: 12px;
            padding: 16px 24px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.4);
        }
        
        /* Logo styling */
        .logo-container {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 35px rgba(245, 158, 11, 0.3);
            margin: 0 auto 24px;
        }
        
        /* Text gradient */
        .text-gradient {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Alert styling */
        .alert {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #166534;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #dc2626;
        }
        
        /* Loading animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 2px solid #ffffff;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .glass-card {
                margin: 20px;
                padding: 32px 24px;
            }
            
            .floating-element {
                display: none;
            }
        }
        
        /* Input focus animation */
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        
        .form-label {
            position: absolute;
            left: 20px;
            top: 16px;
            color: #6b7280;
            font-weight: 500;
            transition: all 0.3s ease;
            pointer-events: none;
            background: rgba(255, 255, 255, 0.9);
            padding: 0 8px;
            border-radius: 4px;
        }
        
        .form-control:focus + .form-label,
        .form-control:not(:placeholder-shown) + .form-label {
            top: -8px;
            font-size: 12px;
            color: #f59e0b;
            font-weight: 600;
        }
        
        /* Special handling for select dropdown */
        .form-select + .form-label {
            top: -8px;
            font-size: 12px;
            color: #f59e0b;
            font-weight: 600;
        }
        
        .form-select:invalid + .form-label {
            color: #6b7280;
            font-weight: 500;
        }
        
        .form-control::placeholder {
            opacity: 0;
        }
        
        .form-control:focus::placeholder {
            opacity: 1;
        }
        
        /* Password toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #f59e0b;
            background: rgba(245, 158, 11, 0.1);
        }
        
        /* Form validation */
        .is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
        }
        
        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
        }
        
        /* Grid layout for form */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Background Elements -->
    <div class="bg-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <!-- Main Content -->
    <div class="min-vh-100 d-flex align-items-center justify-content-center position-relative py-5" style="z-index: 10;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <!-- Register Card -->
                    <div class="glass-card rounded-4 p-5">
                        <!-- Logo -->
                        <div class="logo-container">
                            <i class="fas fa-user-plus text-white" style="font-size: 32px;"></i>
                        </div>
                        
                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h1 class="h3 fw-bold text-dark mb-2">
                                Join <span class="text-gradient">Golden English</span>
                            </h1>
                            <p class="text-muted mb-0">
                                Daftar sekarang dan mulai perjalanan pembelajaran bahasa Inggris terbaik Anda
                            </p>
                        </div>

                        <!-- Register Form -->
                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf
                            
                            <!-- Name and Email Row -->
                            <div class="form-row">
                                <!-- Full Name Field -->
                                <div class="form-group">
                                    <input type="text" 
                                           class="form-control @error('fullname') is-invalid @enderror" 
                                           name="fullname" 
                                           value="{{ old('fullname') }}"
                                           required 
                                           autofocus 
                                           placeholder="Masukkan nama lengkap Anda">
                                    <label class="form-label">Nama Lengkap</label>
                                    @error('fullname')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           required 
                                           autocomplete="username" 
                                           placeholder="Masukkan alamat email Anda">
                                    <label class="form-label">Alamat Email</label>
                                    @error('email')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone and Domicile Row -->
                            <div class="form-row">
                                <!-- Phone Field -->
                                <div class="form-group">
                                    <input type="tel" 
                                           class="form-control @error('phone_number') is-invalid @enderror" 
                                           name="phone_number" 
                                           value="{{ old('phone_number') }}"
                                           required 
                                           placeholder="Masukkan nomor telepon Anda">
                                    <label class="form-label">Nomor Telepon</label>
                                    @error('phone_number')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Domicile Field -->
                                <div class="form-group">
                                    <input type="text" 
                                           class="form-control @error('domisili') is-invalid @enderror" 
                                           name="domisili" 
                                           value="{{ old('domisili') }}"
                                           required 
                                           placeholder="Masukkan domisili Anda">
                                    <label class="form-label">Domisili</label>
                                    @error('domisili')
                                        <div class="error-message">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Field -->
                            <div class="form-group">
                                <label class="text-muted fw-semibold mb-2 d-block" style="font-size: 14px;">Status</label>
                                <select class="form-control form-select @error('status') is-invalid @enderror" 
                                        name="status" 
                                        required
                                        style="color: #6b7280;">
                                    <option value="" disabled selected style="font-size: 14px; color: #9ca3af;">Pilih Status Anda</option>
                                    <option value="murid" {{ old('status') == 'murid' ? 'selected' : '' }} style="color: #374151;">
                                        🎓 Murid/Siswa
                                    </option>
                                    <option value="guru" {{ old('status') == 'guru' ? 'selected' : '' }} style="color: #374151;">
                                        👨‍🏫 Guru/Pengajar
                                    </option>
                                    <option value="pembina" {{ old('status') == 'pembina' ? 'selected' : '' }} style="color: #374151;">
                                        👔 Pembina/Mentor
                                    </option>
                                </select>
                                @error('status')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="form-group position-relative">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       id="password"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Buat password yang kuat">
                                <label class="form-label">Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                                @error('password')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group position-relative">
                                <input type="password" 
                                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       name="password_confirmation" 
                                       id="password_confirmation"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Konfirmasi password Anda">
                                <label class="form-label">Konfirmasi Password</label>
                                <button type="button" class="password-toggle" onclick="togglePasswordConfirm()">
                                    <i class="fas fa-eye" id="toggleIconConfirm"></i>
                                </button>
                                @error('password_confirmation')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="form-group">
                                <div class="form-check d-flex align-items-start">
                                    <input class="form-check-input mt-1 me-3" type="checkbox" id="terms" required>
                                    <label class="form-check-label text-muted small" for="terms">
                                        Saya menyetujui <a href="#" class="text-decoration-none fw-semibold" style="color: #f59e0b;">Syarat & Ketentuan</a> 
                                        dan <a href="#" class="text-decoration-none fw-semibold" style="color: #f59e0b;">Kebijakan Privasi</a> 
                                        Golden English
                                    </label>
                                </div>
                            </div>

                            <!-- Hidden Field -->
                            <input type="hidden" name="hidden_link" id="hidden_link" value="">

                            <!-- Register Button -->
                            <button type="submit" class="btn-primary w-100 text-white border-0 mb-4">
                                <span class="register-text">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Daftar Sekarang
                                </span>
                                <span class="loading-text d-none">
                                    <div class="loading-spinner me-2"></div>
                                    Mendaftarkan...
                                </span>
                            </button>

                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Sudah punya akun? 
                                    <a href="{{ route('login') }}" 
                                       class="fw-semibold text-decoration-none"
                                       style="color: #f59e0b;">
                                        Masuk sekarang
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Back to Home -->
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" 
                           class="btn-secondary text-white text-decoration-none d-inline-flex align-items-center px-4 py-2">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Password toggle functions
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.className = 'fas fa-eye-slash';
            } else {
                passwordField.type = 'password';
                toggleIcon.className = 'fas fa-eye';
            }
        }

        function togglePasswordConfirm() {
            const passwordField = document.getElementById('password_confirmation');
            const toggleIcon = document.getElementById('toggleIconConfirm');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.className = 'fas fa-eye-slash';
            } else {
                passwordField.type = 'password';
                toggleIcon.className = 'fas fa-eye';
            }
        }

        // Form submission with loading state
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const registerText = submitBtn.querySelector('.register-text');
            const loadingText = submitBtn.querySelector('.loading-text');
            
            // Show loading state
            registerText.classList.add('d-none');
            loadingText.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Reset after 3 seconds if form validation fails
            setTimeout(() => {
                if (document.querySelector('.is-invalid')) {
                    registerText.classList.remove('d-none');
                    loadingText.classList.add('d-none');
                    submitBtn.disabled = false;
                }
            }, 100);
        });

        // Form validation enhancement
        const inputs = document.querySelectorAll('input[required], select[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
            
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid') && this.value.trim() !== '') {
                    this.classList.remove('is-invalid');
                }
            });
        });

        // Password confirmation validation
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');

        function validatePasswordMatch() {
            if (passwordConfirm.value !== '' && password.value !== passwordConfirm.value) {
                passwordConfirm.classList.add('is-invalid');
                // Add error message if not exists
                if (!passwordConfirm.parentNode.querySelector('.error-message')) {
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'error-message';
                    errorDiv.innerHTML = '<i class="fas fa-exclamation-circle me-1"></i>Password tidak sama';
                    passwordConfirm.parentNode.appendChild(errorDiv);
                }
            } else {
                passwordConfirm.classList.remove('is-invalid');
                // Remove error message if exists
                const errorMsg = passwordConfirm.parentNode.querySelector('.error-message');
                if (errorMsg && !passwordConfirm.classList.contains('is-invalid')) {
                    errorMsg.remove();
                }
            }
        }

        password.addEventListener('input', validatePasswordMatch);
        passwordConfirm.addEventListener('input', validatePasswordMatch);

        // Smooth animations on load
        window.addEventListener('load', function() {
            document.querySelector('.glass-card').style.animation = 'fadeInUp 0.6s ease-out';
        });
    </script>

    <!-- Link Of JS File -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>