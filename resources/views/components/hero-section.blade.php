@props([
    'title' => 'Koleksi Terbaru Wanita',
    'subtitle' => 'Busana kontemporer pilihan dengan siluet presisi, material premium, dan detail editorial yang dirancang untuk wanita urban modern.',
    'tag' => 'CURATED CAPSULE 2025: VOLUME 04',
    'count' => null,
    'breadcrumb' => [
        ['label' => 'Beranda', 'url' => url('/')],
        ['label' => 'Koleksi', 'url' => null]
    ]
])

<section class="border-b border-slate-200/70 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
        {{-- Breadcrumb --}}
        @if(!empty($breadcrumb))
            <nav class="flex items-center text-[11px] text-slate-400 font-medium tracking-wide uppercase mb-4" aria-label="Breadcrumb">
                @foreach($breadcrumb as $index => $item)
                    @if(!$loop->first)
                        <svg class="w-3.5 h-3.5 mx-2 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    @endif
                    @if(!empty($item['url']))
                        <a href="{{ $item['url'] }}" class="hover:text-[#1B2A4A] transition">{{ $item['label'] }}</a>
                    @else
                        <span class="text-[#1B2A4A] font-semibold">{{ $item['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        @endif

        {{-- Collection Tag & Count --}}
        <div class="flex items-center gap-3 mb-3">
            @if($tag)
                <span class="inline-flex items-center bg-[#1B2A4A] text-white text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full">
                    {{ $tag }}
                </span>
            @endif
            @if($count !== null)
                <span class="hidden sm:inline text-[10px] text-slate-400 tracking-wide uppercase font-medium">
                    {{ $count }} Produk Ditemukan
                </span>
            @endif
        </div>

        {{-- Title & Subtitle --}}
        <h1 class="font-serif text-2xl md:text-3xl font-bold text-[#1B2A4A] tracking-tight mb-1">
            {{ $title }}
        </h1>
        @if($subtitle)
            <p class="text-sm text-slate-500 max-w-2xl leading-relaxed">
                {{ $subtitle }}
            </p>
        @endif

        {{-- Slot for extra elements (e.g. Quick filters, CTA, etc.) --}}
        @if(isset($slot) && trim($slot))
            <div class="mt-5">
                {{ $slot }}
            </div>
        @endif
    </div>
</section>
