@extends('layouts.app')

@section('title', 'Official Store')

@section('content')

<!-- Banner Section -->
<div class="relative w-full h-screen overflow-hidden pt-20">
    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop" 
         class="w-full h-full object-cover object-top" 
         alt="Banner">
    
    <div class="absolute inset-0 bg-black/30 flex flex-col justify-center items-center text-center text-white p-4" data-aos="fade-down">
        <h2 class="font-serif text-5xl md:text-6xl mb-4 shadow-sm" data-aos="fade-up" data-aos-delay="200">Timeless Elegance</h2>
        <p class="text-lg mb-8 tracking-wide font-light" data-aos="fade-up" data-aos-delay="400">Koleksi terbaru untuk gaya Anda</p>
        <a href="#katalog" class="bg-white text-black px-8 py-3 uppercase tracking-widest text-xs font-bold hover:bg-black hover:text-white transition duration-300" data-aos="zoom-in" data-aos-delay="600">
            Shop Now
        </a>
    </div>
</div>

<!-- Categories Scroll -->
<div class="max-w-7xl mx-auto px-4 py-12 flex justify-center space-x-8 overflow-x-auto whitespace-nowrap" data-aos="fade-up" data-aos-delay="200">
    @foreach($categories as $cat)
        <a href="{{ route('shop', ['kategori' => $cat->slug]) }}" 
           class="text-gray-500 hover:text-black uppercase text-xs tracking-widest border-b-2 border-transparent hover:border-black pb-1 transition">
            {{ $cat->name }}
        </a>
    @endforeach
</div>

<!-- New Arrivals -->
<div id="katalog" class="max-w-7xl mx-auto px-4 pb-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <h3 class="font-serif text-3xl text-brand-black">New Arrivals</h3>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-12">
        @foreach($featuredProducts as $product)
            <div class="group cursor-pointer product-card rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative aspect-[3/4] bg-gray-100 overflow-hidden">
                    <a href="{{ route('product.detail', $product->slug) }}">
                        @if(!empty($product->images) && isset($product->images[0]))
                            <img src="{{ asset('storage/' . $product->images[0]) }}" 
                                alt="{{ $product->name }}" 
                                class="product-img w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-300 font-serif">No Image</div>
                        @endif
                        
                        <div class="absolute inset-x-0 bottom-0 bg-white bg-opacity-90 py-3 text-center uppercase text-xs tracking-widest opacity-0 group-hover:opacity-100 transition duration-300">
                            View Detail
                        </div>
                    </a>
                </div>

                <div class="text-center p-4">
                    <h3 class="text-sm text-gray-900 font-medium group-hover:text-gray-600 transition">
                        <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <p class="text-sm text-gray-500 mt-1 font-serif">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <p class="text-[10px] mt-2 uppercase tracking-tighter {{ $product->stock <= 5 ? 'text-red-500 font-bold' : 'text-gray-400' }}">
                        Stok: {{ $product->stock }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Button Tampilkan Semua -->
    <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="400">
        <a href="{{ route('shop') }}" 
           class="inline-block bg-black text-white px-8 py-3 uppercase tracking-widest text-sm font-bold rounded-lg hover:bg-gray-800 transition duration-300 shadow-md hover:shadow-lg">
            Tampilkan Semua
        </a>
    </div>
</div>

{{-- SECTION 1: PROFIL / OUR STORY --}}
<section id="about" class="w-full bg-white border-t border-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="relative h-[60vh] md:h-auto overflow-hidden group" data-aos="fade-right">
            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070&auto=format&fit=crop" 
                 alt="Our Story" 
                 class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
        </div>
        
        <div class="flex flex-col justify-center px-8 py-16 md:px-20 md:py-24 bg-brand-gray/30" data-aos="fade-left">
            <span class="text-xs font-bold tracking-[0.2em] text-gray-400 uppercase mb-4">The Philosophy</span>
            <h2 class="font-serif text-4xl md:text-5xl text-brand-black mb-6 leading-tight">
                Crafting Beauty in Every Detail
            </h2>
            <p class="text-gray-600 font-light leading-relaxed mb-6 text-justify">
                <strong>Irwandhy Official</strong> adalah brand kreatif di bidang fashion, entertainment, dan event management 
                yang menghadirkan karya berkarakter kuat, berkelas, dan penuh nilai artistik. 
                Setiap karya dirancang dengan konsep dan cerita yang bermakna—menggabungkan estetika, kreativitas, 
                dan profesionalisme dalam satu kesatuan yang elegan.
            </p>

            <p class="text-gray-600 font-light leading-relaxed text-justify">
                Aktif di dunia entertainment dan event kreatif, Irwandhy Official berpengalaman dalam pengelolaan talent, 
                fashion show, pageant, serta event bertema budaya dan anak-anak. 
                Kami menjunjung tinggi keamanan, kenyamanan, dan energi positif, 
                memastikan setiap proses berjalan profesional dan berkesan bagi semua pihak.
            </p>
        </div>
    </div>
</section>

{{-- SECTION 2: VALUES / KEUNGGULAN --}}
<section class="bg-[#1a1a1a] text-white py-20 md:py-28">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-brand-gold text-xs font-bold tracking-[0.2em] uppercase">Why Choose Us</span>
            <h2 class="font-serif text-3xl md:text-4xl mt-3">Excellence in Service</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <div class="space-y-4 px-4" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 mx-auto border border-gray-600 rounded-full flex items-center justify-center text-brand-gold mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl tracking-wide">Strong Concept & Story</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed">
                    Setiap karya Irwandhy Official dibangun dari konsep yang kuat dan storytelling yang jelas, 
                    menggabungkan unsur budaya, fantasi, dan modernitas menjadi visual yang berkarakter dan bermakna.
                </p>
            </div>

            <div class="space-y-4 px-4 border-t md:border-t-0 md:border-l md:border-r border-gray-800 pt-8 md:pt-0" data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 mx-auto border border-gray-600 rounded-full flex items-center justify-center text-brand-gold mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl tracking-wide">Artistic & Elegant Details</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed">
                    Detail desain yang berani namun elegan, pemilihan material yang tepat, 
                    serta pengemasan visual yang artistik menjadi identitas utama dalam setiap karya yang kami hasilkan.
                </p>
            </div>

            <div class="space-y-4 px-4 border-t md:border-t-0 border-gray-800 pt-8 md:pt-0" data-aos="fade-up" data-aos-delay="600">
                <div class="w-12 h-12 mx-auto border border-gray-600 rounded-full flex items-center justify-center text-brand-gold mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                    </svg>
                </div>
                <h3 class="font-serif text-xl tracking-wide">Personal & Human-Centered</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed">
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
