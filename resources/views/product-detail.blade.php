@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 md:py-12">
    
    <nav class="text-xs text-gray-400 mb-8 uppercase tracking-wide flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-black transition">Home</a> 
        <span>/</span> 
        <span class="text-black font-medium">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
        
        <div class="md:col-span-7 space-y-4">
            @if(!empty($product->images))
                @foreach($product->images as $img)
                    <div class="bg-gray-50">
                        <img src="{{ asset('storage/' . $img) }}" 
                             class="w-full h-auto object-cover" 
                             alt="{{ $product->name }}">
                    </div>
                @endforeach
            @else
                <div class="aspect-[3/4] bg-gray-100 flex items-center justify-center text-gray-400 font-serif">
                    No Image Available
                </div>
            @endif
        </div>

        <div class="md:col-span-5 relative">
            <div class="sticky top-28"> <h1 class="font-serif text-3xl md:text-4xl text-brand-black mb-3 leading-tight">
                    {{ $product->name }}
                </h1>
                <p class="text-xl text-gray-600 font-serif mb-8">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <a href="{{ $waUrl }}" target="_blank" 
                   class="block w-full bg-brand-black text-white text-center py-4 text-xs font-bold uppercase tracking-[0.2em] hover:bg-gray-800 transition duration-300 shadow-sm hover:shadow-md mb-6">
                    Order via WhatsApp
                </a>

                <div class="border-t border-gray-100 pt-6 text-gray-600 text-sm leading-relaxed space-y-4 font-light">
                    {!! $product->description !!}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="flex items-center gap-3 text-xs text-gray-500 uppercase tracking-wider">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Original Product</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-gray-500 uppercase tracking-wider mt-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Siap Dikirim Segera</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection