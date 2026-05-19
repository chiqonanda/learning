@extends('layouts.app')

@section('content')

{{-- Hero About --}}
<div style="background: #0d3d2e; padding: 3.5rem 0 2rem; position:relative; overflow:hidden;">
    <div style="position:absolute; top:-100px; right:-100px; width:400px; height:400px; border-radius:50%; background:rgba(110,210,130,0.06);"></div>
    <div class="container mx-auto px-6 relative">
        <p style="color:#6ed282; font-size:12px; font-weight:500; letter-spacing:2px; text-transform:uppercase; margin-bottom:8px;">Kisah Kami</p>
        <h1 class="font-display text-white font-bold" style="font-size:2.2rem; max-width:500px; line-height:1.25;">Tentang FermentaCo</h1>
    </div>
</div>
<div style="background:#0d3d2e; height:40px; position:relative;">
    <svg viewBox="0 0 1440 40" preserveAspectRatio="none" style="position:absolute; bottom:0; width:100%; height:40px;" fill="#f7f5f0">
        <path d="M0,20 C360,45 1080,0 1440,20 L1440,40 L0,40 Z"/>
    </svg>
</div>

{{-- Konten --}}
<section style="background:#f7f5f0; padding:4rem 0 5rem;">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">

            {{-- Teks --}}
            <div>
                <h2 class="font-display font-bold text-stone-800" style="font-size:1.75rem; margin-bottom:16px; line-height:1.3;">
                    Dari Alam, Untuk<br>
                    <em style="color:#1a7a4a;">Kesehatan Anda</em>
                </h2>
                <p style="color:#4b5563; font-size:15px; line-height:1.8; margin-bottom:14px;">
                    FermentaCo lahir dari kecintaan mendalam terhadap fermentasi tradisional. Kami percaya bahwa minuman terbaik berasal dari bahan-bahan alami yang diproses dengan sabar dan ilmu.
                </p>
                <p style="color:#4b5563; font-size:15px; line-height:1.8; margin-bottom:24px;">
                    Setiap botol yang kami hadirkan — dari Kombucha Nanas yang menyegarkan hingga Probiotik Strawberry yang kaya — adalah hasil dari dedikasi kami terhadap kualitas dan kesehatan.
                </p>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    @foreach(['Kombucha', 'Probiotik', 'Kefir', 'Fermentasi Buah'] as $tag)
                    <span style="background:#e8f5ee; color:#0d5c2f; font-size:12px; font-weight:500; padding:5px 14px; border-radius:999px; border:1px solid #c8e8d4;">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Visual card --}}
            <div style="background:#fff; border-radius:20px; padding:28px; border:1px solid #e8e2d8;">
                <div style="font-size:3rem; margin-bottom:16px; text-align:center;">🍵</div>
                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        ['50+', 'Varian Produk'],
                        ['2K+', 'Pelanggan Puas'],
                        ['100%', 'Bahan Alami'],
                        ['5⭐', 'Rating Rata-rata'],
                    ] as [$num, $label])
                    <div style="background:#f7f5f0; border-radius:12px; padding:16px; text-align:center;">
                        <p class="font-display font-bold" style="font-size:1.6rem; color:#0d3d2e; margin-bottom:4px;">{{ $num }}</p>
                        <p style="font-size:12px; color:#6b7280; margin:0;">{{ $label }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Produk unggulan kami --}}
        <div>
            <h2 class="font-display font-bold text-stone-800 text-center" style="font-size:1.5rem; margin-bottom:32px;">Produk Terfavorit Kami</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([
                    ['🍍', 'Kombucha Nanas', 'Segar & Ringan'],
                    ['🥭', 'Kombucha Mangga', 'Manis Alami'],
                    ['🍓', 'Probiotik Strawberry', 'Kaya Antioksidan'],
                    ['🌿', 'Fermentasi Buah Alami', 'Klasik & Sehat'],
                ] as [$icon, $name, $desc])
                <div style="background:#fff; border-radius:14px; padding:20px 16px; text-align:center; border:1px solid #e8e2d8;">
                    <div style="font-size:2.5rem; margin-bottom:10px;">{{ $icon }}</div>
                    <p style="font-weight:600; font-size:13px; color:#1a1a1a; margin-bottom:4px;">{{ $name }}</p>
                    <p style="font-size:12px; color:#9ca3af;">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

@endsection