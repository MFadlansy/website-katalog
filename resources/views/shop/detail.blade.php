@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-4 pt-32 pb-16 md:pt-36 md:pb-24">

    {{-- BREADCRUMB --}}
    <nav class="text-xs text-gray-400 mb-12 uppercase tracking-wider flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-black transition">Home</a>
        <span>/</span>
        <span class="text-black font-medium">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-12 md:gap-16">

        {{-- IMAGE SLIDER --}}
        <div class="md:col-span-7">
            @if(!empty($product->images) && count($product->images) > 0)

            <div
                x-data="{
                    active: 0,
                    total: {{ count($product->images) }},
                    interval: null,
                    autoPlay: true,
                    next() { this.active = (this.active + 1) % this.total },
                    prev() { this.active = (this.active - 1 + this.total) % this.total },
                    startAuto() {
                        if (!this.autoPlay) return
                        this.interval = setInterval(() => this.next(), 2500)
                    },
                    stopAuto() {
                        this.autoPlay = false
                        clearInterval(this.interval)
                    }
                }"
                x-init="startAuto()"
                class="relative w-full overflow-hidden rounded-2xl bg-gray-100 shadow-sm"
            >

                {{-- SLIDES --}}
                <div
                    class="flex transition-transform duration-500 ease-in-out"
                    :style="`transform: translateX(-${active * 100}%)`"
                >
                    @foreach($product->images as $img)
                        <div class="min-w-full">
                            <img
                                src="{{ asset('storage/' . $img) }}"
                                class="w-full h-auto object-cover"
                                alt="{{ $product->name }}"
                            >
                        </div>
                    @endforeach
                </div>

                {{-- CONTROLS --}}
                <button
                    @click="stopAuto(); prev()"
                    type="button"
                    class="absolute left-4 top-1/2 -translate-y-1/2 z-10
                           bg-white/90 hover:bg-white p-3 rounded-full shadow-md transition">
                    ‹
                </button>

                <button
                    @click="stopAuto(); next()"
                    type="button"
                    class="absolute right-4 top-1/2 -translate-y-1/2 z-10
                           bg-white/90 hover:bg-white p-3 rounded-full shadow-md transition">
                    ›
                </button>

            </div>

            @else
            <div class="aspect-[3/4] bg-gray-100 flex items-center justify-center text-gray-400 rounded-2xl">
                No Image Available
            </div>
            @endif
        </div>

        {{-- PRODUCT INFO --}}
        <div class="md:col-span-5">
            <div class="sticky top-32">

                <h1 class="font-serif text-3xl md:text-4xl text-brand-black mb-4 leading-tight">
                    {{ $product->name }}
                </h1>

                <p class="text-2xl text-gray-600 font-serif mb-10">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                {{-- CTA --}}
                <a href="{{ $waUrl }}" target="_blank"
                   class="block w-full rounded-full bg-brand-black text-white text-center py-4
                          text-xs font-bold uppercase tracking-[0.25em]
                          hover:bg-gray-800 transition shadow-md hover:shadow-lg mb-10">
                    Order via WhatsApp
                </a>

                {{-- DESCRIPTION --}}
                <div class="border-t border-gray-200 pt-8 text-gray-600 text-sm leading-relaxed space-y-4 font-light">
                    {!! $product->description !!}
                </div>

                {{-- BADGES --}}
                <div class="mt-10 pt-6 border-t border-gray-200 space-y-3">
                    <div class="flex items-center gap-3 text-xs text-gray-500 uppercase tracking-widest">
                        <span>✔ Original Product</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-gray-500 uppercase tracking-widest">
                        <span>⏱ Siap Dikirim Segera</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
