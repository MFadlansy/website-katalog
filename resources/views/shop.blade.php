@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    
    <div class="text-center mb-12">
        <h1 class="font-serif text-3xl md:text-4xl text-brand-black mb-4">Katalog Produk</h1>
        <p class="text-gray-500 font-light">Temukan koleksi terbaik untuk gaya Anda</p>
    </div>

    <div class="flex flex-col md:flex-row gap-8 md:gap-12">
        
        <aside class="w-full md:w-1/4">
            <div class="sticky top-24">
                <h3 class="font-serif text-lg border-b border-gray-200 pb-2 mb-4">Kategori</h3>
                <ul class="space-y-3 text-sm text-gray-600">
                    <li>
                        <a href="{{ route('shop') }}" 
                           class="{{ !request('kategori') ? 'text-black font-bold' : 'hover:text-black' }}">
                            Semua Produk
                        </a>
                    </li>
                    
                    @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('shop', ['kategori' => $cat->slug]) }}" 
                               class="{{ request('kategori') == $cat->slug ? 'text-black font-bold' : 'hover:text-black' }} capitalize">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <div class="w-full md:w-3/4">
            
            @if($products->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-10">
                    @foreach($products as $product)
                        <div class="group cursor-pointer product-card">
                            <div class="relative aspect-[3/4] bg-gray-100 overflow-hidden mb-4">
                                <a href="{{ route('product.detail', $product->slug) }}">
                                    @if(!empty($product->images) && isset($product->images[0]))
                                        <img src="{{ asset('storage/' . $product->images[0]) }}" 
                                             alt="{{ $product->name }}" 
                                             class="product-img w-full h-full object-cover">
                                    @else
                                        <div class="flex items-center justify-center h-full text-gray-300 font-serif bg-gray-50">No Image</div>
                                    @endif
                                    
                                    <div class="absolute inset-x-0 bottom-0 bg-white bg-opacity-90 py-3 text-center uppercase text-xs tracking-widest opacity-0 group-hover:opacity-100 transition duration-300">
                                        View Detail
                                    </div>
                                </a>
                            </div>

                            <div class="text-center">
                                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">
                                    {{ $product->category->name ?? 'No Category' }}
                                </p>
                                <h3 class="text-sm text-gray-900 font-medium group-hover:text-gray-600 transition">
                                    <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="text-sm text-gray-500 mt-1 font-serif">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="mt-2">
                                <span class="text-[9px] uppercase tracking-widest {{ $product->stock <= 5 ? 'text-red-500 font-bold' : 'text-gray-400' }}">
                                    {{ $product->stock <= 5 ? 'Hampir Habis' : 'Tersedia' }}: {{ $product->stock }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            
            @else
                <div class="text-center py-20 bg-gray-50 rounded-lg">
                    <p class="text-gray-400 font-serif text-lg">Produk tidak ditemukan di kategori ini.</p>
                    <a href="{{ route('shop') }}" class="text-xs font-bold uppercase mt-4 inline-block border-b border-black pb-1">Lihat Semua Produk</a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection