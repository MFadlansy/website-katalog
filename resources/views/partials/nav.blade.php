<nav
    x-data="{
        scrolled: false,
        currentSection: 'home',
        open: false,
        isHome: {{ request()->routeIs('home') ? 'true' : 'false' }}
    }"
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.scrollY > 50;

            if(isHome){
                const sections = ['home', 'katalog', 'about'];
                sections.forEach(id => {
                    const el = document.getElementById(id);
                    if(el){
                        const top = el.offsetTop - 120;
                        const bottom = top + el.offsetHeight;
                        if(window.scrollY >= top && window.scrollY < bottom){
                            currentSection = id;
                        }
                    }
                });
            }
        });
    "
    :class="scrolled ? 'bg-white border-b border-gray-100' : 'bg-transparent'"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-20 relative">

            <!-- LEFT -->
            <div class="flex items-center">
                <!-- HAMBURGER -->
                <button
                    @click="open = !open"
                    class="p-2 -ml-2 mr-2 md:hidden"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- DESKTOP MENU -->
                <div class="hidden md:flex space-x-8 text-sm uppercase tracking-wide">

                    <!-- HOME -->
                    <a
                        :href="isHome ? '#home' : '{{ route('home') }}'"
                        @click="isHome && window.scrollTo({ top: 0, behavior: 'smooth' })"
                        :class="currentSection === 'home'
                            ? 'text-gray-700'
                            : scrolled
                                ? 'text-gray-700 hover:text-black'
                                : 'text-white hover:text-gray-200'"
                        class="transition"
                    >
                        Home
                    </a>

                    <!-- SHOP -->
                    <a
                        :href="isHome ? '#katalog' : '{{ route('home') }}#katalog'"
                        :class="currentSection === 'katalog'
                            ? 'text-gray-700'
                            : scrolled
                                ? 'text-gray-700 hover:text-black'
                                : 'text-white hover:text-gray-200'"
                        class="transition"
                    >
                        Shop
                    </a>

                    <!-- ABOUT -->
                    <a
                        :href="isHome ? '#about' : '{{ route('home') }}#about'"
                        :class="currentSection === 'about'
                            ? 'text-gray-700'
                            : scrolled
                                ? 'text-gray-700 hover:text-black'
                                : 'text-white hover:text-gray-200'"
                        class="transition"
                    >
                        About
                    </a>
                </div>
            </div>

            <!-- LOGO -->
            <div class="absolute left-1/2 -translate-x-1/2">
                <a href="{{ route('home') }}" class="font-serif text-3xl font-bold tracking-tighter">
                    {{ strtoupper($shop->shop_name ?? 'IRWANDHY OFFICIAL') }}
                </a>
            </div>
        </div>

        <!-- MOBILE MENU -->
        <div
            x-show="open"
            x-transition.origin.top
            @click.outside="open = false"
            class="md:hidden absolute top-20 left-4 sm:left-6
                w-[85%] max-w-xs
                bg-white/95 backdrop-blur
                rounded-2xl shadow-xl border border-gray-100"
        >
            <div class="py-4 flex flex-col items-center gap-3 text-sm tracking-widest uppercase">

                <a
                    :href="isHome ? '#home' : '{{ route('home') }}'"
                    @click="open = false"
                    class="px-6 py-2 rounded-lg text-gray-800 hover:bg-gray-100 transition"
                >
                    Home
                </a>

                <a
                    :href="isHome ? '#katalog' : '{{ route('home') }}#katalog'"
                    @click="open = false"
                    class="px-6 py-2 rounded-lg text-gray-800 hover:bg-gray-100 transition"
                >
                    Shop
                </a>

                <a
                    :href="isHome ? '#about' : '{{ route('home') }}#about'"
                    @click="open = false"
                    class="px-6 py-2 rounded-lg text-gray-800 hover:bg-gray-100 transition"
                >
                    About
                </a>

            </div>
        </div>

    </div>
</nav>
