<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Online')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
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
        html { scroll-behavior: smooth; }
        .product-img { transition: transform 0.5s ease; }
        .product-card:hover .product-img { transform: scale(1.02); }
        nav a.active { border-bottom: 2px solid #1a1a1a; font-weight: bold; }
    </style>
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
</body>
</html>
