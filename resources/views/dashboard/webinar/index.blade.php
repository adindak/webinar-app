{{-- resources/views/webinar/index.blade.php --}}
<x-app-layout>
    <!-- Page Header -->
    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <h1 class="text-3xl font-bold text-white drop-shadow-lg">Webinar List</h1>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm" aria-label="breadcrumb">
            <div class="flex items-center bg-white/10 glass-effect border border-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white/80 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home text-base mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">webinar</span>
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
                <h2 class="text-2xl font-bold text-gray-800">Courses</h2>
                <a href="{{ route('webinar.create') }}" 
                   class="flex items-center bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600
                          text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 
                          hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-0.5">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Webinar
                </a>
            </div>
        </div>

        <!-- Table Container -->
        <div class="p-6">
            <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-100">
                <table class="w-full">
                    <thead class="bg-gray-50/80">
                        <tr>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">#</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Nama Webinar</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Deskripsi</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Tanggal Webinar</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Jam</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Lokasi</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Harga</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Kuota</th>
                            <th class="px-6 py-5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-gray-200">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200/50 bg-white">
                        @forelse ($webinars->items() as $key => $webinar)
                            <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                                <td class="px-6 py-6 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $webinars->firstItem() + $key }}
                                </td>
                                <td class="px-6 py-6 text-sm text-gray-900">
                                    <div class="font-semibold">{{ $webinar->name }}</div>
                                </td>
                                <td class="px-6 py-6 text-sm text-gray-700 max-w-xs">
                                    <div class="truncate" title="{{ $webinar->description }}">
                                        {{ Str::limit($webinar->description, 80) }}
                                    </div>
                                </td>
                                <td class="px-6 py-6 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                                        {{ \Carbon\Carbon::parse($webinar->start_date)->isoFormat('D MMMM Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-6 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center">
                                        <i class="fas fa-clock text-green-500 mr-2"></i>
                                        {{ $webinar->start_time }}
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-sm text-gray-900">
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                        {{ $webinar->place_location }}
                                    </div>
                                </td>
                                <td class="px-6 py-6 whitespace-nowrap text-sm">
                                    @if($webinar->price <= 0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-gift mr-1"></i>
                                            Free
                                        </span>
                                    @else
                                        <span class="font-semibold text-gray-900">Rp {{ number_format($webinar->price, 0, ',', '.') }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-6 whitespace-nowrap text-sm text-gray-900">
                                    <div class="flex items-center">
                                        <i class="fas fa-users text-blue-500 mr-2"></i>
                                        {{ $webinar->total_participants ?? 0 }} Orang
                                    </div>
                                </td>
                                <td class="px-6 py-6 whitespace-nowrap text-sm">
                                    <div class="relative">
                                        <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                                onclick="toggleDropdown('dropdown-{{ $webinar->id }}')">
                                            <i class="fas fa-ellipsis-v text-gray-500"></i>
                                        </button>
                                        
                                        <!-- Dropdown Menu -->
                                        <div id="dropdown-{{ $webinar->id }}" 
                                             class="absolute right-0 top-full mt-1 w-48 bg-white rounded-xl shadow-xl border border-gray-200 opacity-0 invisible transform scale-95 transition-all duration-200"
                                             style="z-index: 9999;">
                                            <div class="py-2">
                                                <!-- Kehadiran -->
                                                <a href="{{ route('webinar.absent', ['id' => $webinar->id]) }}" 
                                                   class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-colors duration-200">
                                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-user-check text-green-600 text-sm"></i>
                                                    </div>
                                                    <span class="font-medium">Kehadiran</span>
                                                </a>

                                                <!-- Link Rekaman -->
                                                <button onclick="setUrl('{{ $webinar->id }}')" 
                                                        class="w-full flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-600 transition-colors duration-200 text-left rounded-b-xl">
                                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                        <i class="fas fa-video text-purple-600 text-sm"></i>
                                                    </div>
                                                    <span class="font-medium">Link Rekaman</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- Empty State -->
                            <tr>
                                <td colspan="9" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-video text-gray-400 text-2xl"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada webinar</h3>
                                        <p class="text-gray-500 mb-4">Mulai buat webinar pertama Anda untuk melihat daftar di sini.</p>
                                        <a href="{{ route('webinar.create') }}" 
                                           class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                            <i class="fas fa-plus mr-2"></i>
                                            Buat Webinar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination and Table Info -->
            @if($webinars->hasPages() || $webinars->count() > 0)
                <div class="mt-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <!-- Table Info -->
                    <div class="text-sm text-gray-600">
                        Menampilkan 
                        <span class="font-semibold">{{ $webinars->firstItem() ?? 0 }}</span>
                        sampai 
                        <span class="font-semibold">{{ $webinars->lastItem() ?? 0 }}</span>
                        dari 
                        <span class="font-semibold">{{ $webinars->total() }}</span>
                        webinar
                    </div>

                    <!-- Pagination Links -->
                    @if($webinars->hasPages())
                        <div class="flex items-center space-x-1">
                            {{-- Previous Page Link --}}
                            @if ($webinars->onFirstPage())
                                <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $webinars->previousPageUrl() }}" 
                                   class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-800 transition-colors duration-200">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($webinars->getUrlRange(1, $webinars->lastPage()) as $page => $url)
                                @if ($page == $webinars->currentPage())
                                    <span class="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" 
                                       class="px-4 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-800 transition-colors duration-200">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($webinars->hasMorePages())
                                <a href="{{ $webinars->nextPageUrl() }}" 
                                   class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-800 transition-colors duration-200">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <!-- Modal for Link Rekaman -->
    <div class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" id="exampleModal">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Link Rekaman</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form action="" method="POST" id="form-link">
                @csrf
                {{ method_field('PATCH') }}
                <div class="p-6">
                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link Rekaman</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-link text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   name="link" 
                                   id="link" 
                                   class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="e.g https://zoom.us/j/123456789">
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end space-x-3 p-6 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                    <button type="button" 
                            onclick="closeModal()"
                            class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                        Close
                    </button>
                    <button type="submit" 
                            class="px-6 py-2.5 text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg hover:from-blue-600 hover:to-cyan-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Enhanced dropdown toggle function with better debugging
        function toggleDropdown(dropdownId) {
            console.log('Toggling dropdown:', dropdownId); // Debug log
            
            const dropdown = document.getElementById(dropdownId);
            if (!dropdown) {
                console.error('Dropdown not found:', dropdownId);
                return;
            }
            
            const isVisible = dropdown.classList.contains('opacity-100');
            console.log('Current visibility:', isVisible); // Debug log
            
            // Close all dropdowns first
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                d.classList.add('opacity-0', 'invisible', 'scale-95');
                d.classList.remove('opacity-100', 'visible', 'scale-100');
            });
            
            // Toggle current dropdown
            if (!isVisible) {
                console.log('Showing dropdown'); // Debug log
                dropdown.classList.remove('opacity-0', 'invisible', 'scale-95');
                dropdown.classList.add('opacity-100', 'visible', 'scale-100');
            } else {
                console.log('Hiding dropdown'); // Debug log
            }
        }

        // Enhanced click outside handler
        document.addEventListener('click', function(event) {
            console.log('Document clicked, target:', event.target); // Debug log
            
            // Check if click is on dropdown button or inside dropdown
            const isDropdownButton = event.target.closest('[onclick*="toggleDropdown"]');
            const isInsideDropdown = event.target.closest('[id^="dropdown-"]');
            
            if (!isDropdownButton && !isInsideDropdown) {
                console.log('Clicking outside, closing all dropdowns'); // Debug log
                document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                    d.classList.add('opacity-0', 'invisible', 'scale-95');
                    d.classList.remove('opacity-100', 'visible', 'scale-100');
                });
            }
        });

        // Close dropdowns with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                console.log('ESC pressed, closing dropdowns'); // Debug log
                document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                    d.classList.add('opacity-0', 'invisible', 'scale-95');
                    d.classList.remove('opacity-100', 'visible', 'scale-100');
                });
            }
        });

        // Modal functions
        function showModal() {
            console.log('Showing modal'); // Debug log
            const modal = document.getElementById('exampleModal');
            const modalContent = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            console.log('Closing modal'); // Debug log
            const modal = document.getElementById('exampleModal');
            const modalContent = document.getElementById('modalContent');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Original functions
        const getUrl = (id) => {
            console.log('Getting URL for webinar:', id); // Debug log
            let url = `{{ route('webinar.url', ':id') }}`;
            url = url.replace(':id', id);

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('URL data received:', data); // Debug log
                document.getElementById('link').value = data.data.link;
            })
            .catch(error => {
                console.error('Error fetching URL:', error);
            });
        }

        const setUrl = (id) => {
            console.log('Setting URL for webinar:', id); // Debug log
            
            // Close dropdown first
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                d.classList.add('opacity-0', 'invisible', 'scale-95');
                d.classList.remove('opacity-100', 'visible', 'scale-100');
            });
            
            getUrl(id);
            showModal();

            let url = `{{ route('webinar.update-link', ':id') }}`;
            url = url.replace(':id', id);
            document.getElementById('form-link').action = url;
        }

        // Additional action functions (simplified)
        function duplicateWebinar(id) {
            console.log('Duplicating webinar:', id); // Debug log
            
            // Close dropdown
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                d.classList.add('opacity-0', 'invisible', 'scale-95');
                d.classList.remove('opacity-100', 'visible', 'scale-100');
            });
            
            if (confirm('Yakin ingin menduplikasi webinar ini?')) {
                // Add your duplicate logic here
                alert('Fitur duplikasi akan segera tersedia!');
            }
        }

        function archiveWebinar(id) {
            console.log('Archiving webinar:', id); // Debug log
            
            // Close dropdown
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                d.classList.add('opacity-0', 'invisible', 'scale-95');
                d.classList.remove('opacity-100', 'visible', 'scale-100');
            });
            
            if (confirm('Yakin ingin mengarsipkan webinar ini?')) {
                // Add your archive logic here
                alert('Fitur arsip akan segera tersedia!');
            }
        }

        function deleteWebinar(id) {
            console.log('Deleting webinar:', id); // Debug log
            
            // Close dropdown
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => {
                d.classList.add('opacity-0', 'invisible', 'scale-95');
                d.classList.remove('opacity-100', 'visible', 'scale-100');
            });
            
            if (confirm('⚠️ PERINGATAN!\n\nTindakan ini akan menghapus webinar secara permanen dan tidak dapat dibatalkan.\n\nApakah Anda yakin ingin melanjutkan?')) {
                // Add your delete logic here
                alert('Fitur hapus akan segera tersedia!');
            }
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        // Add some debugging info on page load
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded, dropdown elements found:', document.querySelectorAll('[id^="dropdown-"]').length);
            console.log('Action buttons found:', document.querySelectorAll('[onclick*="toggleDropdown"]').length);
            console.log('toggleDropdown function available:', typeof toggleDropdown);
        });
    </script>

    @push('js')
        <!-- Additional JS can go here if needed -->
    @endpush
</x-app-layout>