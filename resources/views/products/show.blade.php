@extends('layouts.app')
@section('title', $product->nama_produk)

@section('content')

<div style="background:#0d3d2e;padding:2.5rem 0 1.5rem;">
    <div class="container mx-auto px-5">
        <a href="/products" style="display:inline-flex;align-items:center;gap:5px;color:#6a9e7f;font-size:12px;font-weight:500;text-decoration:none;margin-bottom:14px;transition:color 0.2s;" onmouseover="this.style.color='#6ed282'" onmouseout="this.style.color='#6a9e7f'">
            ← Kembali ke Produk
        </a>
        <nav style="font-size:12px;color:#6a9e7f;display:flex;align-items:center;gap:6px;">
            <a href="/" style="color:#6a9e7f;text-decoration:none;">Beranda</a>
            <span>/</span>
            <a href="/products" style="color:#6a9e7f;text-decoration:none;">Produk</a>
            <span>/</span>
            <span style="color:#b0d8c0;">{{ $product->nama_produk }}</span>
        </nav>
    </div>
</div>
<div style="background:#0d3d2e;height:44px;position:relative;">
    <svg viewBox="0 0 1440 44" preserveAspectRatio="none" style="position:absolute;bottom:0;width:100%;height:44px;" fill="#f7f5f0">
        <path d="M0,22 C480,50 960,0 1440,22 L1440,44 L0,44Z"/>
    </svg>
</div>

<section style="background:#f7f5f0;padding:2.5rem 0 4rem;">
    <div class="container mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

            {{-- Gambar / Visual --}}
            <div>
                @if($product->gambar)
                    <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}"
                         style="width:100%;border-radius:20px;object-fit:cover;aspect-ratio:1/1;">
                @else
                @php
                    $icons = ['🍍','🥭','🍓','🫐','🍋','🍇'];
                    $bgs   = ['#e8f5ee','#fff3e0','#fce4ec','#e8eaf6','#fef3c7','#ede9fe'];
                    $idx   = $product->id % 6;
                @endphp
                    <div style="width:100%;aspect-ratio:1/1;background:{{ $bgs[$idx] }};border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:7rem;border:1px solid #e8e2d8;">
                        {{ $icons[$idx] }}
                    </div>
                @endif

                {{-- Badge stok --}}
                <div style="margin-top:14px;display:flex;gap:8px;flex-wrap:wrap;">
                    @if($product->tersedia ?? true)
                    <span style="background:#e8f5ee;color:#14532d;font-size:12px;font-weight:600;padding:5px 14px;border-radius:999px;border:1px solid #bbf7d0;">
                        ✓ Tersedia
                    </span>
                    @else
                    <span style="background:#fee2e2;color:#991b1b;font-size:12px;font-weight:600;padding:5px 14px;border-radius:999px;">
                        Habis
                    </span>
                    @endif
                    @if(isset($product->stok))
                    <span style="background:#f7f5f0;color:#6b7280;font-size:12px;font-weight:500;padding:5px 14px;border-radius:999px;border:1px solid #e8e2d8;">
                        Stok: {{ $product->stok }} unit
                    </span>
                    @endif
                </div>
            </div>

            {{-- Info Produk --}}
            <div>
                <span style="display:inline-block;background:#e8f5ee;color:#0d5c2f;font-size:11px;font-weight:600;padding:4px 12px;border-radius:999px;margin-bottom:14px;letter-spacing:0.5px;">
                    {{ $product->category->nama_kategori ?? 'Fermentasi' }}
                </span>

                <h1 class="font-display" style="font-size:clamp(1.6rem,4vw,2.2rem);font-weight:900;color:#1a1a1a;line-height:1.2;margin:0 0 12px;">
                    {{ $product->nama_produk }}
                </h1>

                <div style="display:flex;align-items:baseline;gap:6px;margin-bottom:22px;">
                    <span class="font-display" style="font-size:2rem;font-weight:900;color:#0d3d2e;">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </span>
                    <span style="font-size:13px;color:#9ca3af;">/ botol 350ml</span>
                </div>

                {{-- Deskripsi --}}
                @if($product->deskripsi)
                <div style="background:#fff;border-radius:14px;padding:18px 20px;border:1px solid #e8e2d8;margin-bottom:22px;">
                    <h3 style="font-size:12px;font-weight:600;color:#6b7280;letter-spacing:1px;text-transform:uppercase;margin:0 0 10px;">Deskripsi Produk</h3>
                    <p style="color:#374151;font-size:14px;line-height:1.8;margin:0;">{{ $product->deskripsi }}</p>
                </div>
                @endif

                {{-- Manfaat --}}
                <div style="background:#fff;border-radius:14px;padding:18px 20px;border:1px solid #e8e2d8;margin-bottom:22px;">
                    <h3 style="font-size:12px;font-weight:600;color:#6b7280;letter-spacing:1px;text-transform:uppercase;margin:0 0 12px;">Manfaat Utama</h3>
                    <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:8px;">
                        @foreach(['Mendukung kesehatan pencernaan','Kaya probiotik dan enzim aktif','Meningkatkan sistem imun tubuh','Bebas bahan pengawet buatan'] as $manfaat)
                        <li style="display:flex;align-items:center;gap:10px;font-size:13px;color:#374151;">
                            <span style="width:20px;height:20px;border-radius:50%;background:#e8f5ee;display:flex;align-items:center;justify-content:center;color:#1a7a4a;font-size:11px;flex-shrink:0;font-weight:700;">✓</span>
                            {{ $manfaat }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- CTA --}}
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <a href="/products" style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;background:#0d3d2e;color:#fff;font-weight:500;font-size:14px;padding:13px 20px;border-radius:11px;text-decoration:none;transition:background 0.2s;text-align:center;" onmouseover="this.style.background='#1a7a4a'" onmouseout="this.style.background='#0d3d2e'">
                        ← Produk Lain
                    </a>
                    <a href="/api/products/{{ $product->id }}" target="_blank" style="display:flex;align-items:center;justify-content:center;gap:6px;background:#f7f5f0;color:#374151;font-weight:500;font-size:13px;padding:13px 18px;border-radius:11px;text-decoration:none;border:1px solid #e8e2d8;transition:all 0.2s;" onmouseover="this.style.background='#ede8df'" onmouseout="this.style.background='#f7f5f0'">
                        <span style="font-family:monospace;font-size:11px;color:#6b7280;">JSON</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Produk Lainnya --}}
        @if(isset($related) && $related->count() > 0)
        <div style="margin-top:4rem;">
            <h2 class="font-display" style="font-size:1.5rem;font-weight:900;color:#1a1a1a;margin:0 0 1.5rem;">Produk Lainnya</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($related as $r)
                <a href="/products/{{ $r->id }}" style="text-decoration:none;">
                    <div class="product-card" style="background:#fff;border-radius:14px;overflow:hidden;border:1px solid #e8e2d8;">
                        <div style="height:100px;background:#e8f5ee;display:flex;align-items:center;justify-content:center;font-size:2.5rem;">🍵</div>
                        <div style="padding:12px;">
                            <p style="font-weight:600;font-size:13px;color:#1a1a1a;margin:0 0 4px;line-height:1.3;">{{ $r->nama_produk }}</p>
                            <p class="font-display" style="font-size:14px;font-weight:900;color:#0d3d2e;margin:0;">Rp {{ number_format($r->harga,0,',','.') }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

@endsection