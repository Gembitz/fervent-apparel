@extends('layout.app')

@section('title', 'Koleksi Terbaru — FERVENT APPAREL')

@section('content')
<div class="bg-[#FBFBFB]">

    {{-- ===== BREADCRUMB & HERO / COLLECTION HEADER ===== --}}
    <x-hero-section
        title="Koleksi Terbaru Wanita"
        subtitle="Busana kontemporer pilihan dengan siluet presisi, material premium, dan detail editorial yang dirancang untuk wanita urban modern."
        tag="CURATED CAPSULE 2025: VOLUME 04"
        :count="count($products)"
        :breadcrumb="[
            ['label' => 'Beranda', 'url' => url('/')],
            ['label' => 'Koleksi', 'url' => null]
        ]"
    >
        {{-- Quick Filters --}}
        <div class="flex flex-wrap items-center gap-2" x-data="{ active: null }">
            @php
                $quickFilters = [
                    ['label' => 'In Stock', 'icon' => 'M5 13l4 4L19 7'],
                    ['label' => 'On Sale', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z'],
                    ['label' => 'Fast Delivery', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ['label' => 'Under Rp350k', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ];
            @endphp
            @foreach($quickFilters as $idx => $filter)
                <button
                    type="button"
                    @click="active = active === {{ $idx }} ? null : {{ $idx }}"
                    class="inline-flex items-center gap-1.5 text-xs font-semibold tracking-wide uppercase px-4 py-2 rounded-full border transition-all duration-300"
                    :class="active === {{ $idx }}
                        ? 'bg-[#1B2A4A] text-white border-[#1B2A4A] shadow-md'
                        : 'bg-white text-slate-600 border-slate-200 hover:border-[#1B2A4A] hover:text-[#1B2A4A]'"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $filter['icon'] }}"/>
                    </svg>
                    {{ $filter['label'] }}
                </button>
            @endforeach
        </div>
    </x-hero-section>

    {{-- ===== MAIN CONTENT AREA (Sidebar + Product Grid) ===== --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8" x-data="catalogFilters()">

            {{-- ===== SIDEBAR FILTER (Desktop: always visible, Mobile: drawer) ===== --}}
            <aside class="w-full lg:w-72 flex-shrink-0">
                {{-- Mobile Filter Toggle --}}
                <button
                    type="button"
                    @click="drawerOpen = !drawerOpen"
                    class="lg:hidden w-full flex items-center justify-between bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-[#1B2A4A] mb-4 shadow-sm"
                >
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        Filter & Sortir
                    </span>
                    <svg class="w-4 h-4 transition-transform" :class="drawerOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                {{-- Filter Panel --}}
                <div
                    class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition-all duration-500"
                    :class="drawerOpen ? 'max-h-[2000px] opacity-100' : 'max-h-0 opacity-0 lg:max-h-[2000px] lg:opacity-100'"
                >
                    <div class="p-5 space-y-6">

                        {{-- Filter Header --}}
                        <div class="flex items-center justify-between">
                            <h3 class="text-xs font-bold tracking-widest uppercase text-[#1B2A4A]">Filter Produk</h3>
                            <button
                                type="button"
                                @click="resetAll()"
                                class="text-[10px] text-[#2563EB] hover:text-blue-700 font-semibold uppercase tracking-wider transition"
                            >
                                Reset Semua
                            </button>
                        </div>

                        <hr class="border-slate-100">

                        {{-- ── Category Filter ── --}}
                        <div>
                            <h4 class="text-[11px] font-bold tracking-wider uppercase text-slate-600 mb-3">Kategori</h4>
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                    <label class="flex items-center justify-between cursor-pointer group py-0.5">
                                        <span class="flex items-center gap-2.5">
                                            <input
                                                type="checkbox"
                                                value="{{ $category['name'] }}"
                                                x-model="selectedCategories"
                                                class="w-4 h-4 rounded border-slate-300 text-[#1B2A4A] focus:ring-[#2563EB] focus:ring-offset-0 transition"
                                            >
                                            <span class="text-sm text-slate-700 group-hover:text-[#1B2A4A] transition">{{ $category['name'] }}</span>
                                        </span>
                                        <span class="text-[10px] text-slate-400 bg-slate-50 px-2 py-0.5 rounded-full font-medium">{{ $category['count'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        {{-- ── Price Range Slider ── --}}
                        <div>
                            <h4 class="text-[11px] font-bold tracking-wider uppercase text-slate-600 mb-3">Rentang Harga</h4>
                            <div class="space-y-3">
                                {{-- Min Slider --}}
                                <div>
                                    <label class="text-[10px] text-slate-400 uppercase tracking-wide">Minimum</label>
                                    <input
                                        type="range"
                                        min="0" max="2000000" step="50000"
                                        x-model.number="priceMin"
                                        class="w-full h-1.5 bg-slate-200 rounded-full appearance-none cursor-pointer accent-[#1B2A4A]"
                                    >
                                </div>
                                {{-- Max Slider --}}
                                <div>
                                    <label class="text-[10px] text-slate-400 uppercase tracking-wide">Maksimum</label>
                                    <input
                                        type="range"
                                        min="0" max="2000000" step="50000"
                                        x-model.number="priceMax"
                                        class="w-full h-1.5 bg-slate-200 rounded-full appearance-none cursor-pointer accent-[#1B2A4A]"
                                    >
                                </div>
                                {{-- Display --}}
                                <div class="flex items-center justify-between text-xs font-semibold text-[#1B2A4A]">
                                    <span class="bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-100" x-text="'Rp' + priceMin.toLocaleString('id-ID')"></span>
                                    <span class="text-slate-300 text-[10px]">—</span>
                                    <span class="bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-100" x-text="'Rp' + priceMax.toLocaleString('id-ID')"></span>
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        {{-- ── Size Filter ── --}}
                        <div>
                            <h4 class="text-[11px] font-bold tracking-wider uppercase text-slate-600 mb-3">Ukuran</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($sizes as $size)
                                    <button
                                        type="button"
                                        @click="toggleSize('{{ $size }}')"
                                        class="min-w-[2.5rem] h-9 flex items-center justify-center text-xs font-semibold rounded-lg border transition-all duration-200"
                                        :class="selectedSizes.includes('{{ $size }}')
                                            ? 'bg-[#1B2A4A] text-white border-[#1B2A4A] shadow-md'
                                            : 'bg-white text-slate-600 border-slate-200 hover:border-[#1B2A4A] hover:text-[#1B2A4A]'"
                                    >
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        {{-- ── Color Palette ── --}}
                        <div>
                            <h4 class="text-[11px] font-bold tracking-wider uppercase text-slate-600 mb-3">Warna</h4>
                            <div class="flex flex-wrap gap-2.5">
                                @foreach($colorPalette as $color)
                                    <button
                                        type="button"
                                        @click="toggleColor('{{ $color['hex'] }}')"
                                        class="w-8 h-8 rounded-full border-2 transition-all duration-200 relative flex items-center justify-center hover:scale-110"
                                        :class="selectedColors.includes('{{ $color['hex'] }}')
                                            ? 'ring-2 ring-offset-2 ring-[#2563EB] scale-110'
                                            : ''"
                                        style="background-color: {{ $color['hex'] }}; border-color: {{ $color['hex'] === '#F9FAFB' ? '#d1d5db' : $color['hex'] }};"
                                        title="{{ $color['name'] }}"
                                    >
                                        {{-- Checkmark for selected --}}
                                        <svg
                                            x-show="selectedColors.includes('{{ $color['hex'] }}')"
                                            x-cloak
                                            class="w-4 h-4"
                                            :class="'{{ $color['hex'] }}' === '#F9FAFB' || '{{ $color['hex'] }}' === '#FFFFFF' ? 'text-slate-700' : 'text-white'"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Apply Button (mobile) --}}
                        <button
                            type="button"
                            @click="drawerOpen = false"
                            class="lg:hidden w-full bg-[#1B2A4A] text-white text-sm font-bold uppercase tracking-wider py-3 rounded-xl hover:bg-[#243B66] transition shadow-md"
                        >
                            Terapkan Filter
                        </button>
                    </div>
                </div>
            </aside>

            {{-- ===== PRODUCT GRID ===== --}}
            <div class="flex-1 min-w-0">
                {{-- Sort Bar --}}
                <div class="flex items-center justify-between mb-6 bg-white rounded-xl border border-slate-200/80 px-4 py-3 shadow-sm">
                    <p class="text-sm text-slate-500 hidden sm:block">
                        Menampilkan <span class="font-semibold text-[#1B2A4A]">{{ count($products) }}</span> produk
                    </p>
                    <div class="flex items-center gap-3 ml-auto">
                        <label class="text-xs text-slate-400 uppercase tracking-wide font-medium">Urutkan:</label>
                        <select
                            x-model="sortBy"
                            class="text-sm text-[#1B2A4A] font-semibold bg-transparent border-none focus:ring-0 pr-8 cursor-pointer"
                        >
                            <option value="newest">Terbaru</option>
                            <option value="price-low">Harga Terendah</option>
                            <option value="price-high">Harga Tertinggi</option>
                            <option value="popular">Terpopuler</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>
                    </div>
                </div>

                {{-- Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                {{-- Pagination Placeholder --}}
                <div class="mt-10 flex items-center justify-center gap-2">
                    <button class="w-10 h-10 rounded-lg bg-[#1B2A4A] text-white text-sm font-bold shadow-md">1</button>
                    <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 text-slate-600 text-sm font-medium hover:border-[#1B2A4A] hover:text-[#1B2A4A] transition">2</button>
                    <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 text-slate-600 text-sm font-medium hover:border-[#1B2A4A] hover:text-[#1B2A4A] transition">3</button>
                    <span class="text-slate-400 px-1">...</span>
                    <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 text-slate-600 text-sm font-medium hover:border-[#1B2A4A] hover:text-[#1B2A4A] transition">12</button>
                    <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 text-slate-500 text-sm hover:border-[#1B2A4A] hover:text-[#1B2A4A] transition flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== EDITORIAL PROMO BANNER ===== --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#1B2A4A] via-[#243B66] to-[#101B30] text-white shadow-2xl">
            {{-- Decorative Elements --}}
            <div class="absolute top-0 right-0 w-80 h-80 bg-[#2563EB]/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#2563EB]/8 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>
            <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-white/3 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>

            <div class="relative flex flex-col md:flex-row items-center gap-8 p-8 md:p-12 lg:p-16">
                {{-- Text Content --}}
                <div class="flex-1 text-center md:text-left">
                    <span class="inline-block text-[10px] font-bold tracking-[0.3em] uppercase text-[#93C5FD] bg-white/10 backdrop-blur-sm px-4 py-1.5 rounded-full mb-5">
                        Capsule Eksklusif — Edisi Terbatas
                    </span>
                    <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-bold leading-tight tracking-tight mb-4">
                        Curated Capsule<br>
                        <span class="text-[#93C5FD]">2025: Volume 04</span>
                    </h2>
                    <p class="text-sm md:text-base text-slate-300 leading-relaxed max-w-lg mb-8">
                        12 silhouette istimewa yang didefinisikan melalui tailoring presisi dan palet warna yang tenang — dirancang untuk transisi mulus dari siang ke malam.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-3 justify-center md:justify-start">
                        <a
                            href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-2 bg-white text-[#1B2A4A] text-sm font-bold uppercase tracking-wider px-8 py-3.5 rounded-xl hover:bg-[#93C5FD] hover:text-[#1B2A4A] transition-all duration-300 shadow-lg hover:shadow-xl"
                        >
                            Jelajahi Koleksi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <span class="text-xs text-slate-400 uppercase tracking-wider">Hanya 200 set tersedia</span>
                    </div>
                </div>

                {{-- Promo Visual --}}
                <div class="relative w-56 h-72 md:w-64 md:h-80 flex-shrink-0">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#2563EB]/30 to-transparent rounded-2xl"></div>
                    <img
                        src="https://images.unsplash.com/photo-1558171813-4c088753af8f?auto=format&fit=crop&w=600&q=80"
                        alt="Curated Capsule 2025"
                        class="w-full h-full object-cover rounded-2xl shadow-2xl"
                    >
                    <div class="absolute -bottom-3 -right-3 bg-[#DC2626] text-white text-xs font-extrabold px-4 py-2 rounded-xl shadow-lg uppercase tracking-wider">
                        Diskon s.d 40%
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    function catalogFilters() {
        return {
            drawerOpen: false,
            selectedCategories: [],
            priceMin: 0,
            priceMax: 2000000,
            selectedSizes: [],
            selectedColors: [],
            sortBy: 'newest',

            toggleSize(size) {
                const idx = this.selectedSizes.indexOf(size);
                if (idx > -1) {
                    this.selectedSizes.splice(idx, 1);
                } else {
                    this.selectedSizes.push(size);
                }
            },
            toggleColor(hex) {
                const idx = this.selectedColors.indexOf(hex);
                if (idx > -1) {
                    this.selectedColors.splice(idx, 1);
                } else {
                    this.selectedColors.push(hex);
                }
            },
            resetAll() {
                this.selectedCategories = [];
                this.priceMin = 0;
                this.priceMax = 2000000;
                this.selectedSizes = [];
                this.selectedColors = [];
                this.sortBy = 'newest';
            },
        }
    }
</script>
@endpush
