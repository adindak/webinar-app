<x-app-layout>
    @if (Auth::user()->hasRole('admin'))
        <!-- ADMIN DASHBOARD -->
        <!-- Welcome Hero Section -->
        <div class="bg-gradient-to-r from-blue-500/20 via-cyan-500/20 to-blue-600/20 glass-effect border border-white/30 rounded-2xl p-8 mb-8 relative overflow-hidden">
            <!-- Floating Particles Background -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute top-20 right-20 w-16 h-16 bg-cyan-300/20 rounded-full animate-bounce delay-300"></div>
                <div class="absolute bottom-10 left-1/4 w-12 h-12 bg-blue-300/20 rounded-full animate-pulse delay-700"></div>
            </div>
            
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-2/3 mb-6 lg:mb-0">
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4 drop-shadow-lg">
                        Selamat Datang, 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">
                            {{ Auth::user()->fullname ?? 'Administrator' }}
                        </span>! 👋
                    </h1>
                    <p class="text-white/90 text-lg mb-6 leading-relaxed">
                        Kelola webinar Anda dengan mudah dan pantau perkembangan pembelajaran peserta secara real-time.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('webinar.create') }}" 
                           class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 
                                  text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 
                                  hover:shadow-lg hover:shadow-amber-500/30 hover:-translate-y-1 flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Buat Webinar Baru
                        </a>
                        <button class="bg-white/20 hover:bg-white/30 border border-white/30 text-white px-6 py-3 rounded-xl 
                                       font-semibold transition-all duration-300 hover:-translate-y-1 backdrop-blur-sm">
                            <i class="fas fa-chart-line mr-2"></i>
                            Lihat Statistik
                        </button>
                    </div>
                </div>
                <div class="lg:w-1/3 flex justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center shadow-2xl">
                            <i class="fas fa-video text-8xl text-white/80"></i>
                        </div>
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-amber-500 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total webinar -->
            <div class="bg-white/90 glass-effect border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-video text-white text-xl"></i>
                    </div>
                    <span class="text-green-500 text-sm font-medium bg-green-100 px-2 py-1 rounded-full">+12%</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $totalWebinar ?? '24' }}</h3>
                <p class="text-gray-600 text-sm">Total Webinar</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <i class="fas fa-calendar mr-1"></i>
                    Bulan ini
                </div>
            </div>

            <!-- Active Participants -->
            <div class="bg-white/90 glass-effect border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <span class="text-green-500 text-sm font-medium bg-green-100 px-2 py-1 rounded-full">+8%</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $totalParticipants ?? '1,234' }}</h3>
                <p class="text-gray-600 text-sm">Total Peserta</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <i class="fas fa-user-check mr-1"></i>
                    Aktif berpartisipasi
                </div>
            </div>

            <!-- Revenue -->
            <div class="bg-white/90 glass-effect border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-coins text-white text-xl"></i>
                    </div>
                    <span class="text-green-500 text-sm font-medium bg-green-100 px-2 py-1 rounded-full">+15%</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-1">Rp {{ number_format($totalRevenue ?? 45000000, 0, ',', '.') }}</h3>
                <p class="text-gray-600 text-sm">Total Pendapatan</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <i class="fas fa-arrow-up mr-1"></i>
                    Dari semua webinar
                </div>
            </div>

            <!-- Completion Rate -->
            <div class="bg-white/90 glass-effect border border-white/20 rounded-2xl p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-pie text-white text-xl"></i>
                    </div>
                    <span class="text-green-500 text-sm font-medium bg-green-100 px-2 py-1 rounded-full">+5%</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ $completionRate ?? '87' }}%</h3>
                <p class="text-gray-600 text-sm">Tingkat Kehadiran</p>
                <div class="mt-3 flex items-center text-xs text-gray-500">
                    <i class="fas fa-trophy mr-1"></i>
                    Rata-rata kehadiran
                </div>
            </div>
        </div>

        <!-- Main Content Grid for Admin -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- Recent Activities -->
            <div class="lg:col-span-2 bg-white/90 glass-effect border border-white/20 rounded-2xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-clock text-blue-500 mr-3"></i>
                        Aktivitas Terbaru
                    </h2>
                    <button class="text-blue-500 hover:text-blue-600 text-sm font-medium">Lihat Semua</button>
                </div>
                
                <div class="space-y-4">
                    <!-- Activity Item -->
                    <div class="flex items-start space-x-4 p-4 hover:bg-blue-50/50 rounded-xl transition-colors duration-200">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-plus text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800 font-medium">Peserta baru bergabung</p>
                            <p class="text-gray-600 text-sm">John Doe mendaftar webinar "Digital Marketing 2024"</p>
                            <p class="text-gray-400 text-xs mt-1">2 menit yang lalu</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-4 hover:bg-green-50/50 rounded-xl transition-colors duration-200">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check-circle text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800 font-medium">Webinar selesai</p>
                            <p class="text-gray-600 text-sm">"Introduction to AI" telah selesai dengan 95% kehadiran</p>
                            <p class="text-gray-400 text-xs mt-1">1 jam yang lalu</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4 p-4 hover:bg-amber-50/50 rounded-xl transition-colors duration-200">
                        <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-star text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-800 font-medium">Review baru</p>
                            <p class="text-gray-600 text-sm">Sarah memberikan rating 5 bintang untuk webinar kemarin</p>
                            <p class="text-gray-400 text-xs mt-1">3 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions for Admin -->
            <div class="bg-white/90 glass-effect border border-white/20 rounded-2xl p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-bolt text-amber-500 mr-3"></i>
                    Quick Actions
                </h2>
                
                <div class="space-y-4">
                    <a href="{{ route('webinar.index') }}" 
                       class="block w-full bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 
                              text-white p-4 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-center">
                            <i class="fas fa-cog text-xl mr-4"></i>
                            <div>
                                <p class="font-semibold">Kelola Webinar</p>
                                <p class="text-sm opacity-90">Edit, hapus, atau lihat detail</p>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" 
                       class="block w-full bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 
                              text-white p-4 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                        <div class="flex items-center">
                            <i class="fas fa-chart-bar text-xl mr-4"></i>
                            <div>
                                <p class="font-semibold">Laporan Analytics</p>
                                <p class="text-sm opacity-90">Lihat performa webinar</p>
                            </div>
                        </div>
                    </a>
                    
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-xl">
                        <div class="flex items-center">
                            <i class="fas fa-gift text-xl mr-4"></i>
                            <div>
                                <p class="font-semibold">Tips Admin</p>
                                <p class="text-sm opacity-90">Monitor engagement peserta secara berkala</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Webinar Management -->
        <div class="bg-white/90 glass-effect border border-white/20 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-calendar-check text-green-500 mr-3"></i>
                    Management Webinar
                </h2>
                <a href="{{ route('webinar.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Webinar
                </a>
            </div>
            
            @if(isset($webinars) && $webinars->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($webinars as $webinar)
                        <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 bg-white/50">
                            <div class="flex items-center justify-between mb-4">
                                <span class="bg-blue-100 text-blue-600 text-xs font-medium px-3 py-1 rounded-full">
                                    {{ $webinar->category ?? 'Webinar' }}
                                </span>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-gray-800">{{ \Carbon\Carbon::parse($webinar->start_date)->format('d M') }}</p>
                                    <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($webinar->start_time)->format('H:i') }} WIB</p>
                                </div>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2">{{ $webinar->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($webinar->description, 80) }}</p>
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-users mr-1"></i>
                                    <span>{{ $webinar->participants_count ?? $webinar->total_participants ?? '0' }} peserta</span>
                                </div>
                                <span class="text-green-600 font-semibold">
                                    {{ $webinar->price > 0 ? 'Rp ' . number_format($webinar->price, 0, ',', '.') : 'Free' }}
                                </span>
                            </div>
                            <div class="flex gap-2">
                                
                                <a href="#" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i>
                                    Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6 text-center">
                    <a href="{{ route('webinar.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                        Lihat Semua Webinar
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-video text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum ada webinar yang dibuat</h3>
                    <p class="text-gray-600 mb-6">Mulai dengan membuat webinar pertama Anda</p>
                    <a href="{{ route('webinar.create') }}" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Buat Webinar Pertama
                    </a>
                </div>
            @endif
        </div>

    @else
        <!-- USER DASHBOARD -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Welcome & Stats -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Welcome Hero for User -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-2xl p-8 relative overflow-hidden">
                    <!-- Background Elements -->
                    <div class="absolute inset-0 overflow-hidden pointer-events-none">
                        <div class="absolute top-10 left-10 w-16 h-16 bg-white/10 rounded-full animate-pulse"></div>
                        <div class="absolute bottom-10 right-10 w-20 h-20 bg-white/10 rounded-full animate-pulse delay-300"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <h1 class="text-3xl font-bold mb-2">
                            Selamat Datang, 
                            <span class="text-amber-300">{{ Auth::user()->fullname ?? 'User' }}</span>! 👋
                        </h1>
                        <p class="text-blue-100 mb-6 leading-relaxed">
                            Kelola webinar Anda dengan mudah dan pantau perkembangan pembelajaran peserta secara real-time.
                        </p>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('events.index') }}" 
                               class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Lihat Event
                            </a>
                            <button class="bg-white/20 hover:bg-white/30 border border-white/30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:-translate-y-1 backdrop-blur-sm">
                                <i class="fas fa-chart-line mr-2"></i>
                                Lihat Statistik
                            </button>
                        </div>
                    </div>
                    
                    <!-- Decorative Video Icon -->
                    <div class="absolute bottom-4 right-4 w-24 h-24 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-video text-3xl text-white/70"></i>
                    </div>
                </div>

                <!-- User Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-video text-blue-600 text-sm"></i>
                            </div>
                            <span class="text-green-500 text-xs font-medium">+12%</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $userStats['totalWebinar'] ?? '24' }}</h3>
                        <p class="text-gray-600 text-xs">Total Webinar</p>
                        <p class="text-gray-400 text-xs mt-1">Bulan ini</p>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-green-600 text-sm"></i>
                            </div>
                            <span class="text-green-500 text-xs font-medium">+8%</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $userStats['totalParticipants'] ?? '1,234' }}</h3>
                        <p class="text-gray-600 text-xs">Total Peserta</p>
                        <p class="text-gray-400 text-xs mt-1">Aktif berpartisipasi</p>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-coins text-amber-600 text-sm"></i>
                            </div>
                            <span class="text-green-500 text-xs font-medium">+15%</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Rp {{ number_format($userStats['totalRevenue'] ?? 45000000, 0, ',', '.') }}</h3>
                        <p class="text-gray-600 text-xs">Total Pendapatan</p>
                        <p class="text-gray-400 text-xs mt-1">Dari semua webinar</p>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-200 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center justify-between mb-2">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-pie text-purple-600 text-sm"></i>
                            </div>
                            <span class="text-green-500 text-xs font-medium">+5%</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">{{ $userStats['completionRate'] ?? '87' }}%</h3>
                        <p class="text-gray-600 text-xs">Tingkat Kehadiran</p>
                        <p class="text-gray-400 text-xs mt-1">Rata-rata kehadiran</p>
                    </div>
                </div>

                <!-- User Activities -->
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-gray-800 flex items-center">
                            <i class="fas fa-clock text-blue-500 mr-3"></i>
                            Aktivitas Terbaru
                        </h2>
                        <button class="text-blue-500 hover:text-blue-600 text-sm font-medium">Lihat Semua</button>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4 p-3 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-plus text-white text-xs"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-800 font-medium text-sm">Peserta baru bergabung</p>
                                <p class="text-gray-600 text-xs">John Doe mendaftar webinar "Digital Marketing 2024"</p>
                                <p class="text-gray-400 text-xs mt-1">2 menit yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-3 hover:bg-green-50 rounded-lg transition-colors duration-200">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check-circle text-white text-xs"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-800 font-medium text-sm">Webinar selesai</p>
                                <p class="text-gray-600 text-xs">"Introduction to AI" telah selesai dengan 95% kehadiran</p>
                                <p class="text-gray-400 text-xs mt-1">1 jam yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-3 hover:bg-amber-50 rounded-lg transition-colors duration-200">
                            <div class="w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-star text-white text-xs"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-800 font-medium text-sm">Review baru</p>
                                <p class="text-gray-600 text-xs">Sarah memberikan rating 5 bintang untuk webinar kemarin</p>
                                <p class="text-gray-400 text-xs mt-1">3 jam yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Quick Actions & Webinar -->
            <div class="space-y-6">
                <!-- Quick Actions for User -->
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-amber-500 mr-3"></i>
                        Quick Actions
                    </h2>
                    
                    <div class="space-y-3">
                        <a href="{{ route('events.index') }}" 
                           class="block w-full bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt text-lg mr-3"></i>
                                <div>
                                    <p class="font-semibold text-sm">Event Webinar</p>
                                    <p class="text-xs opacity-90">Lihat webinar tersedia</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="{{ route('events.history') }}" 
                           class="block w-full bg-green-500 hover:bg-green-600 text-white p-4 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                            <div class="flex items-center">
                                <i class="fas fa-history text-lg mr-3"></i>
                                <div>
                                    <p class="font-semibold text-sm">Riwayat Event</p>
                                    <p class="text-xs opacity-90">Lihat webinar yang diikuti</p>
                                </div>
                            </div>
                        </a>
                        
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-4 rounded-xl">
                            <div class="flex items-center">
                                <i class="fas fa-gift text-lg mr-3"></i>
                                <div>
                                    <p class="font-semibold text-sm">Tips Hari Ini</p>
                                    <p class="text-xs opacity-90">Gunakan fitur rekaman untuk review</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Webinar Mendatang untuk User -->
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-gray-800 flex items-center">
                            <i class="fas fa-calendar-check text-green-500 mr-3"></i>
                            Webinar Mendatang
                        </h2>
                        <div class="flex items-center space-x-1">
                            <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-100 transition-colors duration-200">
                                <i class="fas fa-chevron-left text-xs"></i>
                            </button>
                            <button class="text-gray-400 hover:text-gray-600 p-1 rounded hover:bg-gray-100 transition-colors duration-200">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Webinar Card 1 -->
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-blue-100 text-blue-600 text-xs font-medium px-2 py-1 rounded-full">
                                    Digital Marketing
                                </span>
                                <div class="text-right">
                                    <p class="text-xs font-medium text-gray-800">25 Des</p>
                                    <p class="text-xs text-gray-500">14:00 WIB</p>
                                </div>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm">Advanced SEO Techniques</h3>
                            <p class="text-gray-600 text-xs mb-3">Pelajari teknik SEO terbaru untuk meningkatkan ranking website</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>
                                    <span>150 peserta</span>
                                </div>
                                <span class="text-green-600 font-semibold text-xs">Free</span>
                            </div>
                        </div>

                        <!-- Webinar Card 2 -->
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-purple-100 text-purple-600 text-xs font-medium px-2 py-1 rounded-full">
                                    Programming
                                </span>
                                <div class="text-right">
                                    <p class="text-xs font-medium text-gray-800">28 Des</p>
                                    <p class="text-xs text-gray-500">19:00 WIB</p>
                                </div>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm">React.js Masterclass</h3>
                            <p class="text-gray-600 text-xs mb-3">Dari basic hingga advanced, kuasai React.js dalam 3 jam</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>
                                    <span>89 peserta</span>
                                </div>
                                <span class="text-blue-600 font-semibold text-xs">Rp 299K</span>
                            </div>
                        </div>

                        <!-- Webinar Card 3 -->
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-center justify-between mb-3">
                                <span class="bg-green-100 text-green-600 text-xs font-medium px-2 py-1 rounded-full">
                                    Business
                                </span>
                                <div class="text-right">
                                    <p class="text-xs font-medium text-gray-800">30 Des</p>
                                    <p class="text-xs text-gray-500">15:30 WIB</p>
                                </div>
                            </div>
                            <h3 class="font-semibold text-gray-800 mb-2 text-sm">Startup Funding 101</h3>
                            <p class="text-gray-600 text-xs mb-3">Strategi mendapatkan funding untuk startup Anda</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="fas fa-users mr-1"></i>
                                    <span>200 peserta</span>
                                </div>
                                <span class="text-amber-600 font-semibold text-xs">Rp 199K</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>