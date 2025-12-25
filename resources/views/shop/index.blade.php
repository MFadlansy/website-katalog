@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<div class="bg-[#f7f3ef]">
<div class="max-w-7xl mx-auto px-6 py-20 md:py-28">

    <!-- Judul Halaman -->
    <div class="text-center mb-20">
        <h1 class="font-serif text-3xl md:text-4xl text-[#2a241b] mb-4">
            Katalog Produk
        </h1>
        <p class="text-[#6b6258] font-light text-sm md:text-base">
            Temukan koleksi terbaik untuk gaya Anda
        </p>
    </div>

    <div class="flex flex-col md:flex-row gap-12 md:gap-20">

        <!-- Sidebar Kategori -->
        <aside class="w-full md:w-1/4">
            <div class="sticky top-32 bg-[#ffffff]
                        p-6 rounded-2xl
                        border border-[#e5dfd6]">
                <h3 class="font-serif text-lg
                           text-[#2a241b]
                           border-b border-[#e5dfd6]
                           pb-3 mb-6">
                    Kategori
                </h3>

                <ul class="space-y-4 text-sm text-[#6b6258]">
                    <li>
                        <a href="{{ route('shop') }}"
                           class="{{ !request('kategori')
                               ? 'text-[#2a241b] font-semibold'
                               : 'hover:text-[#2a241b]' }}
                           transition">
                            Semua Produk
                        </a>
                    </li>

                    @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('shop', ['kategori' => $cat->slug]) }}"
                               class="{{ request('kategori') == $cat->slug
                                   ? 'text-[#2a241b] font-semibold'
                                   : 'hover:text-[#2a241b]' }}
                               capitalize transition">
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

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4
                            gap-x-6 gap-y-12">

                    @foreach($products as $product)
                        <div class="group cursor-pointer
                                    bg-white rounded-2xl
                                    border border-[#e5dfd6]
                                    hover:shadow-lg
                                    transition overflow-hidden">

                            <div class="relative aspect-[3/4]
                                        bg-[#ede7df] overflow-hidden">
                                <a href="{{ route('product.detail', $product->slug) }}">
                                    @if(!empty($product->images) && isset($product->images[0]))
                                        <img src="{{ asset('storage/' . $product->images[0]) }}"
                                             alt="{{ $product->name }}"
                                             class="w-full h-full object-cover
                                                    transition-transform duration-700
                                                    group-hover:scale-105">
                                    @else
                                        <div class="flex items-center justify-center
                                                    h-full text-[#6b6258]
                                                    font-serif">
                                            No Image
                                        </div>
                                    @endif

                                    <div class="absolute inset-x-0 bottom-0
                                                bg-[#2a241b]/80
                                                py-3 text-center
                                                text-[#f7f3ef]
                                                text-[10px]
                                                uppercase tracking-[0.3em]
                                                opacity-0
                                                group-hover:opacity-100
                                                transition">
                                        View Detail
                                    </div>
                                </a>
                            </div>

                            <div class="px-4 py-5 text-center">
                                <p class="text-[10px]
                                          text-[#6b6258]
                                          uppercase tracking-widest mb-2">
                                    {{ $product->category->name ?? 'No Category' }}
                                </p>

                                <h3 class="text-sm text-[#2a241b]
                                           font-medium
                                           group-hover:text-[#6b6258]
                                           transition">
                                    <a href="{{ route('product.detail', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>

                                <p class="text-sm font-serif
                                          text-[#6b6258] mt-1">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <span class="block mt-3
                                    text-[10px] uppercase tracking-widest
                                    {{ $product->stock <= 5
                                        ? 'text-red-600 font-semibold'
                                        : 'text-[#6b6258]' }}">
                                    {{ $product->stock <= 5 ? 'Hampir Habis' : 'Tersedia' }}
                                    : {{ $product->stock }}
                                </span>
                            </div>

                        </div>
                    @endforeach
                </div>

                <div class="mt-16">
                    {{ $products->appends(request()->query())->links() }}
                </div>

            @else
                <div class="text-center py-24
                            bg-[#ede7df]
                            rounded-2xl">
                    <p class="text-[#6b6258]
                              font-serif text-lg mb-6">
                        Produk tidak ditemukan di kategori ini.
                    </p>
                    <a href="{{ route('shop') }}"
                       class="text-xs font-bold uppercase
                              tracking-widest
                              text-[#2a241b]
                              border-b border-[#2a241b]
                              pb-1">
                        Lihat Semua Produk
                    </a>
                </div>
            @endif
        </div>

    </div>
</div>
</div>
@endsection
