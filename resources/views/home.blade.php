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
            <a href="#" class="text-gray-500 hover:text-black uppercase text-xs tracking-widest border-b-2 border-transparent hover:border-black pb-1 transition">
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
@endsection