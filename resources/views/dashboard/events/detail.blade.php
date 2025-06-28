{{-- resources/views/events/show.blade.php --}}
<x-app-layout>
    <!-- Page Header -->
    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <h1 class="text-3xl font-bold text-white drop-shadow-lg">Event Details</h1>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm" aria-label="breadcrumb">
            <div class="flex items-center bg-white/10 glass-effect border border-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white/80 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home text-base mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <a href="{{ route('events.index') }}" class="text-white/80 hover:text-white transition-colors duration-200 font-medium">Events</a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">Detail</span>
            </div>
        </nav>
    </div>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}" 
           class="inline-flex items-center bg-white/10 glass-effect border border-white/20 rounded-xl px-6 py-3 text-white/90 hover:text-white hover:bg-white/20 transition-all duration-300 backdrop-blur-sm">
            <i class="fas fa-arrow-left mr-3"></i>
            <span class="font-medium">Kembali ke Daftar Event</span>
        </a>
    </div>

    <!-- Main Content Container -->
    <div class="bg-white/95 glass-effect border border-white/20 rounded-2xl shadow-xl backdrop-blur-sm overflow-hidden">
        <!-- Event Banner -->
        <div class="relative overflow-hidden">
            <img src="{{ asset('') }}assets/images/event-details.jpg" 
                 class="w-full h-80 object-cover" 
                 alt="event-details">
            
            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
            
            <!-- Status Badges -->
            <div class="absolute top-6 left-6">
                @if ($webinar->price == 0)
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-500 text-white shadow-lg backdrop-blur-sm">
                        <i class="fas fa-gift mr-2"></i>Free Event
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-500 text-white shadow-lg backdrop-blur-sm">
                        <i class="fas fa-tag mr-2"></i>Premium Event
                    </span>
                @endif
            </div>

            @if ($webinar->registered)
                <div class="absolute top-6 right-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-500 text-white shadow-lg backdrop-blur-sm">
                        <i class="fas fa-check-circle mr-2"></i>Terdaftar
                    </span>
                </div>
            @endif

            <!-- Event Title Overlay -->
            <div class="absolute bottom-6 left-6 right-6">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-2 drop-shadow-lg">{{ $webinar->name }}</h2>
                @if ($webinar->price > 0)
                    <div class="text-2xl font-bold text-white drop-shadow-lg">
                        Rp {{ number_format($webinar->price, 0, ',', '.') }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Content Section -->
        <div class="p-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Event Details -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Event Information -->
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                            Informasi Event
                        </h3>
                        <p class="text-gray-700 leading-relaxed">{{ $webinar->description }}</p>
                    </div>

                    <!-- Event Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-calendar-alt text-white text-lg"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Tanggal Event</h4>
                                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMMM Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-lg"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Waktu</h4>
                                    <p class="text-gray-600">{{ $webinar->start_time }} WIB</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-red-50 to-red-100 rounded-2xl p-6 border border-red-200">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Lokasi</h4>
                                    <p class="text-gray-600">{{ $webinar->place_location }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-users text-white text-lg"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-gray-900">Peserta</h4>
                                    <p class="text-gray-600">{{ $webinar->total_participants }} Terdaftar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Questions/Comments Section -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-comments text-blue-500"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Tanya Jawab</h3>
                                <p class="text-gray-600 text-sm">Ajukan pertanyaan tentang event ini</p>
                            </div>
                        </div>
                        
                        <!-- Question Form -->
                        <div class="mb-6">
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    <div class="flex-grow">
                                        <textarea 
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition-all duration-200 bg-white" 
                                            rows="3" 
                                            placeholder="Ketik pertanyaanmu disini..."
                                            id="questionInput"></textarea>
                                        <div class="flex justify-between items-center mt-3">
                                            <span class="text-xs text-gray-500">Maksimal 500 karakter</span>
                                            <button 
                                                class="flex items-center bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/30 disabled:opacity-50 disabled:cursor-not-allowed"
                                                onclick="submitQuestion()"
                                                id="submitQuestion">
                                                <i class="fas fa-paper-plane mr-2"></i>
                                                Kirim
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Questions List -->
                        <div class="space-y-4" id="questionsList">
                            <!-- Sample Questions -->
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-green-600 text-sm"></i>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-gray-900 text-sm">John Doe</h4>
                                            <span class="text-xs text-gray-500">2 jam yang lalu</span>
                                        </div>
                                        <p class="text-gray-700 text-sm mb-3">Apakah akan ada sesi tanya jawab langsung dengan pembicara?</p>
                                        
                                        <!-- Admin Reply -->
                                        <div class="bg-blue-50 rounded-lg p-3 ml-4 border-l-4 border-blue-500">
                                            <div class="flex items-center mb-2">
                                                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mr-2">
                                                    <i class="fas fa-shield-alt text-white text-xs"></i>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-800">Admin</span>
                                                <span class="text-xs text-gray-500 ml-2">1 jam yang lalu</span>
                                            </div>
                                            <p class="text-sm text-blue-800">Ya, akan ada sesi tanya jawab selama 30 menit di akhir presentasi.</p>
                                        </div>
                                        
                                        <div class="flex items-center space-x-4 mt-3">
                                            <button class="flex items-center text-gray-500 hover:text-blue-600 text-xs transition-colors duration-200">
                                                <i class="fas fa-thumbs-up mr-1"></i>
                                                Helpful (5)
                                            </button>
                                            <button class="flex items-center text-gray-500 hover:text-blue-600 text-xs transition-colors duration-200">
                                                <i class="fas fa-reply mr-1"></i>
                                                Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-purple-600 text-sm"></i>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-gray-900 text-sm">Sarah Wilson</h4>
                                            <span class="text-xs text-gray-500">5 jam yang lalu</span>
                                        </div>
                                        <p class="text-gray-700 text-sm mb-3">Apakah ada materi yang akan dibagikan setelah webinar?</p>
                                        
                                        <div class="flex items-center space-x-4">
                                            <button class="flex items-center text-gray-500 hover:text-blue-600 text-xs transition-colors duration-200">
                                                <i class="fas fa-thumbs-up mr-1"></i>
                                                Helpful (2)
                                            </button>
                                            <button class="flex items-center text-gray-500 hover:text-blue-600 text-xs transition-colors duration-200">
                                                <i class="fas fa-reply mr-1"></i>
                                                Reply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Load More Button -->
                        <div class="text-center mt-6">
                            <button class="text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors duration-200">
                                Muat Pertanyaan Lainnya
                                <i class="fas fa-chevron-down ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Action Panel -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-lg p-6 sticky top-6">
                        <!-- Price Display -->
                        <div class="text-center mb-6">
                            @if ($webinar->price == 0)
                                <div class="inline-flex items-center px-6 py-3 rounded-full text-lg font-bold bg-green-100 text-green-800">
                                    <i class="fas fa-gift mr-2"></i>GRATIS
                                </div>
                            @else
                                <div class="text-3xl font-bold text-gray-900 mb-2">
                                    Rp {{ number_format($webinar->price, 0, ',', '.') }}
                                </div>
                                <p class="text-gray-600">Harga Event</p>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            @if ($webinar->registered == 0)
                                <a href="{{ route('events.register', ['id' => $webinar->id]) }}" 
                                   class="w-full flex items-center justify-center bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5">
                                    <i class="fas fa-user-plus mr-3"></i>
                                    Daftar Sekarang
                                </a>
                            @endif
                            
                            <button class="w-full flex items-center justify-center bg-white border-2 border-blue-500 text-blue-600 hover:bg-blue-50 px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5" 
                                    onclick="showZoomModal()">
                                <i class="fas fa-video mr-3"></i>
                                Akses Link Zoom
                            </button>
                        </div>

                        <!-- Registration Status -->
                        @if ($webinar->registered)
                            <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                                    <div>
                                        <h4 class="font-semibold text-green-800">Anda sudah terdaftar!</h4>
                                        <p class="text-green-600 text-sm">Terima kasih telah mendaftar untuk event ini.</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Event Stats -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <h4 class="font-semibold text-gray-900 mb-4">Statistik Event</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Peserta</span>
                                    <span class="font-semibold text-gray-900">{{ $webinar->total_participants ?? 0 }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Status</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-calendar-check mr-1"></i>
                                        Upcoming
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Kategori</span>
                                    <span class="font-semibold text-gray-900">
                                        {{ $webinar->price == 0 ? 'Free' : 'Premium' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Zoom Link Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" id="zoomLinkModal">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold flex items-center">
                        <i class="fas fa-video mr-3"></i>
                        Link Zoom Meeting
                    </h3>
                    <button onclick="closeZoomModal()" class="text-white/80 hover:text-white transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Event Info -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-event text-blue-500 text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-lg">{{ $webinar->name }}</h4>
                </div>

                <!-- Date & Time Info -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <i class="fas fa-calendar-alt text-blue-500 text-2xl mb-2"></i>
                        <div class="text-sm text-gray-600 mb-1">Tanggal</div>
                        <div class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMM Y') }}</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <i class="fas fa-clock text-green-500 text-2xl mb-2"></i>
                        <div class="text-sm text-gray-600 mb-1">Waktu</div>
                        <div class="font-semibold text-gray-900">{{ $webinar->start_time }} WIB</div>
                    </div>
                </div>

                <!-- Info Alert -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                        <div class="text-sm">
                            <p class="font-semibold text-blue-800 mb-1">Link akan tersedia pada:</p>
                            <p class="text-blue-700">{{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMMM Y') }} pukul {{ $webinar->start_time }}</p>
                        </div>
                    </div>
                </div>

                @if ($showLink)
                    <!-- Zoom Link Section -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-link mr-2"></i>
                            Link Zoom Meeting:
                        </label>
                        <div class="flex">
                            <input type="text" class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" 
                                   value="{{ $webinar->link }}" id="zoomLink" readonly>
                            <button class="px-4 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg transition-colors duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" 
                                    onclick="copyZoomLink()" id="copyButton">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                @else
                    <!-- Link Not Available -->
                    <div class="text-center py-8">
                        <i class="fas fa-lock text-gray-400 text-4xl mb-4"></i>
                        <p class="text-gray-600 mb-2">Link akan tersedia saat event dimulai</p>
                        <p class="text-sm text-gray-500">Silakan kembali lagi pada waktu yang telah ditentukan</p>
                    </div>
                @endif

                @if (!$webinar->registered)
                    <!-- Registration Warning -->
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-3"></i>
                            <div class="text-sm">
                                <span class="text-yellow-800">Pastikan Anda sudah <strong>mendaftar</strong> terlebih dahulu untuk mengakses event ini.</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end space-x-3 p-6 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                <button type="button" 
                        onclick="closeZoomModal()"
                        class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                    Tutup
                </button>
                @if ($showLink)
                    <a href="{{ $webinar->link }}" target="_blank" 
                       class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg hover:from-blue-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        Buka Meeting
                    </a>
                @endif
            </div>
        </div>
    </div>

    <style>
        /* Glass effect */
        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Sticky positioning */
        .sticky {
            position: sticky;
        }

        /* Custom animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bg-white\/95 {
            background-color: rgba(255, 255, 255, 0.95);
        }

        .bg-white\/10 {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .bg-white\/20 {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .text-white\/80 {
            color: rgba(255, 255, 255, 0.8);
        }

        .text-white\/90 {
            color: rgba(255, 255, 255, 0.9);
        }

        .text-white\/50 {
            color: rgba(255, 255, 255, 0.5);
        }

        .border-white\/20 {
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* Enhanced hover effects */
        .hover\:shadow-blue-500\/30:hover {
            box-shadow: 0 10px 25px -3px rgba(59, 130, 246, 0.3), 0 4px 6px -2px rgba(59, 130, 246, 0.05);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .grid-cols-1.md\:grid-cols-2 {
                grid-template-columns: 1fr;
            }
            
            .lg\:col-span-2 {
                grid-column: span 1;
            }
            
            .lg\:col-span-1 {
                grid-column: span 1;
            }
            
            .sticky {
                position: static;
            }
        }
    </style>

    <script>
        // Modal functions
        function showZoomModal() {
            const modal = document.getElementById('zoomLinkModal');
            const modalContent = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeZoomModal() {
            const modal = document.getElementById('zoomLinkModal');
            const modalContent = document.getElementById('modalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function copyZoomLink() {
            const zoomLink = document.getElementById('zoomLink');
            const copyButton = document.getElementById('copyButton');
            
            zoomLink.select();
            zoomLink.setSelectionRange(0, 99999);
            
            navigator.clipboard.writeText(zoomLink.value).then(function() {
                // Change button appearance temporarily
                const originalContent = copyButton.innerHTML;
                copyButton.innerHTML = '<i class="fas fa-check"></i>';
                copyButton.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                copyButton.classList.add('bg-green-500', 'hover:bg-green-600');
                
                setTimeout(function() {
                    copyButton.innerHTML = originalContent;
                    copyButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                    copyButton.classList.add('bg-blue-500', 'hover:bg-blue-600');
                }, 2000);
            }).catch(function() {
                // Fallback for older browsers
                alert('Link telah disalin: ' + zoomLink.value);
            });
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeZoomModal();
            }
        });

        // Close modal when clicking outside
        document.getElementById('zoomLinkModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeZoomModal();
            }
        });

        // Question functionality
        function submitQuestion() {
            const input = document.getElementById('questionInput');
            const submitBtn = document.getElementById('submitQuestion');
            const questionsList = document.getElementById('questionsList');
            
            if (input.value.trim() === '') {
                alert('Silakan masukkan pertanyaan Anda');
                return;
            }
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            
            // Simulate API call
            setTimeout(() => {
                // Create new question element
                const newQuestion = document.createElement('div');
                newQuestion.className = 'bg-gray-50 rounded-xl p-4 border border-gray-100 transform translate-y-2 opacity-0 transition-all duration-300';
                newQuestion.innerHTML = `
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-semibold text-gray-900 text-sm">Anda</h4>
                                <span class="text-xs text-gray-500">Baru saja</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-3">${input.value}</p>
                            
                            <div class="flex items-center space-x-4">
                                <button class="flex items-center text-gray-500 hover:text-blue-600 text-xs transition-colors duration-200">
                                    <i class="fas fa-thumbs-up mr-1"></i>
                                    Helpful (0)
                                </button>
                                <button class="flex items-center text-gray-500 hover:text-blue-600 text-xs transition-colors duration-200">
                                    <i class="fas fa-reply mr-1"></i>
                                    Reply
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                // Add to top of questions list
                questionsList.insertBefore(newQuestion, questionsList.firstChild);
                
                // Animate in
                setTimeout(() => {
                    newQuestion.classList.remove('translate-y-2', 'opacity-0');
                }, 10);
                
                // Clear input and reset button
                input.value = '';
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Kirim';
                
                // Show success message
                showNotification('Pertanyaan berhasil dikirim!', 'success');
            }, 1000);
        }
        
        // Character counter for textarea
        document.getElementById('questionInput').addEventListener('input', function() {
            const maxLength = 500;
            const currentLength = this.value.length;
            const counter = this.parentElement.querySelector('.text-xs.text-gray-500');
            
            if (currentLength > maxLength) {
                this.value = this.value.substring(0, maxLength);
                counter.textContent = `Maksimal ${maxLength} karakter (mencapai batas)`;
                counter.classList.add('text-red-500');
            } else {
                counter.textContent = `${currentLength}/${maxLength} karakter`;
                counter.classList.remove('text-red-500');
            }
        });
        
        // Auto-resize textarea
        document.getElementById('questionInput').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 120) + 'px';
        });
        
        // Notification function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg text-white font-medium z-50 transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-green-500' : 
                type === 'error' ? 'bg-red-500' : 'bg-blue-500'
            }`;
            notification.innerHTML = `
                <div class="flex items-center">
                    <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'}-circle mr-2"></i>
                    ${message}
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
</x-app-layout>