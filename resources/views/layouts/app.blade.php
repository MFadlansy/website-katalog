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
        /* Agar transisi hover halus */
        .product-img { transition: transform 0.5s ease; }
        .product-card:hover .product-img { transform: scale(1.02); }
    </style>
</head>
<body class="bg-white text-brand-black antialiased">

    <!-- <div class="bg-brand-black text-white text-xs text-center py-2 tracking-widest uppercase">
        Gratis Ongkir Seluruh Indonesia
    </div> -->

    <nav class="bg-white sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <button class="p-2 -ml-2 mr-2 md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <div class="hidden md:flex space-x-8 text-sm uppercase tracking-wide text-gray-500">
                        <a href="{{ route('home') }}" class="hover:text-black transition">Home</a>
                        <a href="{{ route('shop') }}" class="hover:text-black transition">Shop</a>
                        <a href="{{ route('home') }}#about" class="hover:text-black transition">About</a>
                    </div>
                </div>

                <div class="flex-shrink-0 flex items-center justify-center absolute left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('home') }}" class="font-serif text-3xl font-bold tracking-tighter">
                        {{ strtoupper($shop->shop_name ?? 'EIWA STYLE') }}
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-black"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 mt-20 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 text-sm text-gray-600">
            <div class="md:col-span-2 pr-8">
                <h3 class="font-serif text-lg text-black mb-4">About Us</h3>
                <p class="leading-relaxed">{{ $shop->address ?? 'Deskripsi singkat brand Anda yang menceritakan tentang kualitas dan gaya.' }}</p>
            </div>
            <div>
                <h3 class="font-bold text-black uppercase tracking-widest mb-4 text-xs">Information</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Cara Pemesanan</a></li>
                    <li><a href="#" class="hover:underline">Konfirmasi Pembayaran</a></li>
                    <li><a href="#" class="hover:underline">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-black uppercase tracking-widest mb-4 text-xs">Social</h3>
                <ul class="space-y-2">
                    <li><a href="{{ $shop->instagram_link ?? '#' }}" class="hover:underline">Instagram</a></li>
                    <!-- <li><a href="{{ $shop->whatsapp_number ?? '#' }}" class="hover:underline">WhatsApp</a></li> -->
                </ul>
            </div>
        </div>
        <div class="text-center text-xs text-gray-400 mt-16">
            &copy; {{ date('Y') }} {{ $shop->shop_name ?? 'Brand' }}. All rights reserved.
        </div>
    </footer>

    <script>
        // 1. Reset Scroll Position
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.scrollTo(0, 0);

        document.addEventListener("DOMContentLoaded", function() {
            // 2. Deteksi Reload
            const entries = performance.getEntriesByType("navigation");
            const isReload = (entries.length > 0 && entries[0].type === 'reload') 
                          || (window.performance && window.performance.navigation && window.performance.navigation.type === 1);

            // 3. Cek Status Home (Versi Anti-Merah di Editor)
            const isHomePage = "{{ request()->routeIs('home') }}" === "1";

            // 4. Redirect jika bukan home dan hasil reload
            if (!isHomePage && isReload) {
                window.location.href = "{{ route('home') }}";
            }
        });
    </script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>