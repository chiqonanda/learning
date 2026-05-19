@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div style="background: #0d3d2e; padding: 3rem 0 2rem;">
    <div class="container mx-auto px-6">
        <p style="color:#6ed282; font-size:12px; font-weight:500; letter-spacing:2px; text-transform:uppercase; margin-bottom:8px;">Koleksi Lengkap</p>
        <h1 class="font-display text-white font-bold" style="font-size:2.2rem; margin-bottom:10px;">Semua Produk</h1>
        <p style="color:#b0d8c0; font-size:14px;">{{ $products->count() }} produk tersedia</p>
    </div>
</div>

{{-- Wave --}}
<div style="background:#0d3d2e; height:40px; position:relative;">
    <svg viewBox="0 0 1440 40" preserveAspectRatio="none" style="position:absolute; bottom:0; width:100%; height:40px;" fill="#f7f5f0">
        <path d="M0,20 C360,45 1080,0 1440,20 L1440,40 L0,40 Z"/>
    </svg>
</div>

{{-- Products Grid --}}
<section style="background:#f7f5f0; padding: 3rem 0 4rem;">
    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($products as $product)

            @php
                $colors = [
                    ['bg' => 'linear-gradient(135deg, #e8f5ee, #c8ead6)', 'icon' => '🍍'],
                    ['bg' => 'linear-gradient(135deg, #fff3e0, #ffe0b2)', 'icon' => '🥭'],
                    ['bg' => 'linear-gradient(135deg, #fce4ec, #f8bbd0)', 'icon' => '🍓'],
                    ['bg' => 'linear-gradient(135deg, #e8eaf6, #c5cae9)', 'icon' => '🫐'],
                ];
                $c = $colors[$loop->index % count($colors)];
            @endphp

            <div style="background:#fff; border-radius:16px; overflow:hidden; border:1px solid #e8e2d8; display:flex; flex-direction:column; transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 16px 40px rgba(13,61,46,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">

                {{-- Gambar / Placeholder --}}
                @if($product->gambar)
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width:100%; height:180px; object-fit:cover;">
                @else
                <div style="height:180px; display:flex; align-items:center; justify-content:center; font-size:4rem; background: {{ $c['bg'] }}; position:relative;">
                    <span>{{ $c['icon'] }}</span>
                    <div style="position:absolute; top:12px; right:12px; background:rgba(13,61,46,0.7); color:#6ed282; font-size:11px; font-weight:500; padding:3px 10px; border-radius:999px;">
                        #{{ $product->id }}
                    </div>
                </div>
                @endif

                <div style="padding:20px; flex:1; display:flex; flex-direction:column;">

                    {{-- Kategori tag --}}
                    <span style="display:inline-block; background:#e8f5ee; color:#0d5c2f; font-size:11px; font-weight:500; padding:3px 10px; border-radius:999px; margin-bottom:10px; width:fit-content;">
                        {{ $product->category->nama_kategori ?? 'Fermentasi' }}
                    </span>

                    <h2 class="font-display font-bold text-stone-800" style="font-size:17px; margin-bottom:8px; line-height:1.3;">
                        {{ $product->nama_produk }}
                    </h2>

                    <p style="color:#6b7280; font-size:13px; line-height:1.65; margin-bottom:auto; padding-bottom:16px; flex:1;">
                        @if($product->deskripsi)
                            {{ Str::limit($product->deskripsi, 90) }}
                        @else
                            Minuman fermentasi alami yang kaya akan probiotik, enzim, dan nutrisi penting untuk kesehatan pencernaan.
                        @endif
                    </p>

                    {{-- Footer card --}}
                    <div style="border-top:1px solid #f0ece5; padding-top:14px; display:flex; align-items:center; justify-content:space-between;">
                        <div>
                            <p style="font-size:11px; color:#9ca3af; margin-bottom:2px;">Harga</p>
                            <p class="font-display font-bold" style="color:#0d3d2e; font-size:18px; margin:0;">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <a href="/products/{{ $product->id }}" style="background:#0d3d2e; color:#fff; font-size:13px; font-weight:500; padding:9px 18px; border-radius:9px; text-decoration:none;">
                            Detail
                        </a>
                    </div>
                </div>
            </div>

            @empty
            <div style="grid-column: 1/-1; text-align:center; padding: 4rem 0;">
                <div style="font-size:3.5rem; margin-bottom:16px;">🍵</div>
                <h3 style="font-size:18px; font-weight:600; color:#374151; margin-bottom:8px;">Belum ada produk</h3>
                <p style="color:#9ca3af; font-size:14px;">Produk akan segera hadir.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>

@endsection