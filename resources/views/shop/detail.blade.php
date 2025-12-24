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

        {{-- IMAGE SLIDER --}}
        <div class="md:col-span-7">
        @if(!empty($product->images) && count($product->images) > 0)

        <div
            x-data="{
                active: 0,
                total: {{ count($product->images) }},
                interval: null,
                autoPlay: true,

                next() {
                    this.active = (this.active + 1) % this.total
                },
                prev() {
                    this.active = (this.active - 1 + this.total) % this.total
                },

                startAuto() {
                    if (!this.autoPlay) return
                    this.interval = setInterval(() => {
                        this.next()
                    }, 2000)
                },

                stopAuto() {
                    this.autoPlay = false
                    clearInterval(this.interval)
                }
            }"
            x-init="startAuto()"
            class="relative w-full overflow-hidden rounded-lg bg-gray-100"
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

            {{-- PREV --}}
            <button
                @click="stopAuto(); prev()"
                type="button"
                class="absolute left-3 top-1/2 -translate-y-1/2 z-10
                    bg-white/80 hover:bg-white p-2 rounded-full shadow">
                ‹
            </button>

            <button
                @click="stopAuto(); next()"
                type="button"
                class="absolute right-3 top-1/2 -translate-y-1/2 z-10
                    bg-white/80 hover:bg-white p-2 rounded-full shadow">
                ›
            </button>

        </div>

        @else
        <div class="aspect-[3/4] bg-gray-100 flex items-center justify-center text-gray-400">
            No Image Available
        </div>
        @endif
        </div>

        {{-- PRODUCT INFO --}}
        <div class="md:col-span-5 relative">
            <div class="sticky top-28">
                <h1 class="font-serif text-3xl md:text-4xl text-brand-black mb-3 leading-tight">
                    {{ $product->name }}
                </h1>

                <p class="text-xl text-gray-600 font-serif mb-8">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <a href="{{ $waUrl }}" target="_blank"
                   class="block w-full bg-brand-black text-white text-center py-4
                          text-xs font-bold uppercase tracking-[0.2em]
                          hover:bg-gray-800 transition shadow-sm hover:shadow-md mb-6">
                    Order via WhatsApp
                </a>

                <div class="border-t border-gray-100 pt-6 text-gray-600 text-sm leading-relaxed space-y-4 font-light">
                    {!! $product->description !!}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 space-y-2">
                    <div class="flex items-center gap-3 text-xs text-gray-500 uppercase tracking-wider">
                        <span>✔ Original Product</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs text-gray-500 uppercase tracking-wider">
                        <span>⏱ Siap Dikirim Segera</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
