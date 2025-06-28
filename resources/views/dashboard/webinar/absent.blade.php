<x-app-layout>
    <!-- Page Header -->
    <div class="flex justify-between items-center flex-wrap gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-white drop-shadow-lg">{{ $webinar->name }}</h1>
            <p class="text-white/80 text-sm mt-1">Kelola kehadiran peserta webinar</p>
        </div>

        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm" aria-label="breadcrumb">
            <div class="flex items-center bg-white/10 glass-effect border border-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                <a href="{{ route('dashboard') }}" class="flex items-center text-white/80 hover:text-white transition-colors duration-200">
                    <i class="fas fa-home text-base mr-2"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <a href="{{ route('webinar.index') }}" class="text-white/80 hover:text-white font-medium transition-colors duration-200">webinar</a>
                <i class="fas fa-chevron-right text-white/50 mx-3 text-xs"></i>
                <span class="text-white font-medium">Absensi</span>
            </div>
        </nav>
    </div>

    <!-- Summary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- Total Peserta -->
        <div class="bg-white/90 glass-effect border border-white/20 rounded-xl p-4">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-users text-white text-sm"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-xs">Total Peserta</p>
                    <p class="text-xl font-bold text-gray-800">{{ $participants->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Hadir -->
        <div class="bg-white/90 glass-effect border border-white/20 rounded-xl p-4">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-user-check text-white text-sm"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-xs">Hadir</p>
                    <p class="text-xl font-bold text-gray-800">{{ $participants->where('is_participant', true)->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Belum Hadir -->
        <div class="bg-white/90 glass-effect border border-white/20 rounded-xl p-4">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-user-times text-white text-sm"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-xs">Belum Hadir</p>
                    <p class="text-xl font-bold text-gray-800">{{ $participants->where('is_participant', false)->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Persentase Kehadiran -->
        <div class="bg-white/90 glass-effect border border-white/20 rounded-xl p-4">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-chart-pie text-white text-sm"></i>
                </div>
                <div>
                    <p class="text-gray-600 text-xs">Persentase</p>
                    <p class="text-xl font-bold text-gray-800">
                        {{ $participants->count() > 0 ? round(($participants->where('is_participant', true)->count() / $participants->count()) * 100) : 0 }}%
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="bg-white/95 glass-effect border border-white/20 rounded-2xl shadow-xl backdrop-blur-sm">
        <!-- Card Header -->
        <div class="p-6 border-b border-gray-200/50">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-clipboard-list text-white text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Daftar Kehadiran</h2>
                        <p class="text-gray-600">{{ $webinar->name }}</p>
                    </div>
                </div>
                
                <!-- Filter Actions -->
                <div class="flex items-center space-x-3">
                    <button onclick="filterAttendance('all')" 
                            class="px-4 py-2 text-sm bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-200 transition-colors duration-200 filter-btn active"
                            data-filter="all">
                        Semua
                    </button>
                    <button onclick="filterAttendance('present')" 
                            class="px-4 py-2 text-sm bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors duration-200 filter-btn"
                            data-filter="present">
                        Hadir
                    </button>
                    <button onclick="filterAttendance('absent')" 
                            class="px-4 py-2 text-sm bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors duration-200 filter-btn"
                            data-filter="absent">
                        Belum Hadir
                    </button>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Peserta</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">WhatsApp</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Domisili</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kehadiran</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200/50" id="participantsTable">
                    @foreach ($participants as $key => $participant)
                        <tr class="hover:bg-blue-50/50 transition-colors duration-200 participant-row" 
                            data-status="{{ $participant->is_participant ? 'present' : 'absent' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white text-xs font-semibold">
                                            {{ substr($participant->user->fullname ?? 'U', 0, 1) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $participant->user->fullname ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="flex items-center">
                                    <i class="fab fa-whatsapp text-green-500 mr-2"></i>
                                    {{ $participant->user->userDetail->phone_number ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>
                                    {{ $participant->user->email ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $participant->user->userDetail->status ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                    {{ $participant->user->userDetail->domisili ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($participant->is_participant)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Hadir
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Belum Hadir
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if (!$participant->is_participant)
                                    <div class="flex items-center space-x-2">
                                        <!-- Hadir Button -->
                                        <form action="{{ route('webinar.absent', ['id' => $webinar->id]) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $participant->user_id }}">
                                            <input type="hidden" name="webinar_id" value="{{ $webinar->id }}">
                                            <input type="hidden" name="absent" value="1">
                                            <button type="submit"
                                                    onclick="return confirm('Tandai peserta sebagai hadir?')"
                                                    class="px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg hover:from-green-600 hover:to-emerald-600 transition-all duration-200 flex items-center hover:shadow-md">
                                                <i class="fas fa-check mr-1"></i>
                                                Hadir
                                            </button>
                                        </form>

                                        <!-- Tidak Hadir Button -->
                                        <form action="{{ route('webinar.absent', ['id' => $webinar->id]) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $participant->user_id }}">
                                            <input type="hidden" name="webinar_id" value="{{ $webinar->id }}">
                                            <input type="hidden" name="absent" value="0">
                                            <button type="submit"
                                                    onclick="return confirm('Tandai peserta sebagai tidak hadir?')"
                                                    class="px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-lg hover:from-red-600 hover:to-pink-600 transition-all duration-200 flex items-center hover:shadow-md">
                                                <i class="fas fa-times mr-1"></i>
                                                Tidak Hadir
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="flex items-center space-x-2">
                                        <span class="text-green-600 text-sm font-medium">✓ Sudah Hadir</span>
                                        <!-- Reset Button -->
                                        <form action="{{ route('webinar.absent', ['id' => $webinar->id]) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $participant->user_id }}">
                                            <input type="hidden" name="webinar_id" value="{{ $webinar->id }}">
                                            <input type="hidden" name="absent" value="0">
                                            <button type="submit"
                                                    onclick="return confirm('Reset status kehadiran?')"
                                                    class="px-2 py-1 text-xs text-gray-600 hover:text-red-600 transition-colors duration-200"
                                                    title="Reset status">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Empty State -->
        @if($participants->count() == 0)
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Peserta</h3>
                <p class="text-gray-500">Tidak ada peserta yang terdaftar untuk webinar ini.</p>
            </div>
        @endif
    </div>

    <!-- Back Button -->
    <div class="mt-6 flex justify-start">
        <a href="{{ route('webinar.index') }}" 
           class="flex items-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-gray-600 to-gray-700 rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-200 hover:shadow-lg hover:-translate-y-0.5">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Webinar
        </a>
    </div>

    @push('js')
    <script>
        // Filter functionality
        function filterAttendance(status) {
            const rows = document.querySelectorAll('.participant-row');
            const buttons = document.querySelectorAll('.filter-btn');
            
            // Update button states
            buttons.forEach(btn => {
                btn.classList.remove('active', 'bg-blue-100', 'text-blue-600');
                btn.classList.add('bg-gray-100', 'text-gray-600');
            });
            
            // Activate current button
            const activeBtn = document.querySelector(`[data-filter="${status}"]`);
            activeBtn.classList.remove('bg-gray-100', 'text-gray-600');
            activeBtn.classList.add('active', 'bg-blue-100', 'text-blue-600');
            
            // Filter rows
            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');
                if (status === 'all' || rowStatus === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Form submission confirmations with better UX
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    if (button && !button.disabled) {
                        // Store original content
                        const originalContent = button.innerHTML;
                        
                        // Show loading state
                        button.disabled = true;
                        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Loading...';
                        
                        // Re-enable after 3 seconds (fallback)
                        setTimeout(() => {
                            button.disabled = false;
                            button.innerHTML = originalContent;
                        }, 3000);
                    }
                });
            });
        });

        // Auto-refresh functionality (optional)
        function autoRefresh() {
            if (confirm('Refresh halaman untuk melihat data terbaru?')) {
                window.location.reload();
            }
        }

        // Add refresh button functionality
        setInterval(() => {
            // You could add a subtle notification here
        }, 30000); // Every 30 seconds
    </script>
    @endpush
</x-app-layout>