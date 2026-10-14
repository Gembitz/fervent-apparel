{{-- 
    Product Card Component — <x-product-card :product="$product" />
    Expects an associative array with keys:
    id, name, slug, brand, price, originalPrice, discount, rating, reviews, colors, badge, image, sizes
--}}
@props(['product'])

@php
    $badgeColors = [
        'TRENDING'      => 'bg-[#1B2A4A] text-white',
        'NEW'           => 'bg-[#2563EB] text-white',
        'SALE'          => 'bg-[#DC2626] text-white',
        'FAST DELIVERY' => 'bg-[#059669] text-white',
    ];
    $badgeClass = $badgeColors[$product['badge']] ?? 'bg-slate-700 text-white';
@endphp

<div
    x-data="{ hovered: false, wishlisted: false, quickView: false }"
    @mouseenter="hovered = true"
    @mouseleave="hovered = false"
    class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col border border-slate-100 hover:border-slate-200"
>
    {{-- ===== Image Container ===== --}}
    <a href="{{ route('products.show', $product['slug']) }}" class="relative block overflow-hidden aspect-[3/4] bg-slate-50">
        {{-- Product Image with Hover Zoom --}}
        <img
            src="{{ $product['image'] }}"
            alt="{{ $product['name'] }}"
            loading="lazy"
            class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 ease-out"
            :class="hovered ? 'scale-110' : 'scale-100'"
        >

        {{-- Overlay gradient on hover --}}
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent transition-opacity duration-500"
            :class="hovered ? 'opacity-100' : 'opacity-0'"
        ></div>

        {{-- Badge --}}
        @if($product['badge'])
            <span class="absolute top-3 left-3 {{ $badgeClass }} text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full shadow-md z-10">
                {{ $product['badge'] }}
            </span>
        @endif

        {{-- Discount Percentage --}}
        @if($product['discount'])
            <span class="absolute top-3 right-3 bg-[#DC2626] text-white text-[10px] font-extrabold w-10 h-10 rounded-full flex items-center justify-center shadow-lg z-10">
                -{{ $product['discount'] }}%
            </span>
        @endif
    </a>

    {{-- ===== Wishlist Button (floating) ===== --}}
    <button
        type="button"
        @click.prevent="wishlisted = !wishlisted"
        class="absolute top-3 z-20 p-2 rounded-full backdrop-blur-sm transition-all duration-300 focus:outline-none"
        :class="wishlisted
            ? 'bg-red-50 text-[#DC2626] shadow-md right-3'
            : 'bg-white/80 text-slate-400 hover:text-[#DC2626] hover:bg-white shadow-sm right-3'"
        :style="$product['discount'] ? 'top: 3.5rem' : ''"
        title="Tambah ke Favorit"
    >
        <svg class="w-5 h-5 transition-transform duration-300" :class="wishlisted ? 'scale-110' : 'scale-100'" :fill="wishlisted ? 'currentColor' : 'none'" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
        </svg>
    </button>

    {{-- ===== Quick Actions Overlay (visible on hover) ===== --}}
    <div
        class="absolute bottom-[calc(35%)] left-0 right-0 px-4 flex flex-col items-center gap-2 transition-all duration-500 z-10"
        :class="hovered ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
    >
        <a
            href="{{ route('products.show', $product['slug']) }}"
            class="w-full bg-white/95 backdrop-blur-sm text-[#1B2A4A] text-xs font-bold uppercase tracking-wider text-center py-2.5 rounded-lg hover:bg-[#1B2A4A] hover:text-white transition-all duration-300 shadow-lg"
        >
            Lihat Detail
        </a>
        <button
            type="button"
            class="w-full bg-[#1B2A4A]/90 backdrop-blur-sm text-white text-xs font-bold uppercase tracking-wider text-center py-2.5 rounded-lg hover:bg-[#2563EB] transition-all duration-300 shadow-lg"
        >
            + Tambah ke Keranjang
        </button>
    </div>

    {{-- ===== Card Info Body ===== --}}
    <div class="p-4 flex flex-col flex-grow">
        {{-- Brand --}}
        <span class="text-[10px] font-semibold tracking-widest uppercase text-slate-400 mb-1">
            {{ $product['brand'] }}
        </span>

        {{-- Product Name --}}
        <a href="{{ route('products.show', $product['slug']) }}" class="text-sm font-semibold text-[#1B2A4A] leading-snug hover:text-[#2563EB] transition line-clamp-2 mb-2">
            {{ $product['name'] }}
        </a>

        {{-- Color Swatches --}}
        @if(!empty($product['colors']))
            <div class="flex items-center gap-1.5 mb-3">
                @foreach($product['colors'] as $color)
                    <span
                        class="w-4 h-4 rounded-full border-2 transition-transform hover:scale-125 cursor-pointer"
                        style="background-color: {{ $color }}; border-color: {{ $color === '#FFFFFF' || $color === '#F9FAFB' || $color === '#F3F4F6' || $color === '#F5F5DC' ? '#d1d5db' : $color }};"
                        title="{{ $color }}"
                    ></span>
                @endforeach
                @if(count($product['colors']) > 3)
                    <span class="text-[10px] text-slate-400 font-medium ml-0.5">+{{ count($product['colors']) - 3 }}</span>
                @endif
            </div>
        @endif

        {{-- Rating --}}
        <div class="flex items-center gap-1.5 mb-3">
            <div class="flex items-center">
                @for($i = 1; $i <= 5; $i++)
                    <svg class="w-3.5 h-3.5 {{ $i <= floor($product['rating']) ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            <span class="text-[11px] font-semibold text-slate-700">{{ $product['rating'] }}</span>
            <span class="text-[10px] text-slate-400">({{ $product['reviews'] }})</span>
        </div>

        {{-- Price Block --}}
        <div class="mt-auto flex items-end gap-2">
            <span class="text-base font-bold text-[#1B2A4A]">
                Rp{{ number_format($product['price'], 0, ',', '.') }}
            </span>
            @if($product['originalPrice'])
                <span class="text-xs text-slate-400 line-through">
                    Rp{{ number_format($product['originalPrice'], 0, ',', '.') }}
                </span>
            @endif
        </div>
    </div>
</div>
