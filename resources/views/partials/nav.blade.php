<nav
    x-data="{ scrolled: false, currentSection: 'home' }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50;
            const sections = ['home', 'katalog', 'about'];
            sections.forEach(id => {
                const el = document.getElementById(id);
                if(el){
                    const top = el.offsetTop - 100;
                    const bottom = top + el.offsetHeight;
                    if(window.scrollY >= top && window.scrollY < bottom) currentSection = id;
                }
            });
        });
    "
    :class="scrolled ? 'bg-white border-b border-gray-100' : 'bg-transparent'"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
                <button class="p-2 -ml-2 mr-2 md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <div class="hidden md:flex space-x-8 text-sm uppercase tracking-wide">
                    {{-- Home selalu ke halaman / --}}
                    <a href="{{ route('home') }}" 
                    :class="currentSection === 'home' ? 'text-gray-700 active' : scrolled ? 'text-gray-700 hover:text-black' : 'text-white hover:text-gray-200'"
                    class="transition">
                        Home
                    </a>
                    <a href="#katalog" 
                    :class="currentSection === 'katalog' ? 'text-gray-700 active' : scrolled ? 'text-gray-700 hover:text-black' : 'text-white hover:text-gray-200'"
                    class="transition">
                        Shop
                    </a>
                    <a href="#about" 
                    :class="currentSection === 'about' ? 'text-gray-700 active' : scrolled ? 'text-gray-700 hover:text-black' : 'text-white hover:text-gray-200'"
                    class="transition">
                        About
                    </a>
                </div>

                <div class="flex-shrink-0 flex items-center justify-center absolute left-1/2 transform -translate-x-1/2">
                    <a href="{{ route('home') }}" class="font-serif text-3xl font-bold tracking-tighter">
                        {{ strtoupper($shop->shop_name ?? 'IRWANDHY OFFICIAL') }}
                    </a>
                </div>


        </div>
    </div>
</nav>
