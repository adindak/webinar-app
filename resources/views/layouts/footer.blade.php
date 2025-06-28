<footer class="bg-white/5 glass-effect border-t border-white/20 mx-6 mb-6 rounded-t-2xl p-6">
    <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="text-white/80 text-sm mb-4 md:mb-0">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
        
        <div class="flex items-center space-x-6 text-white/60 text-sm">
            <a href="#" class="hover:text-white transition-colors duration-200">Privacy Policy</a>
            <a href="#" class="hover:text-white transition-colors duration-200">Terms of Service</a>
            <a href="#" class="hover:text-white transition-colors duration-200">Support</a>
        </div>
    </div>
    
    <!-- Tech Stack Info -->
    <div class="mt-4 pt-4 border-t border-white/10 text-center">
        <div class="flex justify-center items-center space-x-4 text-white/50 text-xs">
            <span class="flex items-center space-x-1">
                <i class="fab fa-laravel"></i>
                <span>Laravel</span>
            </span>
            <span class="w-1 h-1 bg-white/30 rounded-full"></span>
            <span class="flex items-center space-x-1">
                <i class="fab fa-css3-alt"></i>
                <span>Tailwind CSS</span>
            </span>
            <span class="w-1 h-1 bg-white/30 rounded-full"></span>
            <span class="flex items-center space-x-1">
                <i class="fab fa-js-square"></i>
                <span>JavaScript</span>
            </span>
        </div>
    </div>
</footer>