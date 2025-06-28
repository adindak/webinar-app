{{-- resources/views/histories/detail.blade.php --}}
<x-app-layout>
    <!-- Page Header -->
    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <h1 class="text-3xl font-bold text-white drop-shadow-lg">Event History Detail</h1>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm" aria-label="breadcrumb">
            <div class="flex items-center bg-white/10 glass-effect border border-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white/80 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home text-base mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <a href="{{ route('events.history') }}" class="text-white/80 hover:text-white transition-colors duration-200 font-medium">History</a>
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
            <span class="font-medium">Kembali ke Riwayat</span>
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
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
            
            <!-- Status Badges -->
            <div class="absolute top-6 left-6">
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-500 text-white shadow-lg backdrop-blur-sm">
                    <i class="fas fa-check-circle mr-2"></i>Event Completed
                </span>
            </div>

            <div class="absolute top-6 right-6">
                @if ($webinar->price == 0)
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-500 text-white shadow-lg backdrop-blur-sm">
                        <i class="fas fa-gift mr-2"></i>Free Event
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-purple-500 text-white shadow-lg backdrop-blur-sm">
                        <i class="fas fa-star mr-2"></i>Premium Event
                    </span>
                @endif
            </div>

            <!-- Event Title Overlay -->
            <div class="absolute bottom-6 left-6 right-6">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-2 drop-shadow-lg">{{ $webinar->name }}</h2>
                <div class="flex items-center gap-4 text-white/90">
                    <span class="flex items-center">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Selesai pada {{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMMM Y') }}
                    </span>
                    @if ($webinar->price > 0)
                        <span class="text-2xl font-bold">
                            Rp {{ number_format($webinar->price, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
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
                                    <h4 class="font-semibold text-gray-900">Total Peserta</h4>
                                    <p class="text-gray-600">{{ $webinar->total_participants }} Peserta</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Questions/Comments Section -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-comments text-gray-400"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Tanya Jawab</h3>
                                <p class="text-gray-500 text-sm">Diskusi dari event yang telah selesai</p>
                            </div>
                        </div>
                        
                        <!-- Archive Notice -->
                        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-archive text-amber-500 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800">Arsip Diskusi</h4>
                                    <p class="text-amber-700 text-sm">Event ini telah selesai. Diskusi dalam mode arsip.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Archived Questions -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-green-600 text-sm"></i>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-gray-900 text-sm">John Doe</h4>
                                            <span class="text-xs text-gray-500">Selama event berlangsung</span>
                                        </div>
                                        <p class="text-gray-700 text-sm mb-3">Apakah ada sesi tanya jawab langsung dengan pembicara?</p>
                                        
                                        <!-- Admin Reply -->
                                        <div class="bg-blue-50 rounded-lg p-3 ml-4 border-l-4 border-blue-500">
                                            <div class="flex items-center mb-2">
                                                <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mr-2">
                                                    <i class="fas fa-shield-alt text-white text-xs"></i>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-800">Admin</span>
                                            </div>
                                            <p class="text-sm text-blue-800">Ya, sesi tanya jawab berlangsung selama 30 menit di akhir presentasi.</p>
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
                                            <span class="text-xs text-gray-500">Selama event berlangsung</span>
                                        </div>
                                        <p class="text-gray-700 text-sm">Materi presentasi sangat membantu. Terima kasih!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Action Panel -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-lg p-6 sticky top-6">
                        <!-- Completion Status -->
                        <div class="text-center mb-6">
                            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-check-circle text-green-500 text-3xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Event Selesai</h3>
                            <p class="text-gray-600">Anda telah berhasil mengikuti event ini</p>
                        </div>

                        <!-- Price Display -->
                        <div class="text-center mb-6 p-4 bg-gray-50 rounded-xl">
                            @if ($webinar->price == 0)
                                <div class="inline-flex items-center px-4 py-2 rounded-full text-lg font-bold bg-green-100 text-green-800">
                                    <i class="fas fa-gift mr-2"></i>GRATIS
                                </div>
                            @else
                                <div class="text-2xl font-bold text-gray-900 mb-2">
                                    Rp {{ number_format($webinar->price, 0, ',', '.') }}
                                </div>
                                <p class="text-gray-600">Biaya Event</p>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <button class="w-full flex items-center justify-center bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-green-500/30 hover:-translate-y-0.5" 
                                    onclick="showRecordingModal()">
                                <i class="fas fa-play mr-3"></i>
                                Zoom Recording
                            </button>
                            
                            <button class="w-full flex items-center justify-center bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5" 
                                    onclick="downloadCertificate()">
                                <i class="fas fa-download mr-3"></i>
                                Download Certificate
                            </button>
                        </div>

                        <!-- Event Completion Info -->
                        <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                            <div class="flex items-center">
                                <i class="fas fa-trophy text-green-500 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-semibold text-green-800">Event Completed!</h4>
                                    <p class="text-green-600 text-sm">Selamat, Anda telah menyelesaikan event ini</p>
                                </div>
                            </div>
                        </div>

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
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check mr-1"></i>
                                        Completed
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Durasi</span>
                                    <span class="font-semibold text-gray-900">2 Jam</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Kategori</span>
                                    <span class="font-semibold text-gray-900">
                                        {{ $webinar->price == 0 ? 'Free' : 'Premium' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Achievement Badge -->
                        <div class="mt-6 p-4 bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-xl">
                            <div class="text-center">
                                <i class="fas fa-medal text-purple-500 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-purple-800 mb-1">Achievement Unlocked!</h4>
                                <p class="text-purple-600 text-sm">Digital Marketing Enthusiast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recording Modal -->
    <div class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" id="recordingModal">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-4 transform transition-all duration-300 scale-95 opacity-0" id="recordingModalContent">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 text-white p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold flex items-center">
                        <i class="fas fa-play mr-3"></i>
                        Zoom Recording
                    </h3>
                    <button onclick="closeRecordingModal()" class="text-white/80 hover:text-white transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <!-- Event Info -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-video text-green-500 text-2xl"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-lg">{{ $webinar->name }}</h4>
                    <p class="text-gray-600 mt-1">Recording tersedia untuk dilihat</p>
                </div>

                <!-- Recording Info -->
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-green-500 mt-1 mr-3"></i>
                        <div class="text-sm">
                            <p class="font-semibold text-green-800 mb-1">Recording Details:</p>
                            <ul class="text-green-700 space-y-1">
                                <li>• Durasi: 2 jam 15 menit</li>
                                <li>• Kualitas: HD 1080p</li>
                                <li>• Tersedia sampai: 30 hari setelah event</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Recording Link -->
                <div class="bg-gray-50 rounded-xl p-4 mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-link mr-2"></i>
                        Link Recording:
                    </label>
                    <div class="flex">
                        <input type="text" class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-white" 
                               value="https://zoom.us/rec/share/example-recording-link" id="recordingLink" readonly>
                        <button class="px-4 py-3 bg-green-500 hover:bg-green-600 text-white rounded-r-lg transition-colors duration-200 focus:ring-2 focus:ring-green-500 focus:ring-offset-2" 
                                onclick="copyRecordingLink()" id="copyRecordingButton">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex items-center justify-end space-x-3 p-6 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                <button type="button" 
                        onclick="closeRecordingModal()"
                        class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                    Tutup
                </button>
                <a href="https://zoom.us/rec/share/example-recording-link" target="_blank" 
                   class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg hover:from-green-600 hover:to-emerald-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Tonton Recording
                </a>
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
        .hover\:shadow-green-500\/30:hover {
            box-shadow: 0 10px 25px -3px rgba(34, 197, 94, 0.3), 0 4px 6px -2px rgba(34, 197, 94, 0.05);
        }

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
        // Recording Modal functions
        function showRecordingModal() {
            const modal = document.getElementById('recordingModal');
            const modalContent = document.getElementById('recordingModalContent');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeRecordingModal() {
            const modal = document.getElementById('recordingModal');
            const modalContent = document.getElementById('recordingModalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function copyRecordingLink() {
            const recordingLink = document.getElementById('recordingLink');
            const copyButton = document.getElementById('copyRecordingButton');
            
            recordingLink.select();
            recordingLink.setSelectionRange(0, 99999);
            
            navigator.clipboard.writeText(recordingLink.value).then(function() {
                // Change button appearance temporarily
                const originalContent = copyButton.innerHTML;
                copyButton.innerHTML = '<i class="fas fa-check"></i>';
                copyButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                copyButton.classList.add('bg-green-600', 'hover:bg-green-700');
                
                setTimeout(function() {
                    copyButton.innerHTML = originalContent;
                    copyButton.classList.remove('bg-green-600', 'hover:bg-green-700');
                    copyButton.classList.add('bg-green-500', 'hover:bg-green-600');
                }, 2000);
            }).catch(function() {
                // Fallback for older browsers
                alert('Link telah disalin: ' + recordingLink.value);
            });
        }

        // Certificate download function
        function downloadCertificate() {
            // Show loading state
            const button = event.target.closest('button');
            const originalContent = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Loading PDF Library...';
            button.disabled = true;
            
            // Function to create certificate without external library
            function generateSimplePDFCertificate() {
                try {
                    // Create HTML content for certificate
                    const certificateHTML = `
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="UTF-8">
                        <title>Certificate of Completion</title>
                        <style>
                            @page {
                                size: A4 landscape;
                                margin: 0;
                            }
                            
                            body {
                                font-family: 'Times New Roman', serif;
                                margin: 0;
                                padding: 40px;
                                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                                width: 100vw;
                                height: 100vh;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }
                            
                            .certificate {
                                background: white;
                                width: 800px;
                                height: 600px;
                                border: 15px solid #4A90E2;
                                border-radius: 20px;
                                padding: 30px;
                                text-align: center;
                                position: relative;
                                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
                            }
                            
                            .certificate::before {
                                content: '';
                                position: absolute;
                                top: 15px;
                                left: 15px;
                                right: 15px;
                                bottom: 15px;
                                border: 3px solid #FFD700;
                                border-radius: 10px;
                            }
                            
                            .header {
                                background: linear-gradient(135deg, #4A90E2, #7B68EE);
                                color: white;
                                padding: 20px;
                                margin: -15px -15px 25px -15px;
                                border-radius: 10px 10px 0 0;
                                position: relative;
                                z-index: 2;
                            }
                            
                            .title {
                                font-size: 48px;
                                font-weight: bold;
                                margin: 0;
                                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
                            }
                            
                            .subtitle {
                                font-size: 18px;
                                margin: 10px 0 0 0;
                                color: #FFD700;
                                font-weight: bold;
                                letter-spacing: 3px;
                            }
                            
                            .content {
                                padding: 30px 0;
                                position: relative;
                                z-index: 2;
                            }
                            
                            .certify-text {
                                font-size: 18px;
                                color: #333;
                                margin-bottom: 20px;
                            }
                            
                            .participant-name {
                                font-size: 32px;
                                font-weight: bold;
                                color: #4A90E2;
                                margin: 15px 0;
                                border-bottom: 3px solid #4A90E2;
                                padding-bottom: 8px;
                                display: inline-block;
                                min-width: 350px;
                            }
                            
                            .achievement-text {
                                font-size: 16px;
                                color: #666;
                                margin: 20px 0;
                            }
                            
                            .event-name {
                                font-size: 28px;
                                font-weight: bold;
                                color: #7B68EE;
                                margin: 20px 0;
                                padding: 15px;
                                background: rgba(123, 104, 238, 0.1);
                                border-radius: 10px;
                            }
                            
                            .event-details {
                                display: flex;
                                justify-content: space-around;
                                margin: 30px 0;
                                font-size: 14px;
                                color: #555;
                            }
                            
                            .detail-item {
                                text-align: center;
                            }
                            
                            .detail-label {
                                font-weight: bold;
                                color: #4A90E2;
                                display: block;
                                margin-bottom: 5px;
                            }
                            
                            .signatures {
                                display: flex;
                                justify-content: space-between;
                                margin-top: 25px;
                                padding: 0 20px;
                                position: relative;
                                z-index: 2;
                            }
                            
                            .signature {
                                text-align: center;
                                width: 160px;
                            }
                            
                            .signature-line {
                                border-top: 2px solid #333;
                                margin-bottom: 8px;
                                height: 30px;
                                display: flex;
                                align-items: end;
                            }
                            
                            .signature-label {
                                font-size: 10px;
                                color: #666;
                                font-weight: bold;
                            }
                            
                            .certificate-footer {
                                position: absolute;
                                bottom: 8px;
                                left: 50%;
                                transform: translateX(-50%);
                                font-size: 9px;
                                color: #999;
                                text-align: center;
                                z-index: 2;
                            }
                            
                            .decorative-element {
                                display: none;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="certificate">
                            <div class="header">
                                <h1 class="title">CERTIFICATE</h1>
                                <p class="subtitle">OF COMPLETION</p>
                            </div>
                            
                            <div class="content">
                                <p class="certify-text">This is to certify that</p>
                                
                                <div class="participant-name">{{ Auth::user()->fullname ?? 'PARTICIPANT NAME' }}</div>
                                
                                <p class="achievement-text">has successfully completed the webinar</p>
                                
                                <div class="event-name">{{ $webinar->name }}</div>
                                
                                <div class="event-details">
                                    <div class="detail-item">
                                        <span class="detail-label">📅 Date</span>
                                        {{ \Carbon\Carbon::parse($webinar->start_date)->format('d F Y') }}
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">🕐 Time</span>
                                        {{ $webinar->start_time }} WIB
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">📍 Location</span>
                                        {{ $webinar->place_location }}
                                    </div>
                                </div>
                                
                                <div class="signatures">
                                    <div class="signature">
                                        <div class="signature-line"></div>
                                        <div class="signature-label">Instructor Signature</div>
                                    </div>
                                    <div class="signature">
                                        <div class="signature-line"></div>
                                        <div class="signature-label">Director Signature</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="certificate-footer">
                                Certificate ID: CERT-${Date.now()}<br>
                                Issued on: ${new Date().toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' })}
                            </div>
                        </div>
                    </body>
                    </html>`;
                    
                    // Create and download HTML file
                    const webinarName = "{{ str_replace([' ', '/', '\\', ':', '*', '?', '"', '<', '>', '|'], '-', $webinar->name) }}";
                    const fileName = `Certificate-${webinarName}.html`;
                    
                    const blob = new Blob([certificateHTML], { type: 'text/html' });
                    const url = window.URL.createObjectURL(blob);
                    
                    const link = document.createElement('a');
                    link.href = url;
                    link.download = fileName;
                    link.style.display = 'none';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    
                    // Clean up
                    window.URL.revokeObjectURL(url);
                    
                    // Reset button
                    button.innerHTML = originalContent;
                    button.disabled = false;
                    
                    // Show success notification with instruction
                    showNotification('Sertifikat berhasil diunduh! Buka file HTML dan print as PDF untuk mendapatkan sertifikat PDF.', 'success');
                    
                } catch (error) {
                    console.error('Error generating certificate:', error);
                    
                    // Reset button
                    button.innerHTML = originalContent;
                    button.disabled = false;
                    
                    // Show error notification
                    showNotification('Gagal membuat sertifikat. Silakan coba lagi.', 'error');
                }
            }
            
            // Try to load jsPDF from multiple CDNs
            const jsPDFUrls = [
                'https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js',
                'https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js'
            ];
            
            let urlIndex = 0;
            
            function tryLoadJsPDF() {
                if (urlIndex >= jsPDFUrls.length) {
                    // If all CDNs fail, use HTML certificate
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Generating Certificate...';
                    setTimeout(generateSimplePDFCertificate, 500);
                    return;
                }
                
                const script = document.createElement('script');
                script.src = jsPDFUrls[urlIndex];
                script.onload = function() {
                    // Check if jsPDF is available
                    setTimeout(() => {
                        if (window.jsPDF && (window.jsPDF.jsPDF || window.jsPDF)) {
                            generateAdvancedPDFCertificate();
                        } else {
                            generateSimplePDFCertificate();
                        }
                    }, 200);
                };
                script.onerror = function() {
                    urlIndex++;
                    tryLoadJsPDF();
                };
                document.head.appendChild(script);
            }
            
            function generateAdvancedPDFCertificate() {
                // Previous jsPDF code would go here, but simplified for now
                generateSimplePDFCertificate();
            }
            
            // Check if jsPDF is already loaded
            if (window.jsPDF && (window.jsPDF.jsPDF || window.jsPDF)) {
                generateAdvancedPDFCertificate();
            } else {
                tryLoadJsPDF();
            }
        }

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

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeRecordingModal();
            }
        });

        // Close modal when clicking outside
        document.getElementById('recordingModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeRecordingModal();
            }
        });

        // Add page load animations
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.bg-gradient-to-br');
            elements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
                element.style.animation = 'slideIn 0.6s ease-out forwards';
            });
        });
    </script>
</x-app-layout>