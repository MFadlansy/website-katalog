@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12 md:py-20">
    <nav class="text-xs text-gray-400 mb-8 uppercase tracking-wide">
        <a href="{{ route('home') }}">Home</a> <span class="mx-2">/</span> 
        <span class="text-black">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
        
        <div class="md:col-span-7 space-y-4">
            @if(!empty($product->images))
                <div class="grid grid-cols-1 gap-4">
                    @foreach($product->images as $img)
                        <div class="bg-gray-100">
                            <img src="{{ asset('storage/' . $img) }}" class="w-full h-auto object-cover" alt="{{ $product->name }}">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="aspect-[3/4] bg-gray-100 flex items-center justify-center text-gray-400">No Image Available</div>
            @endif
        </div>

        <div class="md:col-span-5">
            <div class="sticky top-24">
                <h1 class="font-serif text-3xl md:text-4xl text-brand-black mb-2">{{ $product->name }}</h1>
                <p class="text-xl text-gray-600 font-serif mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="mb-6">
                    @if($product->stock <= 5)
                        <span class="text-[10px] font-bold uppercase tracking-widest text-red-500 bg-red-50 px-2 py-1">
                            Sisa Sedikit: {{ $product->stock }} Unit
                        </span>
                    @else
                        <span class="text-[10px] font-bold uppercase tracking-widest text-green-600 bg-green-50 px-2 py-1">
                            Stok Tersedia: {{ $product->stock }} Unit
                        </span>
                    @endif
                </div>
                <div class="border-t border-b border-gray-100 py-6 mb-8 text-gray-600 text-sm leading-relaxed">
                    {!! $product->description !!}
                </div>

                <a href="{{ $waUrl }}" target="_blank" 
                   class="block w-full bg-brand-black text-white text-center py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-gray-800 transition duration-300 mb-4">
                    Order via WhatsApp
                </a>
                
                <div class="text-xs text-gray-500 text-center space-y-2 mt-4">
                    <p>Produk tersedia & siap dikirim.</p>
                    <p class="flex justify-center items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Secure Transaction
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection