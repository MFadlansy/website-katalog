@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="bg-[#f7f3ef]">
<div class="max-w-7xl mx-auto px-6 pt-32 pb-20 md:pt-36 md:pb-28">

    {{-- BREADCRUMB --}}
    <nav class="text-xs text-[#6b6258] mb-14 uppercase tracking-wider flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-[#2a241b] transition">
            Home
        </a>
        <span>/</span>
        <span class="text-[#2a241b] font-medium">
            {{ $product->name }}
        </span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-14 md:gap-20">

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
                        this.interval = setInterval(() => this.next(), 2800)
                    },
                    stopAuto() {
                        this.autoPlay = false
                        clearInterval(this.interval)
                    }
                }"
                x-init="startAuto()"
                class="relative w-full overflow-hidden rounded-3xl
                       bg-[#ede7df] shadow-sm"
            >

                {{-- SLIDES --}}
                <div
                    class="flex transition-transform duration-700 ease-in-out"
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
                    class="absolute left-5 top-1/2 -translate-y-1/2 z-10
                           bg-[#f7f3ef]/90 hover:bg-[#f7f3ef]
                           text-[#2a241b]
                           w-11 h-11 rounded-full
                           flex items-center justify-center
                           shadow-md transition">
                    ‹
                </button>

                <button
                    @click="stopAuto(); next()"
                    type="button"
                    class="absolute right-5 top-1/2 -translate-y-1/2 z-10
                           bg-[#f7f3ef]/90 hover:bg-[#f7f3ef]
                           text-[#2a241b]
                           w-11 h-11 rounded-full
                           flex items-center justify-center
                           shadow-md transition">
                    ›
                </button>

            </div>

            @else
            <div class="aspect-[3/4] bg-[#ede7df]
                        flex items-center justify-center
                        text-[#6b6258] rounded-3xl">
                No Image Available
            </div>
            @endif
        </div>

        {{-- PRODUCT INFO --}}
        <div class="md:col-span-5">
            <div class="sticky top-32">

                <h1 class="font-serif text-3xl md:text-4xl
                           text-[#2a241b] mb-4 leading-tight">
                    {{ $product->name }}
                </h1>

                <p class="text-2xl font-serif text-[#6b6258] mb-12">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                {{-- CTA --}}
                <a href="{{ $waUrl }}" target="_blank"
                   class="block w-full rounded-full
                          bg-[#2a241b] text-[#f7f3ef]
                          text-center py-4
                          text-xs font-bold uppercase tracking-[0.25em]
                          hover:bg-[#1f1a14]
                          transition shadow-md hover:shadow-lg mb-12">
                    Order via WhatsApp
                </a>

                {{-- DESCRIPTION --}}
                <div class="border-t border-[#e5dfd6]
                            pt-8 text-[#6b6258]
                            text-sm leading-relaxed
                            space-y-4 font-light">
                    {!! $product->description !!}
                </div>

                {{-- BADGES --}}
                <div class="mt-12 pt-6 border-t border-[#e5dfd6] space-y-3">
                    <div class="text-xs uppercase tracking-widest text-[#6b6258]">
                        ✔ Original Product
                    </div>
                    <div class="text-xs uppercase tracking-widest text-[#6b6258]">
                        ⏱ Siap Dikirim Segera
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
@endsection
