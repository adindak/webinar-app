{{-- resources/views/promosi.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Golden English - Webinar Bahasa Inggris Terbaik</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 50%, #581c87 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(245, 158, 11, 0.4);
        }

        /* Enhanced spacing system */
        section {
            position: relative;
            z-index: 1;
        }

        .section-spacing {
            padding-top: 8rem;
            padding-bottom: 8rem;
        }

        .section-spacing-large {
            padding-top: 10rem;
            padding-bottom: 10rem;
        }

        .card-container {
            margin-bottom: 2rem;
        }

        /* Mobile responsive breakpoints */
        @media (max-width: 1024px) {
            .section-spacing {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }
            
            .section-spacing-large {
                padding-top: 8rem;
                padding-bottom: 8rem;
            }
        }

        @media (max-width: 768px) {
            .section-spacing {
                padding-top: 5rem;
                padding-bottom: 5rem;
            }
            
            .section-spacing-large {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }
            
            .card-container {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 640px) {
            .section-spacing {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }
            
            .section-spacing-large {
                padding-top: 5rem;
                padding-bottom: 5rem;
            }
        }
    </style>
</head>

<body class="bg-gray-50 overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 glass-effect border-b border-gray-200/50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-crown text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-amber-500">Golden</span>
                        <span class="text-xl font-bold text-gray-800">English</span>
                    </div>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 px-4 py-2">Home</a>
                    <a href="#webinar" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 px-4 py-2">Webinar</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 px-4 py-2">About</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 px-4 py-2">Contact</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button onclick="toggleMobileMenu()" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
                
                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('register') }}" class="hidden sm:inline-flex px-4 py-2 text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200">
                        Daftar
                    </a>
                    <a href="{{ route('login') }}" class="btn-primary px-6 py-2 text-white rounded-full font-medium shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white/95 glass-effect border-t border-gray-200/50">
            <div class="px-4 py-6 flex flex-col gap-8">
                <a href="#home" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2">Home</a>
                <a href="#webinar" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2">Webinar</a>
                <a href="#about" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2">About</a>
                <a href="#contact" class="block text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 py-2">Contact</a>
                <div class="pt-4 border-t border-gray-200 flex flex-col gap-8">
                    <a href="{{ route('register') }}" class="block text-blue-600 hover:text-blue-700 font-medium transition-colors duration-200 py-2">
                        Daftar
                    </a>
                    <a href="{{ route('login') }}" class="btn-primary block text-center text-white px-6 py-3 rounded-full font-medium shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient min-h-screen flex items-center relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-4 sm:left-10 w-16 h-16 sm:w-20 sm:h-20 bg-white/10 rounded-full animate-float"></div>
            <div class="absolute top-40 right-4 sm:right-20 w-12 h-12 sm:w-16 sm:h-16 bg-white/10 rounded-full animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 left-1/4 w-8 h-8 sm:w-12 sm:h-12 bg-white/10 rounded-full animate-float" style="animation-delay: 4s;"></div>
        </div>
        
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 sm:pt-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center">
                <!-- Content -->
                <div class="text-white flex flex-col gap-8 text-center lg:text-left">
                    <div class="flex flex-col gap-8">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                            Master English with 
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">
                                Golden English
                            </span>
                        </h1>
                        <p class="text-base sm:text-lg md:text-xl text-white/90 leading-relaxed max-w-xl mx-auto lg:mx-0">
                            Bergabunglah dengan ribuan peserta dalam webinar bahasa Inggris terbaik. 
                            Tingkatkan kemampuan speaking, writing, dan listening dengan mentor berpengalaman.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#webinar" class="btn-secondary px-6 sm:px-8 py-3 sm:py-4 text-white rounded-full font-semibold text-center shadow-xl text-sm sm:text-base">
                            <i class="fas fa-play mr-2"></i>
                            Lihat Webinar
                        </a>
                        <a href="#about" class="px-6 sm:px-8 py-3 sm:py-4 bg-white/20 text-white rounded-full font-semibold hover:bg-white/30 transition-all duration-200 backdrop-blur-sm border border-white/30 text-center text-sm sm:text-base">
                            <i class="fas fa-info-circle mr-2"></i>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-8 max-w-md mx-auto lg:mx-0">
                        <div class="text-center flex flex-col gap-4">
                            <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-amber-400">{{ $totalWebinar ?? '1' }}</div>
                            <div class="text-white/80 font-medium text-xs sm:text-sm md:text-base">Webinar</div>
                        </div>
                        <div class="text-center flex flex-col gap-4">
                            <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-amber-400">{{ $totalParticipants ?? '1250' }}</div>
                            <div class="text-white/80 font-medium text-xs sm:text-sm md:text-base">Peserta</div>
                        </div>
                        <div class="text-center flex flex-col gap-4">
                            <div class="text-2xl sm:text-3xl md:text-4xl font-bold text-amber-400">4.9</div>
                            <div class="text-white/80 font-medium text-xs sm:text-sm md:text-base">Rating</div>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="relative mt-8 lg:mt-0 order-first lg:order-last">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="English Learning" 
                             class="rounded-2xl sm:rounded-3xl shadow-2xl w-full h-auto max-w-lg mx-auto lg:max-w-none">
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-4 -right-4 sm:-top-6 sm:-right-6 w-16 h-16 sm:w-24 sm:h-24 bg-amber-400 rounded-full opacity-20"></div>
                    <div class="absolute -bottom-4 -left-4 sm:-bottom-6 sm:-left-6 w-20 h-20 sm:w-32 sm:h-32 bg-orange-500 rounded-full opacity-20"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Webinar Section -->
    <section id="webinar" class="section-spacing-large bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 sm:mb-20">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 sm:mb-6">
                    Webinar <span class="text-gradient">Terpopuler</span>
                </h2>
                <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed px-4 sm:px-0">
                    Pilih webinar yang sesuai dengan level dan kebutuhan belajar bahasa Inggris Anda
                </p>
            </div>

            <!-- Webinar Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 mt-6 lg:grid-cols-3 gap-8 lg:gap-10">
                @forelse($webinars as $webinar)
                    <div class="bg-white rounded-2xl shadow-lg card-hover border border-gray-100 overflow-hidden card-container">
                        <!-- Image -->
                        <div class="relative h-48 sm:h-52 lg:h-56 bg-gradient-to-br from-blue-600 to-indigo-700 overflow-hidden">
                            @if($webinar->image)
                                <img src="{{ asset('storage/' . $webinar->image) }}" 
                                     alt="{{ $webinar->name }}" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/20"></div>
                            @else
                                <div class="absolute inset-0 bg-black/20"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="fas fa-video text-white text-3xl sm:text-4xl lg:text-5xl"></i>
                                </div>
                            @endif
                            
                            <!-- Price Badge -->
                            @if($webinar->price <= 0)
                                <div class="absolute top-3 left-3 sm:top-4 sm:left-4 bg-green-500 text-white px-3 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                    <i class="fas fa-gift mr-1"></i>FREE
                                </div>
                            @else
                                <div class="absolute top-3 left-3 sm:top-4 sm:left-4 bg-blue-600 text-white px-3 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                    Rp {{ number_format($webinar->price, 0, ',', '.') }}
                                </div>
                            @endif

                            <!-- Status Badge -->
                            @if(isset($webinar->status))
                                @if($webinar->status == 'upcoming')
                                    <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-amber-500 text-white px-3 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                        <i class="fas fa-clock mr-1"></i>Segera
                                    </div>
                                @elseif($webinar->status == 'ongoing')
                                    <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-red-500 text-white px-3 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                        <i class="fas fa-circle mr-1"></i>Live
                                    </div>
                                @elseif($webinar->status == 'completed')
                                    <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-gray-500 text-white px-3 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                        <i class="fas fa-check mr-1"></i>Selesai
                                    </div>
                                @endif
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="p-4 sm:p-6 lg:p-8 flex flex-col gap-4">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-800 line-clamp-2 min-h-[2.5rem] sm:min-h-[3.5rem]">
                                {{ $webinar->name }}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base line-clamp-3 min-h-[3.5rem] sm:min-h-[4.5rem] leading-relaxed">
                                {{ Str::limit($webinar->description, 120) }}
                            </p>
                            
                            <!-- Info List -->
                            <div class="flex flex-col gap-3">
                                @if($webinar->start_date)
                                    <div class="flex items-center text-xs sm:text-sm lg:text-base text-gray-600 gap-3">
                                        <i class="fas fa-calendar text-blue-500 w-4 sm:w-5 flex-shrink-0"></i>
                                        <span class="truncate">{{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMMM Y') }}</span>
                                    </div>
                                @endif
                                
                                @if($webinar->start_time)
                                    <div class="flex items-center text-xs sm:text-sm lg:text-base text-gray-600 gap-3">
                                        <i class="fas fa-clock text-green-500 w-4 sm:w-5 flex-shrink-0"></i>
                                        <span>{{ \Carbon\Carbon::parse($webinar->start_time)->format('H:i') }} WIB</span>
                                    </div>
                                @endif
                                
                                @if($webinar->place_location)
                                    <div class="flex items-center text-xs sm:text-sm lg:text-base text-gray-600 gap-3">
                                        <i class="fas fa-map-marker-alt text-red-500 w-4 sm:w-5 flex-shrink-0"></i>
                                        <span class="truncate">{{ $webinar->place_location }}</span>
                                    </div>
                                @endif
                                
                                <div class="flex items-center text-xs sm:text-sm lg:text-base text-gray-600 gap-3">
                                    <i class="fas fa-users text-purple-500 w-4 sm:w-5 flex-shrink-0"></i>
                                    <span>{{ $webinar->total_participants ?? '200' }} peserta</span>
                                </div>

                                @if(isset($webinar->category))
                                    <div class="flex items-center text-xs sm:text-sm lg:text-base text-gray-600 gap-3">
                                        <i class="fas fa-tag text-indigo-500 w-4 sm:w-5 flex-shrink-0"></i>
                                        <span class="truncate">{{ $webinar->category }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- CTA Button -->
                            <button onclick="openRegisterModal('{{ $webinar->id }}')" class="btn-primary w-full text-white py-2.5 sm:py-3 lg:py-4 rounded-xl font-semibold text-sm sm:text-base mt-2">
                                <i class="fas fa-user-plus mr-2"></i>
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                @empty
                    <!-- No Webinar Available Message -->
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-video text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Webinar Tersedia</h3>
                        <p class="text-gray-600 mb-6">Webinar terbaru akan segera hadir. Pantau terus halaman ini untuk update terbaru!</p>
                        <a href="#contact" class="btn-primary inline-flex items-center px-6 py-3 text-white rounded-xl font-semibold">
                            <i class="fas fa-bell mr-2"></i>
                            Beritahu Saya
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-spacing-large bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Content -->
                <div class="order-2 lg:order-1">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-6 sm:mb-8 text-center lg:text-left">
                        Mengapa Memilih <span class="text-gradient">Golden English</span>?
                    </h2>
                    <p class="text-base sm:text-lg lg:text-xl text-gray-600 mb-8 sm:mb-12 leading-relaxed text-center lg:text-left">
                        Kami berkomitmen memberikan pengalaman belajar bahasa Inggris yang berkualitas tinggi 
                        melalui webinar interaktif dengan mentor berpengalaman internasional.
                    </p>
                    
                    <!-- Features -->
                    <div class="space-y-8 sm:space-y-10">
                        <div class="flex items-start gap-4 sm:gap-6">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-blue-100 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <i class="fas fa-chalkboard-teacher text-blue-600 text-xl sm:text-2xl lg:text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">Mentor Berpengalaman</h3>
                                <p class="text-gray-600 leading-relaxed text-sm sm:text-base lg:text-lg">Dipimpin oleh native speakers dan certified teachers dengan pengalaman internasional.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 sm:gap-6">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-green-100 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <i class="fas fa-users text-green-600 text-xl sm:text-2xl lg:text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">Kelas Interaktif</h3>
                                <p class="text-gray-600 leading-relaxed text-sm sm:text-base lg:text-lg">Sesi tanya jawab langsung, role-play, dan aktivitas engaging lainnya.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4 sm:gap-6">
                            <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-purple-100 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <i class="fas fa-certificate text-purple-600 text-xl sm:text-2xl lg:text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">Sertifikat Resmi</h3>
                                <p class="text-gray-600 leading-relaxed text-sm sm:text-base lg:text-lg">Dapatkan sertifikat yang diakui untuk melengkapi portofolio profesional Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image -->
                <div class="relative order-1 lg:order-2 mb-8 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Learning" 
                         class="rounded-2xl shadow-2xl w-full h-auto max-w-lg mx-auto lg:max-w-none">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-spacing-large bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-6 sm:mb-8">
                Siap Memulai Perjalanan <span class="text-gradient">Bahasa Inggris</span> Anda?
            </h2>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-600 mb-10 sm:mb-12 lg:mb-16 leading-relaxed max-w-2xl mx-auto">
                Bergabunglah dengan ribuan peserta lainnya dan raih impian berbahasa Inggris fluent!
            </p>
            <a href="{{ route('register') }}" class="btn-secondary inline-flex items-center px-6 sm:px-8 lg:px-12 py-3 sm:py-4 lg:py-5 text-white rounded-full font-semibold shadow-xl text-sm sm:text-base lg:text-lg">
                <i class="fas fa-rocket mr-2 sm:mr-3"></i>
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-12">
                <!-- Brand -->
                <div class="col-span-1 sm:col-span-2 text-center sm:text-left">
                    <div class="flex items-center justify-center sm:justify-start space-x-3 mb-4 sm:mb-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-crown text-white text-lg sm:text-xl"></i>
                        </div>
                        <div>
                            <span class="text-xl sm:text-2xl font-bold text-amber-400">Golden</span>
                            <span class="text-xl sm:text-2xl font-bold text-white">English</span>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4 sm:mb-6 max-w-md mx-auto sm:mx-0 leading-relaxed text-sm sm:text-base">
                        Platform webinar bahasa Inggris terdepan di Indonesia. Belajar dengan mentor terbaik dan raih impian karir global Anda.
                    </p>
                    <div class="flex space-x-4 justify-center sm:justify-start">
                        <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-colors duration-200">
                            <i class="fab fa-facebook text-blue-400 text-base sm:text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-colors duration-200">
                            <i class="fab fa-instagram text-pink-400 text-base sm:text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 sm:w-12 sm:h-12 bg-white/10 rounded-xl flex items-center justify-center hover:bg-white/20 transition-colors duration-200">
                            <i class="fab fa-youtube text-red-400 text-base sm:text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="text-center lg:text-left">
                    <h3 class="text-base sm:text-lg font-semibold mb-4 sm:mb-6">Quick Links</h3>
                    <ul class="space-y-2 sm:space-y-3">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm sm:text-base">Home</a></li>
                        <li><a href="#webinar" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm sm:text-base">Webinar</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm sm:text-base">About</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm sm:text-base">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="text-center lg:text-left">
                    <h3 class="text-base sm:text-lg font-semibold mb-4 sm:mb-6">Contact</h3>
                    <ul class="space-y-2 sm:space-y-3 text-gray-400">
                        <li class="flex items-start justify-center lg:justify-start">
                            <i class="fas fa-envelope mr-2 sm:mr-3 text-amber-400 w-4 sm:w-5 mt-0.5 flex-shrink-0"></i>
                            <span class="text-sm sm:text-base">info@goldenenglish.com</span>
                        </li>
                        <li class="flex items-start justify-center lg:justify-start">
                            <i class="fas fa-phone mr-2 sm:mr-3 text-amber-400 w-4 sm:w-5 mt-0.5 flex-shrink-0"></i>
                            <span class="text-sm sm:text-base">+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-start justify-center lg:justify-start">
                            <i class="fas fa-map-marker-alt mr-2 sm:mr-3 text-amber-400 w-4 sm:w-5 mt-0.5 flex-shrink-0"></i>
                            <span class="text-sm sm:text-base">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 sm:mt-12 pt-6 sm:pt-8 text-center text-gray-400">
                <p class="text-sm sm:text-base">&copy; {{ date('Y') }} Golden English. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Registration Modal -->
    <div id="registerModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl sm:rounded-3xl max-w-sm sm:max-w-md w-full p-6 sm:p-8 transform transition-all duration-300 scale-95 opacity-0 shadow-2xl" id="modalContent">
            <div class="text-center mb-6 sm:mb-8">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6 shadow-lg">
                    <i class="fas fa-user-plus text-white text-2xl sm:text-3xl"></i>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-3">Daftar Webinar</h3>
                <p class="text-gray-600 leading-relaxed text-sm sm:text-base">Silakan login terlebih dahulu untuk mendaftar webinar</p>
            </div>
            
            <div class="space-y-3 sm:space-y-4">
                <a href="{{ route('login') }}" class="btn-primary block w-full text-white py-3 sm:py-4 rounded-xl font-semibold text-center shadow-lg text-sm sm:text-base">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login
                </a>
                <a href="{{ route('register') }}" class="block w-full bg-gray-100 text-gray-700 py-3 sm:py-4 rounded-xl font-semibold text-center hover:bg-gray-200 transition-all duration-200 text-sm sm:text-base">
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar Akun Baru
                </a>
                <button onclick="closeRegisterModal()" class="block w-full text-gray-500 py-2 sm:py-3 text-center hover:text-gray-700 transition-colors duration-200 font-medium text-sm sm:text-base">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobileMenu').classList.add('hidden');
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navHeight = 80; // Fixed nav height
                    const targetPosition = target.offsetTop - navHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active navigation highlighting
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-blue-600');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('text-blue-600');
                }
            });
        });

        // Modal functions
        function openRegisterModal(webinarId) {
            const modal = document.getElementById('registerModal');
            const modalContent = document.getElementById('modalContent');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeRegisterModal() {
            const modal = document.getElementById('registerModal');
            const modalContent = document.getElementById('modalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Close modal when clicking outside
        document.getElementById('registerModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRegisterModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeRegisterModal();
            }
        });

        // Handle window resize for mobile menu
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                document.getElementById('mobileMenu').classList.add('hidden');
            }
        });
    </script>
</body>
</html>