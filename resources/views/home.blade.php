@extends('layouts.app')

@section('title', 'Official Store')

@section('content')
    
    <div class="relative w-full h-[85vh] bg-gray-200 overflow-hidden">
        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=2070&auto=format&fit=crop" 
             class="w-full h-full object-cover object-top" 
             alt="Banner">
        
        <div class="absolute inset-0 bg-black bg-opacity-10 flex flex-col justify-center items-center text-center text-white p-4">
            <h2 class="font-serif text-5xl md:text-6xl mb-4 shadow-sm">Timeless Elegance</h2>
            <p class="text-lg mb-8 tracking-wide font-light">Koleksi terbaru untuk gaya Anda</p>
            <a href="#katalog" class="bg-white text-black px-8 py-3 uppercase tracking-widest text-xs font-bold hover:bg-black hover:text-white transition duration-300">
                Shop Now
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12 flex justify-center space-x-8 overflow-x-auto whitespace-nowrap">
        @foreach($categories as $cat)
            <a href="{{ route('shop', ['kategori' => $cat->slug]) }}" 
            class="text-gray-500 hover:text-black uppercase text-xs tracking-widest border-b-2 border-transparent hover:border-black pb-1 transition">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <div id="katalog" class="max-w-7xl mx-auto px-4 pb-20">
        <div class="text-center mb-12">
            <h3 class="font-serif text-3xl text-brand-black">New Arrivals</h3>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-12">
            @foreach($featuredProducts as $product)
                <div class="group cursor-pointer product-card">
                    <div class="relative aspect-[3/4] bg-gray-100 overflow-hidden mb-4">
                        <a href="{{ route('product.detail', $product->slug) }}">
                            @if(!empty($product->images) && isset($product->images[0]))
                                <img src="{{ asset('storage/' . $product->images[0]) }}" 
                                     alt="{{ $product->name }}" 
                                     class="product-img w-full h-full object-cover">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-300 font-serif">No Image</div>
                            @endif
                            
                            <div class="absolute inset-x-0 bottom-0 bg-white bg-opacity-90 py-3 text-center uppercase text-xs tracking-widest opacity-0 group-hover:opacity-100 transition duration-300">
                                View Detail
                            </div>
                        </a>
                    </div>

                    <div class="text-center">
                        <h3 class="text-sm text-gray-900 font-medium group-hover:text-gray-600 transition">
                            <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 mt-1 font-serif">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- SECTION 1: PROFIL / OUR STORY (Split Layout) --}}
    <section id="about" class="w-full bg-white border-t border-gray-100">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="relative h-[60vh] md:h-auto overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070&auto=format&fit=crop" 
                     alt="Our Story" 
                     class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
            </div>
            
            <div class="flex flex-col justify-center px-8 py-16 md:px-20 md:py-24 bg-brand-gray/30">
                <span class="text-xs font-bold tracking-[0.2em] text-gray-400 uppercase mb-4">The Philosophy</span>
                <h2 class="font-serif text-4xl md:text-5xl text-brand-black mb-6 leading-tight">
                    Crafting Beauty in Every Detail
                </h2>
                <p class="text-gray-600 font-light leading-relaxed mb-8 text-justify">
                    {{ $shop->shop_name ?? 'BRAND KAMI' }} lahir dari kecintaan pada estetika yang tak lekang oleh waktu. 
                    Kami percaya bahwa gaya bukan hanya tentang apa yang Anda kenakan, tetapi bagaimana pakaian tersebut membuat Anda merasa percaya diri.
                    Setiap koleksi dikurasi dengan hati-hati, memadukan material terbaik dengan sentuhan desain modern.
                </p>
                <div>
                    <a href="#" class="inline-block border-b border-black pb-1 text-xs font-bold uppercase tracking-widest hover:text-gray-600 transition">
                        Read Our Full Story
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: VALUES / KEUNGGULAN (Dark Section) --}}
    <section class="bg-[#1a1a1a] text-white py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-brand-gold text-xs font-bold tracking-[0.2em] uppercase">Why Choose Us</span>
                <h2 class="font-serif text-3xl md:text-4xl mt-3">Excellence in Service</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div class="space-y-4 px-4">
                    <div class="w-12 h-12 mx-auto border border-gray-600 rounded-full flex items-center justify-center text-brand-gold mb-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl tracking-wide">Premium Quality</h3>
                    <p class="text-gray-400 text-sm font-light leading-relaxed">
                        Kami menjamin keaslian dan kualitas bahan premium di setiap produk yang kami tawarkan kepada Anda.
                    </p>
                </div>

                <div class="space-y-4 px-4 border-t md:border-t-0 md:border-l md:border-r border-gray-800 pt-8 md:pt-0">
                    <div class="w-12 h-12 mx-auto border border-gray-600 rounded-full flex items-center justify-center text-brand-gold mb-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl tracking-wide">Fast Delivery</h3>
                    <p class="text-gray-400 text-sm font-light leading-relaxed">
                        Proses pengemasan yang cepat dan pengiriman yang aman agar produk segera sampai di tangan Anda.
                    </p>
                </div>

                <div class="space-y-4 px-4 border-t md:border-t-0 border-gray-800 pt-8 md:pt-0">
                    <div class="w-12 h-12 mx-auto border border-gray-600 rounded-full flex items-center justify-center text-brand-gold mb-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl tracking-wide">24/7 Support</h3>
                    <p class="text-gray-400 text-sm font-light leading-relaxed">
                        Tim admin kami siap membantu pertanyaan Anda kapan saja melalui WhatsApp untuk pengalaman belanja terbaik.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection