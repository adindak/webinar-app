<x-app-layout>
    <!-- Page Header -->
    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <h1 class="text-3xl font-bold text-white drop-shadow-lg">Tambah Webinar</h1>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm" aria-label="breadcrumb">
            <div class="flex items-center bg-white/10 glass-effect border border-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white/80 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home text-base mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">Webinar</span>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">Tambah</span>
            </div>
        </nav>
    </div>

    <!-- Main Form Card -->
    <div class="bg-white/95 glass-effect border border-white/20 rounded-2xl shadow-xl backdrop-blur-sm">
        <!-- Card Header -->
        <div class="p-6 border-b border-gray-200/50">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-video text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Buat Webinar Baru</h2>
                    <p class="text-gray-600">Isi form di bawah untuk membuat webinar baru</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6">
            <form action="{{ route('webinar.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Basic Information Section -->
                <div class="bg-blue-50/50 rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Informasi Dasar
                    </h3>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <!-- Nama Webinar -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Webinar <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-tag text-gray-400"></i>
                                </div>
                                <input type="text" 
                                       id="name"
                                       name="name" 
                                       class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm"
                                       placeholder="e.g Webinar Digital Marketing 2024"
                                       required>
                            </div>
                        </div>

                        <!-- Lokasi Webinar -->
                        <div>
                            <label for="place_location" class="block text-sm font-medium text-gray-700 mb-1">
                                Lokasi Webinar <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input type="text" 
                                       id="place_location"
                                       name="place_location" 
                                       class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm"
                                       placeholder="e.g Zoom Meeting / Google Meet"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Schedule Section -->
                <div class="bg-green-50/50 rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-calendar-alt text-green-500 mr-2"></i>
                        Jadwal Webinar
                    </h3>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <!-- Tanggal Webinar -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">
                                Tanggal Webinar <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                                <input type="date" 
                                       id="start_date"
                                       name="start_date" 
                                       class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm"
                                       required>
                            </div>
                        </div>

                        <!-- Jam Webinar -->
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">
                                Jam Webinar <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-clock text-gray-400"></i>
                                </div>
                                <input type="time" 
                                       id="start_time"
                                       name="start_time" 
                                       class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Configuration Section -->
                <div class="bg-amber-50/50 rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-cog text-amber-500 mr-2"></i>
                        Konfigurasi Webinar
                    </h3>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <!-- Harga -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                                Harga (Rp)
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-coins text-gray-400"></i>
                                </div>
                                <input type="number" 
                                       id="price"
                                       name="price" 
                                       min="0"
                                       class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm"
                                       placeholder="0 untuk gratis">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Kosongkan atau isi 0 untuk webinar gratis</p>
                        </div>

                        <!-- Opsi Akses -->
                        <div>
                            <label for="access" class="block text-sm font-medium text-gray-700 mb-1">
                                Akses Webinar <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <select id="access"
                                        name="access" 
                                        class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm appearance-none"
                                        required>
                                    <option value="">Pilih Akses</option>
                                    <option value="public">🌐 Publik</option>
                                    <option value="private">🔒 Private</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Kuota Peserta -->
                        <div>
                            <label for="total_participants" class="block text-sm font-medium text-gray-700 mb-1">
                                Kuota Peserta
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-users text-gray-400"></i>
                                </div>
                                <input type="number" 
                                       id="total_participants"
                                       name="total_participants" 
                                       min="1"
                                       class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm"
                                       placeholder="e.g 100">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="bg-purple-50/50 rounded-xl p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-align-left text-purple-500 mr-2"></i>
                        Deskripsi Webinar
                    </h3>
                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            Deskripsi Detail <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description"
                                  name="description" 
                                  rows="5"
                                  class="block w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white/80 backdrop-blur-sm resize-none"
                                  placeholder="Jelaskan secara detail tentang webinar ini, materi yang akan dibahas, target audience, dan informasi penting lainnya..."
                                  required></textarea>
                        <p class="text-xs text-gray-500 mt-1">Minimal 50 karakter, maksimal 1000 karakter</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('webinar.index') }}" 
                       class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 flex items-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl hover:from-blue-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 flex items-center hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5">
                        <i class="fas fa-save mr-2"></i>
                        Buat Webinar
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('js')
    <script>
        // Form validation and enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const textarea = document.getElementById('description');
            const priceInput = document.getElementById('price');
            
            // Character counter for description
            textarea.addEventListener('input', function() {
                const currentLength = this.value.length;
                const maxLength = 1000;
                const minLength = 50;
                
                // You could add a character counter here if needed
                if (currentLength < minLength) {
                    this.classList.add('border-red-300');
                    this.classList.remove('border-green-300');
                } else {
                    this.classList.add('border-green-300');
                    this.classList.remove('border-red-300');
                }
            });
            
            // Price input formatting
            priceInput.addEventListener('input', function() {
                if (this.value == 0 || this.value == '') {
                    this.nextElementSibling.textContent = 'Webinar akan gratis';
                    this.nextElementSibling.classList.add('text-green-600');
                } else {
                    this.nextElementSibling.textContent = 'Webinar berbayar';
                    this.nextElementSibling.classList.remove('text-green-600');
                }
            });
            
            // Form submission enhancement
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                submitBtn.disabled = true;
            });
            
            // Auto-resize textarea
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });
    </script>
    @endpush
</x-app-layout>