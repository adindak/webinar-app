{{-- resources/views/events/index.blade.php --}}
<x-app-layout>
    <!-- Page Header -->
    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <h1 class="text-3xl font-bold text-white drop-shadow-lg">Events Webinar</h1>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm" aria-label="breadcrumb">
            <div class="flex items-center bg-white/10 glass-effect border border-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white/80 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home text-base mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">Events</span>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">List</span>
            </div>
        </nav>
    </div>

    <!-- Main Card -->
    <div class="bg-white/95 glass-effect border border-white/20 rounded-2xl shadow-xl backdrop-blur-sm mb-6 min-h-[600px]">
        <!-- Card Header -->
        <div class="p-6 border-b border-gray-200/50">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <h2 class="text-2xl font-bold text-gray-800">Available Events</h2>
                
                <!-- Filter & Search Section -->
                <div class="flex gap-3 items-center flex-wrap">
                    <!-- Search Input -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400 text-sm"></i>
                        </div>
                        <input type="text" 
                               class="block w-64 pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                               placeholder="Cari webinar...">
                    </div>
                    
                    <!-- Status Filter -->
                    <select class="px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                        <option>All Status</option>
                        <option>Upcoming</option>
                        <option>Ongoing</option>
                        <option>Completed</option>
                    </select>
                    
                    <!-- Price Filter -->
                    <select class="px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                        <option>Type</option>
                        <option>Free</option>
                        <option>Paid</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Events Grid Container -->
        <div class="p-6">
            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($webinars as $webinar)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                        <!-- Image Section -->
                        <div class="relative overflow-hidden">
                            <a href="{{ route('events.show', ['id' => $webinar->id]) }}" class="block">
                                <img src="{{ asset('') }}assets/images/event-2.jpg" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" 
                                     alt="{{ $webinar->name }}">
                            </a>
                            
                            <!-- Status Badges -->
                            <div class="absolute top-3 left-3">
                                @if ($webinar->price == 0)
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-800 shadow-sm">
                                        <i class="fas fa-gift mr-1.5"></i>Free
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 shadow-sm">
                                        <i class="fas fa-tag mr-1.5"></i>Paid
                                    </span>
                                @endif
                            </div>
                            
                            @if ($webinar->registered)
                                <div class="absolute top-3 right-3">
                                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 shadow-sm">
                                        <i class="fas fa-check-circle mr-1.5"></i>Terdaftar
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <!-- Title -->
                            <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 hover:text-blue-600 transition-colors duration-200">
                                <a href="{{ route('events.show', ['id' => $webinar->id]) }}" class="block">
                                    {{ $webinar->name }}
                                </a>
                            </h3>

                            <!-- Event Details -->
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-blue-500 mr-3 w-4"></i>
                                    <span class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMMM Y') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock text-green-500 mr-3 w-4"></i>
                                    <span class="text-sm text-gray-600">{{ $webinar->start_time }} WIB</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-3 w-4"></i>
                                    <span class="text-sm text-gray-600">{{ $webinar->place_location }}</span>
                                </div>
                            </div>

                            <!-- Footer: Price & Actions -->
                            <div class="border-t border-gray-100 pt-4">
                                <div class="flex justify-between items-center">
                                    <div class="price-section">
                                        @if ($webinar->price == 0)
                                            <span class="text-lg font-bold text-green-600">
                                                <i class="fas fa-gift mr-1"></i>GRATIS
                                            </span>
                                        @else
                                            <span class="text-lg font-bold text-blue-600">
                                                Rp {{ number_format($webinar->price, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="flex gap-2">
                                        <a href="{{ route('events.register', ['id' => $webinar->id]) }}"
                                           class="px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 
                                                  {{ $webinar->registered ? 'bg-green-100 text-green-700 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-600 text-white hover:shadow-lg hover:shadow-blue-500/30' }}">
                                            @if ($webinar->registered)
                                                <i class="fas fa-check mr-1"></i>Terdaftar
                                            @else
                                                <i class="fas fa-user-plus mr-1"></i>Daftar
                                            @endif
                                        </a>
                                        <a href="{{ route('events.show', ['id' => $webinar->id]) }}" 
                                           class="px-4 py-2 text-sm font-medium text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition-all duration-200">
                                            <i class="fas fa-eye mr-1"></i>Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full">
                        <div class="text-center py-12">
                            <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-times text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak ada webinar tersedia</h3>
                            <p class="text-gray-600 max-w-md mx-auto">
                                Belum ada webinar yang terdaftar dalam sistem. Silakan tunggu pengumuman webinar selanjutnya.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Grid Footer Info -->
            <div class="mt-8 flex justify-between items-center border-t border-gray-200/50 pt-6">
                <div class="text-sm text-gray-600">
                    Menampilkan <span class="font-semibold">{{ $webinars->count() }}</span> dari <span class="font-semibold">{{ $webinars->count() }}</span> webinar
                </div>
                <div class="text-sm text-gray-500">
                    Total: {{ $webinars->count() }} webinar tersedia
                </div>
            </div>

            <!-- Pagination -->
            @if(method_exists($webinars, 'hasPages') && $webinars->hasPages())
            <div class="mt-6 flex justify-center">
                <div class="bg-white rounded-xl border border-gray-200 p-1">
                    {{ $webinars->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <style>
        /* Glass effect */
        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Grid responsive improvements */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
            
            .flex.gap-3.items-center.flex-wrap {
                flex-direction: column;
                gap: 0.75rem;
                align-items: stretch;
            }
            
            .flex.gap-3.items-center.flex-wrap > * {
                width: 100%;
            }
            
            .w-64 {
                width: 100%;
            }
            
            .flex.gap-2 {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .flex.justify-between.items-center {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
        }

        /* Line clamp utility */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Hover effects */
        .hover\:shadow-blue-500\/30:hover {
            box-shadow: 0 10px 25px -3px rgba(59, 130, 246, 0.3), 0 4px 6px -2px rgba(59, 130, 246, 0.05);
        }

        /* Custom transition */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Badge improvements */
        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        /* Group hover effects */
        .group:hover .group-hover\:scale-105 {
            transform: scale(1.05);
        }

        /* Focus states */
        input:focus, select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Animation improvements */
        .hover\:-translate-y-2:hover {
            transform: translateY(-0.5rem);
        }

        /* Ensure proper stacking */
        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        /* Icon alignment */
        .w-4 {
            width: 1rem;
            flex-shrink: 0;
        }
    </style>

    <script>
        // Add any JavaScript functionality here if needed
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Events page loaded successfully');
            
            // Add search functionality
            const searchInput = document.querySelector('input[placeholder="Cari webinar..."]');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    // Add search logic here
                    console.log('Searching for:', e.target.value);
                });
            }
            
            // Add filter functionality
            const selects = document.querySelectorAll('select');
            selects.forEach(select => {
                select.addEventListener('change', function(e) {
                    // Add filter logic here
                    console.log('Filter changed:', e.target.value);
                });
            });
        });
    </script>
</x-app-layout>