<nav class="relative bg-white/10 glass-effect border border-white/20 rounded-b-2xl mx-6 mt-6 mb-10 p-5 shadow-xl rainbow-border overflow-hidden z-10" x-data="{ open: false, profileOpen: false }">
    <!-- Floating Particles -->
    <div class="floating-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    
    <div class="flex justify-between items-center relative z-10">
        <!-- Left Section - Empty as requested -->
        <div class="flex items-center space-x-5">
            <!-- Mobile Menu Button -->
            <button @click="open = !open" 
                    class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 
                           text-white p-3 rounded-xl shadow-lg hover:shadow-blue-500/30 hover:shadow-xl 
                           transition-all duration-300 hover:-translate-y-0.5 hover:scale-105 
                           active:translate-y-0 active:scale-95 lg:hidden">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <!-- Empty space - no logo, no navigation links as requested -->
        </div>

        <!-- Right Section -->
        <div class="flex items-center space-x-4">
            <!-- Theme Toggle -->
            <button id="themeToggle" 
                    class="relative bg-gradient-to-r from-amber-400 to-yellow-400 hover:from-amber-500 hover:to-yellow-500
                           w-14 h-7 rounded-full transition-all duration-300 flex items-center px-1
                           hover:shadow-lg hover:shadow-amber-400/30">
                <div class="w-5 h-5 bg-white rounded-full shadow-md transform transition-transform duration-300 flex items-center justify-center text-xs">
                    ☀️
                </div>
            </button>

            <!-- Notifications -->
            <button class="relative bg-white/15 hover:bg-white/25 border border-white/20 
                           w-10 h-10 rounded-xl text-white transition-all duration-300 
                           hover:-translate-y-0.5 hover:shadow-lg hover:shadow-black/20 glass-effect">
                <i class="fas fa-bell text-sm"></i>
                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs 
                           w-5 h-5 rounded-full flex items-center justify-center 
                           animate-pulse shadow-lg">3</span>
            </button>

            <!-- Search -->
            <button class="bg-white/15 hover:bg-white/25 border border-white/20 
                           w-10 h-10 rounded-xl text-white transition-all duration-300 
                           hover:-translate-y-0.5 hover:shadow-lg hover:shadow-black/20 glass-effect">
                <i class="fas fa-search text-sm"></i>
            </button>

            <!-- Fullscreen -->
            <button onclick="toggleFullscreen()" 
                    class="bg-white/15 hover:bg-white/25 border border-white/20 
                           w-10 h-10 rounded-xl text-white transition-all duration-300 
                           hover:-translate-y-0.5 hover:shadow-lg hover:shadow-black/20 glass-effect">
                <i class="fas fa-expand text-sm"></i>
            </button>

            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ profileOpen: false }">
                <button @click="profileOpen = !profileOpen"
                        class="flex items-center space-x-3 bg-white/10 hover:bg-white/20 
                               border border-white/20 px-4 py-2 rounded-full transition-all duration-300 
                               hover:-translate-y-0.5 glass-effect">
                    <!-- Avatar -->
                    <div class="w-9 h-9 bg-gradient-to-r from-blue-500 to-cyan-500 
                               rounded-full flex items-center justify-center text-white font-semibold text-sm
                               border-2 border-white/30">
                        {{ substr(Auth::user()->fullname ?? Auth::user()->name ?? 'User', 0, 2) }}
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="text-left hidden sm:block">
                        <div class="text-white font-semibold text-sm drop-shadow">
                            {{ Auth::user()->fullname ?? Auth::user()->name ?? 'User Name' }}
                        </div>
                        <div class="text-white/80 text-xs">
                            {{ Auth::user()->hasRole('admin') ? 'Admin Webinar' : 'Partisipan' }}
                        </div>
                    </div>
                    
                    <!-- Chevron -->
                    <i class="fas fa-chevron-down text-white/70 text-xs transition-transform duration-300"
                       :class="{ 'rotate-180': profileOpen }"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="profileOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     @click.away="profileOpen = false"
                     class="absolute right-0 top-full mt-3 w-56 bg-white rounded-2xl shadow-2xl border border-gray-200 backdrop-blur-xl"
                     style="z-index: 1000; position: fixed; right: 1.5rem; top: 5rem;">
                    
                    <!-- Profile Header -->
                    <div class="flex items-center p-4 border-b border-gray-200/50 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-t-2xl z-10">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 
                                   rounded-full flex items-center justify-center text-white font-semibold text-sm
                                   border-2 border-white shadow-md">
                            {{ substr(Auth::user()->fullname ?? Auth::user()->name ?? 'User', 0, 2) }}
                        </div>
                        <div class="ml-3 flex-1">
                            <div class="text-gray-800 font-semibold text-sm">
                                {{ Auth::user()->fullname ?? Auth::user()->name ?? 'User Name' }}
                            </div>
                            <div class="text-gray-500 text-xs">
                                {{ Auth::user()->email ?? 'user@example.com' }}
                            </div>
                        </div>
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse" title="Online"></div>
                    </div>
                    
                    <!-- Menu Items -->
                    <div class="py-2">
                        <a href="{{ route('profile.edit') }}" 
                           class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50
                                  transition-all duration-200 group/item">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover/item:bg-blue-200 transition-colors duration-200">
                                <i class="fas fa-user text-blue-600 text-sm"></i>
                            </div>
                            <span class="ml-3 text-sm font-medium">My Profile</span>
                            <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto group-hover/item:text-blue-600 transition-colors duration-200"></i>
                        </a>
                        
                        <a href="#" 
                           class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50
                                  transition-all duration-200 group/item">
                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center group-hover/item:bg-gray-200 transition-colors duration-200">
                                <i class="fas fa-cog text-gray-600 text-sm"></i>
                            </div>
                            <span class="ml-3 text-sm font-medium">Settings</span>
                            <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto group-hover/item:text-blue-600 transition-colors duration-200"></i>
                        </a>
                        
                        <a href="#" 
                           class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50
                                  transition-all duration-200 group/item">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center group-hover/item:bg-purple-200 transition-colors duration-200">
                                <i class="fas fa-question-circle text-purple-600 text-sm"></i>
                            </div>
                            <span class="ml-3 text-sm font-medium">Help & Support</span>
                            <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto group-hover/item:text-blue-600 transition-colors duration-200"></i>
                        </a>
                        
                        <hr class="my-2 border-gray-200/70">
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="flex items-center w-full px-4 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50
                                           transition-all duration-200 group/item text-left rounded-b-2xl">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center group-hover/item:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt text-red-600 text-sm"></i>
                                </div>
                                <span class="ml-3 text-sm font-medium group-hover/item:text-red-700">Log Out</span>
                                <i class="fas fa-arrow-right text-gray-400 text-xs ml-auto group-hover/item:text-red-600 transition-colors duration-200"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Navigation Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="lg:hidden mt-4 pt-4 border-t border-white/20">
        
        <!-- Mobile Navigation Links -->
        <div class="space-y-2 mb-4">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-200
                      {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            @if (Auth::user()->hasRole('user'))
                <a href="{{ route('events.index') }}" 
                   class="flex items-center px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-200
                          {{ request()->routeIs('events.*') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    <span class="font-medium">Event Webinar</span>
                </a>
                
                <a href="{{ route('events.history') }}" 
                   class="flex items-center px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-200
                          {{ request()->routeIs('events.history') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                    <i class="fas fa-history mr-3"></i>
                    <span class="font-medium">Event History</span>
                </a>
            @endif
            
            @if (Auth::user()->hasRole('admin'))
                <a href="{{ route('webinar.index') }}" 
                   class="flex items-center px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-200
                          {{ request()->routeIs('webinar.*') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                    <i class="fas fa-video mr-3"></i>
                    <span class="font-medium">Webinar</span>
                </a>
            @endif
        </div>
        
        <!-- Mobile Profile Section -->
        <div class="pt-4 border-t border-white/20">
            <div class="flex items-center px-4 mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 
                           rounded-full flex items-center justify-center text-white font-semibold text-sm
                           border-2 border-white/30">
                    {{ substr(Auth::user()->fullname ?? Auth::user()->name ?? 'User', 0, 2) }}
                </div>
                <div class="ml-3">
                    <div class="text-white font-semibold text-sm">
                        {{ Auth::user()->fullname ?? Auth::user()->name ?? 'User Name' }}
                    </div>
                    <div class="text-white/80 text-xs">
                        {{ Auth::user()->email }}
                    </div>
                </div>
            </div>
            
            <div class="space-y-2">
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center px-4 py-3 rounded-xl text-white hover:bg-white/10 transition-all duration-200">
                    <i class="fas fa-user mr-3"></i>
                    <span class="font-medium">Profile</span>
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="flex items-center w-full px-4 py-3 rounded-xl text-white hover:bg-red-500/20 transition-all duration-200 text-left">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span class="font-medium">Log Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen();
    } else {
        document.exitFullscreen();
    }
}
</script>
