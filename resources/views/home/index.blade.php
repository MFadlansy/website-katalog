@extends('layouts.app')

@section('title', 'Official Store')

@section('content')

<!-- HERO SECTION -->
<section
    class="relative min-h-[90vh] flex items-center"
    style="
        background-image: url('{{ asset('assets/images/hero-banner2.png') }}');
        background-size: cover;
        background-position: right center;
        background-repeat: no-repeat;
    "
>

    <!-- overlay halus biar teks kebaca -->
    <div class="absolute inset-0 bg-gradient-to-r
        from-[#2a241b]/95
        via-[#2a241b]/75
        to-transparent">
    </div>

    <!-- CONTENT -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
        <div class="max-w-xl">

            <!-- Label kecil -->
            <span class="block text-xs uppercase tracking-[0.3em] text-[#c9c3b8] mb-4">
                Irwandhy Official
            </span>

            <!-- Judul -->
            <h1 class="font-serif text-5xl md:text-6xl leading-tight text-[#f5f3ef]">
                Elegance of<br>Heritage
            </h1>

            <!-- Tagline -->
            <p class="mt-6 text-[#e0ddd8] text-sm uppercase tracking-[0.25em]">
                Fashion • Culture • Performance
            </p>

            <!-- Deskripsi -->
            <p class="mt-8 text-[#e0ddd8] font-light leading-relaxed">
                Merangkai estetika budaya, fashion, dan seni pertunjukan
                dalam karya yang berkarakter, elegan, dan bermakna.
            </p>

            <!-- Button -->
            <a href="#katalog"
               class="inline-block mt-12 border border-[#f5f3ef]
                      text-[#f5f3ef]
                      px-12 py-4 text-xs uppercase tracking-widest
                      hover:bg-[#f5f3ef]
                      hover:text-[#2a241b]
                      transition">
                Explore Collection
            </a>

        </div>
    </div>
</section>


<!-- Categories Scroll -->
<!-- <div class="max-w-7xl mx-auto px-4 py-12 flex justify-center space-x-8 overflow-x-auto whitespace-nowrap" data-aos="fade-up" data-aos-delay="200">
    @foreach($categories as $cat)
        <a href="{{ route('shop', ['kategori' => $cat->slug]) }}" 
           class="text-gray-500 hover:text-black uppercase text-xs tracking-widest border-b-2 border-transparent hover:border-black pb-1 transition">
            {{ $cat->name }}
        </a>
    @endforeach
</div> -->

{{-- NEW ARRIVALS SECTION --}}
<section id="katalog" class="relative bg-[#f7f3ef] pt-28 md:pt-20 pb-24">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Header --}}
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-xs uppercase tracking-[0.3em] text-[#a89f94] block mb-3">
                Featured Collection
            </span>
            <h3 class="font-serif text-3xl md:text-4xl text-[#2a241b]">
                New Arrivals
            </h3>
        </div>

        {{-- Swiper --}}
        <div class="relative">
            <div class="swiper featuredSwiper">
                <div class="swiper-wrapper">

                    @foreach($featuredProducts as $product)
                        <div class="swiper-slide">
                            <div class="group cursor-pointer rounded-xl overflow-hidden
                                        bg-[#fdfcfb]
                                        shadow-sm hover:shadow-xl transition-all duration-300"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $loop->index * 100 }}">

                                <div class="relative aspect-[3/4] bg-[#eae6df] overflow-hidden">
                                    <a href="{{ route('product.detail', $product->slug) }}">
                                        @if(!empty($product->images) && isset($product->images[0]))
                                            <img src="{{ asset('storage/' . $product->images[0]) }}"
                                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        @else
                                            <div class="flex items-center justify-center h-full text-[#c9c3b8] font-serif">
                                                No Image
                                            </div>
                                        @endif

                                        <div class="absolute inset-x-0 bottom-0 bg-[#f5f3ef]/95 py-3 text-center
                                                    uppercase text-[10px] tracking-[0.3em] text-[#2a241b]
                                                    opacity-0 group-hover:opacity-100 transition">
                                            View Detail
                                        </div>
                                    </a>
                                </div>

                                <div class="text-center px-4 py-5">
                                    <h3 class="text-sm font-medium text-[#2a241b] group-hover:text-[#6f665c] transition">
                                        {{ $product->name }}
                                    </h3>

                                    <p class="text-sm text-[#7d746a] mt-1 font-serif">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>

                                    <p class="text-[10px] mt-3 uppercase tracking-widest
                                        {{ $product->stock <= 5 ? 'text-red-500 font-semibold' : 'text-[#a89f94]' }}">
                                        Stok: {{ $product->stock }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- Navigation --}}
                <div class="swiper-button-prev !text-[#2a241b]"></div>
                <div class="swiper-button-next !text-[#2a241b]"></div>
            </div>
        </div>

        {{-- Button --}}
        <div class="text-center mt-20" data-aos="fade-up">
            <a href="{{ route('shop') }}"
               class="inline-flex items-center gap-2
                      border border-[#2a241b]
                      text-[#2a241b]
                      px-10 py-4 uppercase tracking-[0.3em] text-xs font-bold
                      hover:bg-[#2a241b] hover:text-[#f5f3ef] transition">
                Tampilkan Semua
            </a>
        </div>

    </div>
</section>


{{-- SECTION 1: PROFIL / OUR STORY --}}
<section id="about" class="w-full bg-[#f7f3ef] border-t border-[#e6dfd6]">
    <div class="grid grid-cols-1 md:grid-cols-2">

        <div class="relative h-[60vh] md:h-auto overflow-hidden group" data-aos="fade-right">
            <img src="{{ asset('assets/images/Logo.jpeg') }}"
                 class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
        </div>

        <div class="flex flex-col justify-center px-8 py-16 md:px-20 md:py-24 bg-[#f3efe9]" data-aos="fade-left">
            <span class="text-xs font-bold tracking-[0.2em] text-[#a89f94] uppercase mb-4">
                The Philosophy
            </span>

            <h2 class="font-serif text-4xl md:text-5xl text-[#2a241b] mb-6 leading-tight">
                Crafting Beauty in Every Detail
            </h2>

            <p class="text-[#5e554b] font-light leading-relaxed mb-6 text-justify">
                <strong>Irwandhy Official</strong> adalah brand kreatif di bidang fashion, entertainment, dan event management 
                yang berfokus pada penciptaan karya berkarakter kuat, berkelas, dan penuh nilai artistik. 
                Brand ini hadir sebagai ruang kolaborasi antara kreativitas, estetika, dan profesionalisme, 
                dengan visi menghadirkan karya yang tidak hanya indah secara visual, tetapi juga memiliki cerita, 
                konsep, dan pesan yang bermakna.
            </p>

            <p class="text-[#5e554b] font-light leading-relaxed text-justify">
                Dalam setiap karyanya, <strong>Irwandhy Official</strong> secara konsisten mengangkat unsur budaya, keunikan konsep, 
                serta pendekatan personal. Setiap busana, event, maupun produksi dikurasi dengan detail dan sentuhan artistik, 
                sehingga terasa eksklusif dan berbeda terasa memiliki jiwa.
            </p>
        </div>

    </div>
</section>


{{-- SECTION 2: VALUES / KEUNGGULAN --}}
<section class="bg-[#2a241b] text-[#f5f3ef] py-20 md:py-28">
    <div class="max-w-7xl mx-auto px-4">

        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-[#c9c3b8] text-xs font-bold tracking-[0.2em] uppercase">
                Why Choose Us
            </span>
            <h2 class="font-serif text-3xl md:text-4xl mt-3">
                Excellence in Service
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">

            <div class="space-y-4 px-4" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 mx-auto border border-[#6f665c] rounded-full
                            flex items-center justify-center text-[#e0ddd8] mb-6">
                   <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl tracking-wide">Strong Concept & Story</h3>
                <p class="text-[#d6d1cb] text-sm font-light leading-relaxed">
                    Setiap karya Irwandhy Official dibangun dari konsep yang kuat dan storytelling yang jelas, 
                    menggabungkan unsur budaya, fantasi, dan modernitas menjadi visual yang berkarakter dan bermakna.
                </p>
            </div>

            <div class="space-y-4 px-4 border-t md:border-t-0 md:border-l md:border-r border-[#3d352b] pt-8 md:pt-0"
                 data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 mx-auto border border-[#6f665c] rounded-full
                            flex items-center justify-center text-[#e0ddd8] mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl tracking-wide">Artistic & Elegant Details</h3>
                <p class="text-[#d6d1cb] text-sm font-light leading-relaxed">
                    Detail desain yang berani namun elegan, pemilihan material yang tepat, 
                    serta pengemasan visual yang artistik menjadi identitas utama dalam setiap karya yang kami hasilkan.        
                </p>
            </div>

            <div class="space-y-4 px-4 border-t md:border-t-0 border-[#3d352b] pt-8 md:pt-0"
                 data-aos="fade-up" data-aos-delay="600">
                <div class="w-12 h-12 mx-auto border border-[#6f665c] rounded-full
                            flex items-center justify-center text-[#e0ddd8] mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl tracking-wide">Personal & Human-Centered</h3>
                <p class="text-[#d6d1cb] text-sm font-light leading-relaxed">
                    Dengan pendekatan personal dan humanis, terutama dalam pendampingan talent anak, 
                    kami memastikan setiap karya tidak hanya indah dipandang, tetapi juga aman, nyaman, 
                    dan penuh nilai edukatif serta pengalaman yang berkesan.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- AOS JS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-in-out',
  });
</script>

@endsection
