<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Online')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/Logo.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Lato', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        brand: {
                            black: '#1a1a1a', 
                            gray: '#f5f5f5',  
                            gold: '#d4af37',  
                        }
                    }
                }
            }
        }
    </script>
    <style>
    /* Tombol navigasi */
    .featuredSwiper .swiper-button-prev,
    .featuredSwiper .swiper-button-next {
        width: 44px;
        height: 44px;
        border-radius: 9999px;
        background-color: rgba(245, 243, 239, 0.95);
        border: 1px solid #2a241b;
        color: #2a241b;
        transition: all 0.3s ease;
    }

    /* Icon panah */
    .featuredSwiper .swiper-button-prev::after,
    .featuredSwiper .swiper-button-next::after {
        font-size: 14px;
        font-weight: bold;
    }

    /* Hover */
    .featuredSwiper .swiper-button-prev:hover,
    .featuredSwiper .swiper-button-next:hover {
        background-color: #2a241b;
        color: #f5f3ef;
        transform: scale(1.05);
    }

    /* Posisi tombol */
    .featuredSwiper .swiper-button-prev {
        left: -12px;
    }

    .featuredSwiper .swiper-button-next {
        right: -12px;
    }

    /* Sembunyikan tombol di mobile */
    @media (max-width: 640px) {
        .featuredSwiper .swiper-button-prev,
        .featuredSwiper .swiper-button-next {
            display: none;
        }
    }
</style>

    <style>
        html { scroll-behavior: smooth; }
        .product-img { transition: transform 0.5s ease; }
        .product-card:hover .product-img { transform: scale(1.02); }
        nav a.active { border-bottom: 2px solid #1a1a1a; font-weight: bold; }
    </style>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
</head>
<body class="bg-white text-brand-black antialiased">

    @include('partials.nav')

    <main id="home">
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
        window.scrollTo(0, 0);
    </script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- <script>
        if (window.location.pathname !== '/') {
            window.location.href = '/';
        }
    </script> -->
    <script>
        if (window.location.pathname === '/') {
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        new Swiper(".featuredSwiper", {
            loop: true,
            spaceBetween: 24,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1.2,
                },
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
    </script>
</body>
</html>
