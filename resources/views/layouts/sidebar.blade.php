<aside id="sidebar" 
       class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white/10 glass-effect 
              border-r border-white/20 transform -translate-x-full lg:translate-x-0 
              transition-transform duration-300 ease-in-out">
    
    <!-- Sidebar Header with Logo -->
    <div class="flex items-center justify-between h-20 px-6 border-b border-white/20">
        <div class="flex items-center space-x-3">
            <div class="relative w-10 h-10">
                <svg class="w-10 h-10 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M5 15L8 10L11 15H5ZM13 15L16 10L19 15H13ZM3 19L5 16H8L6 19H3ZM18 19L16 16H19L21 19H18ZM12 21L9 16H15L12 21Z"/>
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div>
                <span class="text-amber-400 font-bold text-lg">Golden</span>
                <span class="text-white font-bold text-lg ml-1">English</span>
            </div>
        </div>
        
        <button onclick="document.getElementById('sidebar').classList.add('-translate-x-full')" 
                class="lg:hidden text-white hover:text-gray-300 transition-colors duration-200">
            <i class="fas fa-times text-lg"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-1">
        <!-- Menu Title -->
        <div class="px-4 py-2 text-white/60 text-xs font-semibold uppercase tracking-wider">
            MAIN
        </div>

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-4 py-3 text-white hover:bg-white/10 
                  rounded-xl transition-all duration-200 group
                  {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
            <i class="fas fa-tachometer-alt w-6 text-center text-lg"></i>
            <span class="ml-3 font-medium">Dashboard</span>
        </a>

        @if (Auth::user()->hasRole('user'))
            <!-- Event Webinar -->
            <a href="{{ route('events.index') }}" 
               class="flex items-center px-4 py-3 text-white hover:bg-white/10 
                      rounded-xl transition-all duration-200 group
                      {{ request()->routeIs('events.index') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                <i class="fas fa-calendar-alt w-6 text-center text-lg"></i>
                <span class="ml-3 font-medium">Event Webinar</span>
            </a>

            <!-- Event History Webinar -->
            <a href="{{ route('events.history') }}" 
               class="flex items-center px-4 py-3 text-white hover:bg-white/10 
                      rounded-xl transition-all duration-200 group
                      {{ request()->routeIs('events.history') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                <i class="fas fa-history w-6 text-center text-lg"></i>
                <span class="ml-3 font-medium">Event History Webinar</span>
            </a>
        @endif

        @if (Auth::user()->hasRole('admin'))
            <!-- Webinar (Admin Only) -->
            <a href="{{ route('webinar.index') }}" 
               class="flex items-center px-4 py-3 text-white hover:bg-white/10 
                      rounded-xl transition-all duration-200 group
                      {{ request()->routeIs('webinar.index') ? 'bg-white/20 shadow-lg border border-white/30' : '' }}">
                <i class="fas fa-video w-6 text-center text-lg"></i>
                <span class="ml-3 font-medium">Webinar</span>
            </a>
        @endif
    </nav>

    <!-- Sidebar Footer with Logout -->
    <div class="p-4 border-t border-white/20">
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" 
                    class="flex items-center w-full px-4 py-3 text-white hover:bg-red-500/20 
                           rounded-xl transition-all duration-200 group hover:shadow-lg
                           border border-transparent hover:border-red-500/30">
                <i class="fas fa-sign-out-alt w-6 text-center text-lg group-hover:text-red-300"></i>
                <span class="ml-3 font-medium group-hover:text-red-300">Logout</span>
            </button>
        </form>
        
    </div>
</aside>
<style>
    /* Logo hover animation */
    .logo-container:hover .crown-icon {
        transform: rotate(10deg) scale(1.1);
        transition: transform 0.3s ease;
    }
    
    /* Text stroke/outline for better visibility */
    .text-outline-golden {
        color: #fbbf24; /* amber-400 */
        text-shadow: 
            1px 1px 0 #000,
            -1px -1px 0 #000,
            1px -1px 0 #000,
            -1px 1px 0 #000,
            0 1px 0 #000,
            1px 0 0 #000,
            0 -1px 0 #000,
            -1px 0 0 #000,
            2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .text-outline-white {
        color: #ffffff;
        text-shadow: 
            1px 1px 0 #000,
            -1px -1px 0 #000,
            1px -1px 0 #000,
            -1px 1px 0 #000,
            0 1px 0 #000,
            1px 0 0 #000,
            0 -1px 0 #000,
            -1px 0 0 #000,
            2px 2px 4px rgba(0,0,0,0.3);
    }
    
    /* Alternative: Subtle glow effect */
    .text-glow-golden {
        color: #fbbf24;
        text-shadow: 
            0 0 2px #000,
            0 0 4px #000,
            0 0 6px rgba(251, 191, 36, 0.8),
            1px 1px 2px rgba(0,0,0,0.8);
    }
    
    .text-glow-white {
        color: #ffffff;
        text-shadow: 
            0 0 2px #000,
            0 0 4px #000,
            0 0 6px rgba(255, 255, 255, 0.8),
            1px 1px 2px rgba(0,0,0,0.8);
    }
    
    /* Breathing animation for crown */
    @keyframes breathe {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .breathe-animation {
        animation: breathe 3s ease-in-out infinite;
    }
</style>