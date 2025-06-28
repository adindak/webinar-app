<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- SEO Meta Tags for Promotion -->
        <meta name="description" content="@yield('meta_description', 'Dapatkan penawaran terbaik dan promosi menarik dari produk dan layanan kami. Jangan lewatkan kesempatan emas ini!')">
        <meta name="keywords" content="@yield('meta_keywords', 'promosi, diskon, penawaran, promo terbaru, sale')">
        <meta name="author" content="{{ config('app.name', 'Laravel') }}">
        
        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="@yield('og_title', config('app.name', 'Laravel') . ' - Promosi Terbaik')">
        <meta property="og:description" content="@yield('og_description', 'Dapatkan penawaran terbaik dan promosi menarik dari produk dan layanan kami.')">
        <meta property="og:image" content="@yield('og_image', asset('assets/images/promotion-banner.jpg'))">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        
        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'Laravel') . ' - Promosi Terbaik')">
        <meta name="twitter:description" content="@yield('twitter_description', 'Dapatkan penawaran terbaik dan promosi menarik.')">
        <meta name="twitter:image" content="@yield('twitter_image', asset('assets/images/promotion-banner.jpg'))">

        <title>@yield('title', config('app.name', 'Laravel') . ' - Promosi Terbaik')</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">

        <!-- Preload Critical CSS -->
        <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style">
        
        <!-- CSS Files for Promotion Website -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/google-fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/promotion-style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

        <!-- Vite Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Additional Head Content -->
        @stack('head')
        @yield('styles')

        <!-- Google Analytics / Tracking Code -->
        @if(config('app.env') === 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'GA_MEASUREMENT_ID');
        </script>
        @endif

        <!-- Schema.org Structured Data -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{ config('app.name', 'Laravel') }}",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('assets/images/logo.png') }}",
            "sameAs": [
                "@yield('social_facebook', '#')",
                "@yield('social_twitter', '#')",
                "@yield('social_instagram', '#')"
            ]
        }
        </script>
    </head>
    
    <body class="promotion-layout">
        <!-- Loading Screen -->
        <div id="loading-screen" class="loading-screen">
            <div class="loading-spinner">
                <div class="spinner"></div>
                <p>Loading...</p>
            </div>
        </div>

        <!-- Skip to Content for Accessibility -->
        <a href="#main-content" class="skip-to-content">Skip to main content</a>

        <!-- Back to Top Button -->
        <button id="back-to-top" class="back-to-top" aria-label="Back to top">
            <i class="ri-arrow-up-line"></i>
        </button>

        <!-- Main Content Area -->
        <main id="main-content" role="main">
            {{ $slot }}
        </main>

        <!-- WhatsApp Float Button -->
        <div class="whatsapp-float">
            <a href="https://wa.me/{{ config('app.whatsapp_number', '6281234567890') }}?text=Halo, saya tertarik dengan promosi yang sedang berlangsung" 
               target="_blank" 
               rel="noopener noreferrer"
               class="whatsapp-btn"
               aria-label="Chat via WhatsApp">
                <i class="ri-whatsapp-line"></i>
            </a>
        </div>

        <!-- Cookie Consent Banner -->
        <div id="cookie-consent" class="cookie-consent" style="display: none;">
            <div class="cookie-content">
                <p>Kami menggunakan cookie untuk meningkatkan pengalaman Anda. Dengan melanjutkan, Anda menyetujui penggunaan cookie.</p>
                <div class="cookie-buttons">
                    <button id="accept-cookies" class="btn btn-primary btn-sm">Terima</button>
                    <button id="decline-cookies" class="btn btn-outline-secondary btn-sm">Tolak</button>
                </div>
            </div>
        </div>

        <!-- JavaScript Files -->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/aos.js') }}"></script>
        <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/promotion-custom.js') }}"></script>

        <!-- Custom Scripts -->
        <script>
            // Initialize AOS (Animate On Scroll)
            AOS.init({
                duration: 800,
                easing: 'slide',
                once: true
            });

            // Loading Screen
            window.addEventListener('load', function() {
                document.getElementById('loading-screen').style.display = 'none';
            });

            // Back to Top Button
            window.addEventListener('scroll', function() {
                const backToTop = document.getElementById('back-to-top');
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });

            document.getElementById('back-to-top').addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Cookie Consent
            if (!localStorage.getItem('cookieConsent')) {
                document.getElementById('cookie-consent').style.display = 'block';
            }

            document.getElementById('accept-cookies').addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'accepted');
                document.getElementById('cookie-consent').style.display = 'none';
            });

            document.getElementById('decline-cookies').addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'declined');
                document.getElementById('cookie-consent').style.display = 'none';
            });

            // WhatsApp Float Button Animation
            const whatsappBtn = document.querySelector('.whatsapp-btn');
            if (whatsappBtn) {
                setInterval(function() {
                    whatsappBtn.classList.add('pulse');
                    setTimeout(function() {
                        whatsappBtn.classList.remove('pulse');
                    }, 1000);
                }, 5000);
            }

            // Smooth Scrolling for Anchor Links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Form Validation Enhancement
            const forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        </script>

        <!-- Additional Scripts Stack -->
        @stack('scripts')
        @yield('scripts')

        <!-- Performance Monitoring -->
        @if(config('app.env') === 'production')
        <script>
            // Performance monitoring
            window.addEventListener('load', function() {
                setTimeout(function() {
                    const perfData = performance.getEntriesByType('navigation')[0];
                    if (perfData) {
                        // Send performance data to analytics
                        gtag('event', 'page_load_time', {
                            'event_category': 'Performance',
                            'event_label': 'Load Time',
                            'value': Math.round(perfData.loadEventEnd - perfData.fetchStart)
                        });
                    }
                }, 1000);
            });
        </script>
        @endif
    </body>
</html>