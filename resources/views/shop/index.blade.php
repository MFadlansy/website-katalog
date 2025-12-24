@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-16 md:py-20">

    <!-- Judul Halaman -->
    <div class="text-center mb-16">
        <h1 class="font-serif text-3xl md:text-4xl text-brand-black mb-3">Katalog Produk</h1>
        <p class="text-gray-500 font-light text-sm md:text-base">Temukan koleksi terbaik untuk gaya Anda</p>
    </div>

    <div class="flex flex-col md:flex-row gap-10 md:gap-16">

        <!-- Sidebar Kategori -->
        <aside class="w-full md:w-1/4">
            <div class="sticky top-28 bg-white p-4 rounded-lg shadow-md">
                <h3 class="font-serif text-lg border-b border-gray-200 pb-2 mb-5">Kategori</h3>
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

        <!-- Daftar Produk -->
        <div class="w-full md:w-3/4">
            @if($products->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">

                    @foreach($products as $product)
                        <div class="group cursor-pointer bg-white rounded-xl shadow hover:shadow-lg transition duration-300 overflow-hidden">
                            
                            <div class="relative aspect-[3/4] bg-gray-100 overflow-hidden">
                                <a href="{{ route('product.detail', $product->slug) }}">
                                    @if(!empty($product->images) && isset($product->images[0]))
                                        <img src="{{ asset('storage/' . $product->images[0]) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                    @else
                                        <div class="flex items-center justify-center h-full text-gray-300 font-serif bg-gray-50">No Image</div>
                                    @endif

                                    <div class="absolute inset-x-0 bottom-0 bg-black bg-opacity-40 py-2 text-center text-white text-xs uppercase tracking-widest opacity-0 group-hover:opacity-100 transition duration-300">
                                        View Detail
                                    </div>
                                </a>
                            </div>

                            <div class="p-3 text-center">
                                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">
                                    {{ $product->category->name ?? 'No Category' }}
                                </p>
                                <h3 class="text-sm text-gray-900 font-medium group-hover:text-gray-600 transition">
                                    <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <p class="text-sm text-gray-500 mt-1 font-serif">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <span class="text-[10px] mt-2 inline-block uppercase tracking-widest {{ $product->stock <= 5 ? 'text-red-500 font-bold' : 'text-gray-400' }}">
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
