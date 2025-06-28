<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Golden English</title>

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
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        /* Glass effect for login card */
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
            padding: 16px 20px;
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
            margin-bottom: 24px;
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
    </div>

    <!-- Main Content -->
    <div class="min-vh-100 d-flex align-items-center justify-content-center position-relative" style="z-index: 10;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <!-- Login Card -->
                    <div class="glass-card rounded-4 p-5">
                        <!-- Logo -->
                        <div class="logo-container">
                            <i class="fas fa-crown text-white" style="font-size: 32px;"></i>
                        </div>
                        
                        <!-- Header -->
                        <div class="text-center mb-5">
                            <h1 class="h3 fw-bold text-dark mb-2">
                                Welcome to <span class="text-gradient">Golden English</span>
                            </h1>
                            <p class="text-muted mb-0">
                                Masuk untuk mengakses webinar terbaik dan tingkatkan kemampuan bahasa Inggris Anda
                            </p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            
                            <!-- Email Field -->
                            <div class="form-group">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autofocus 
                                       autocomplete="username" 
                                       placeholder="Masukkan email Anda">
                                <label class="form-label">Email Address</label>
                                @error('email')
                                    <div class="text-danger mt-2 small">
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
                                       autocomplete="current-password"
                                       placeholder="Masukkan password Anda">
                                <label class="form-label">Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                                @error('password')
                                    <div class="text-danger mt-2 small">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                                    <label class="form-check-label text-muted" for="remember_me">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn-primary w-100 text-white border-0 mb-5">
                                <span class="login-text">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Sign In
                                </span>
                                <span class="loading-text d-none">
                                    <div class="loading-spinner me-2"></div>
                                    Signing in...
                                </span>
                            </button>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Belum punya akun? 
                                    <a href="{{ route('register') }}" 
                                       class="fw-semibold text-decoration-none"
                                       style="color: #f59e0b;">
                                        Daftar sekarang
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
        // Password toggle function
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

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const loginText = submitBtn.querySelector('.login-text');
            const loadingText = submitBtn.querySelector('.loading-text');
            
            // Show loading state
            loginText.classList.add('d-none');
            loadingText.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Reset after 3 seconds if form validation fails
            setTimeout(() => {
                if (document.querySelector('.is-invalid')) {
                    loginText.classList.remove('d-none');
                    loadingText.classList.add('d-none');
                    submitBtn.disabled = false;
                }
            }, 100);
        });

        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.5s ease';
                    setTimeout(function() {
                        alert.remove();
                    }, 500);
                }, 5000);
            });
        });

        // Form validation enhancement
        const inputs = document.querySelectorAll('input[required]');
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

        // Smooth animations on load
        window.addEventListener('load', function() {
            document.querySelector('.glass-card').style.animation = 'fadeInUp 0.6s ease-out';
        });
    </script>

    <!-- Link Of JS File -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>