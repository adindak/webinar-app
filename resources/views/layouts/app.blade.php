<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .glass-effect {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .rainbow-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #38bdf8, #06b6d4, #0284c7, #0ea5e9, #3b82f6);
            background-size: 300% 100%;
            animation: rainbowMove 3s ease-in-out infinite;
        }
        
        @keyframes rainbowMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .floating-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 1s; }
        .particle:nth-child(3) { width: 3px; height: 3px; left: 60%; animation-delay: 2s; }
        .particle:nth-child(4) { width: 5px; height: 5px; left: 80%; animation-delay: 3s; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>

<body class="font-sans antialiased bg-gradient-to-br from-sky-400 via-blue-500 to-cyan-600 min-h-screen">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            @include('layouts.navbar')
            
            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
            
            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        // Theme toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const body = document.body;
            let isDark = false;
            
            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    isDark = !isDark;
                    
                    // Update toggle visual state
                    const toggleSlider = themeToggle.querySelector('div');
                    if (isDark) {
                        // Dark mode
                        themeToggle.classList.remove('bg-gradient-to-r', 'from-amber-400', 'to-yellow-400');
                        themeToggle.classList.add('bg-gradient-to-r', 'from-slate-600', 'to-slate-700');
                        toggleSlider.classList.add('translate-x-7');
                        toggleSlider.innerHTML = '🌙';
                        
                        // Change background
                        body.className = body.className.replace(
                            'bg-gradient-to-br from-sky-400 via-blue-500 to-cyan-600',
                            'bg-gradient-to-br from-slate-800 via-blue-900 to-gray-900'
                        );
                    } else {
                        // Light mode
                        themeToggle.classList.remove('bg-gradient-to-r', 'from-slate-600', 'to-slate-700');
                        themeToggle.classList.add('bg-gradient-to-r', 'from-amber-400', 'to-yellow-400');
                        toggleSlider.classList.remove('translate-x-7');
                        toggleSlider.innerHTML = '☀️';
                        
                        // Change background
                        body.className = body.className.replace(
                            'bg-gradient-to-br from-slate-800 via-blue-900 to-gray-900',
                            'bg-gradient-to-br from-sky-400 via-blue-500 to-cyan-600'
                        );
                    }
                });
            }
            
            // Mobile menu toggle
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const sidebar = document.getElementById('sidebar');
            
            if (mobileMenuToggle && sidebar) {
                mobileMenuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
            
            // Profile dropdown functionality
            const profileDropdown = document.querySelector('.admin-profile');
            const dropdownMenu = profileDropdown ? profileDropdown.querySelector('.dropdown-menu') : null;
            
            if (profileDropdown && dropdownMenu) {
                const profileButton = profileDropdown.querySelector('[data-bs-toggle="dropdown"], .dropdown-toggle');
                
                if (profileButton) {
                    // Toggle dropdown on click
                    profileButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const isVisible = !dropdownMenu.classList.contains('opacity-0');
                        
                        if (isVisible) {
                            // Hide dropdown
                            dropdownMenu.classList.add('opacity-0', 'invisible', 'translate-y-2');
                            dropdownMenu.classList.remove('opacity-100', 'visible', 'translate-y-0');
                        } else {
                            // Show dropdown
                            dropdownMenu.classList.remove('opacity-0', 'invisible', 'translate-y-2');
                            dropdownMenu.classList.add('opacity-100', 'visible', 'translate-y-0');
                        }
                    });
                }
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!profileDropdown.contains(e.target)) {
                        dropdownMenu.classList.add('opacity-0', 'invisible', 'translate-y-2');
                        dropdownMenu.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    }
                });
                
                // Close dropdown on escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        dropdownMenu.classList.add('opacity-0', 'invisible', 'translate-y-2');
                        dropdownMenu.classList.remove('opacity-100', 'visible', 'translate-y-0');
                    }
                });
            }
        });
        
        // Fullscreen functionality
        function toggleFullscreen() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        }
    </script>
</body>
</html>