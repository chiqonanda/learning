@extends('layouts.app')
@section('title', 'Beranda')

@section('content')

{{-- ===== HERO ===== --}}
<section style="background:#0d3d2e; position:relative; overflow:hidden; padding:5rem 0 0;">
    {{-- Dekorasi lingkaran --}}
    <div style="position:absolute;top:-120px;right:-120px;width:500px;height:500px;border-radius:50%;background:rgba(110,210,130,0.06);pointer-events:none;"></div>
    <div style="position:absolute;bottom:40px;left:-80px;width:300px;height:300px;border-radius:50%;background:rgba(110,210,130,0.04);pointer-events:none;"></div>

    <div class="container mx-auto px-5 relative">
        <div style="max-width:640px;">

            <div class="animate-fade-up" style="display:inline-flex;align-items:center;gap:8px;background:rgba(110,210,130,0.14);border:1px solid rgba(110,210,130,0.28);border-radius:999px;padding:5px 14px;margin-bottom:20px;">
                <span class="pulse-dot" style="width:7px;height:7px;border-radius:50%;background:#6ed282;display:inline-block;"></span>
                <span style="color:#6ed282;font-size:11px;font-weight:500;letter-spacing:1px;text-transform:uppercase;">100% Fermentasi Alami</span>
            </div>

            <h1 class="font-display animate-fade-up delay-1" style="color:#fff;font-size:clamp(2rem,5vw,3.2rem);font-weight:900;line-height:1.18;margin-bottom:20px;">
                Minuman Fermentasi<br>
                <em style="color:#6ed282;font-style:italic;">Sehat & Menyegarkan</em>
            </h1>

            <p class="animate-fade-up delay-2" style="color:#b0d8c0;font-size:16px;line-height:1.85;margin-bottom:32px;max-width:500px;">
                Dibuat dari bahan-bahan lokal pilihan dengan proses fermentasi tradisional yang menjaga setiap nutrisi dan cita rasa terbaik untuk tubuh Anda.
            </p>

            <div class="animate-fade-up delay-3" style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:3rem;">
                <a href="/products" style="display:inline-flex;align-items:center;gap:8px;background:#6ed282;color:#0a2a1c;font-weight:500;font-size:14px;padding:13px 26px;border-radius:11px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='#88e89a'" onmouseout="this.style.background='#6ed282'">
                    Lihat Semua Produk
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7h10M7 2l5 5-5 5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <a href="/about" style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,0.08);color:#fff;font-weight:500;font-size:14px;padding:13px 26px;border-radius:11px;text-decoration:none;border:1px solid rgba(255,255,255,0.18);transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.14)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'">
                    Tentang Kami
                </a>
            </div>

            {{-- Stats bar --}}
            <div style="display:flex;gap:0;border-top:1px solid rgba(255,255,255,0.1);padding-top:24px;flex-wrap:wrap;">
                @foreach([['50+','Varian Produk'],['2.000+','Pelanggan Puas'],['100%','Bahan Alami'],['4.9★','Rating']] as [$num,$label])
                <div style="padding:0 28px 0 0;margin-bottom:12px;">
                    <div class="font-display" style="color:#fff;font-size:1.5rem;font-weight:900;line-height:1;">{{ $num }}</div>
                    <div style="color:#6a9e7f;font-size:11px;margin-top:3px;font-weight:500;">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Wave --}}
    <div style="height:56px;position:relative;overflow:hidden;margin-top:2rem;">
        <svg viewBox="0 0 1440 56" preserveAspectRatio="none" style="position:absolute;bottom:0;width:100%;height:56px;" fill="#f7f5f0">
            <path d="M0,28 C480,60 960,0 1440,28 L1440,56 L0,56Z"/>
        </svg>
    </div>
</section>

{{-- ===== PRODUK UNGGULAN ===== --}}
<section style="background:#f7f5f0;padding:4rem 0 3rem;">
    <div class="container mx-auto px-5">

        <div style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:2.5rem;">
            <div>
                <p style="color:#1a7a4a;font-size:11px;font-weight:500;letter-spacing:2px;text-transform:uppercase;margin-bottom:6px;">Pilihan Terbaik</p>
                <h2 class="font-display" style="font-size:1.9rem;font-weight:900;color:#1a1a1a;margin:0;line-height:1.2;">Produk Unggulan</h2>
            </div>
            <a href="/products" style="font-size:13px;font-weight:500;color:#1a7a4a;text-decoration:none;display:inline-flex;align-items:center;gap:5px;padding-bottom:2px;border-bottom:1.5px solid #1a7a4a;">
                Lihat semua <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>

        @php
            $palettes = [
                ['bg'=>'#e8f5ee','icon'=>'🍍','accent'=>'#1a7a4a'],
                ['bg'=>'#fff3e0','icon'=>'🥭','accent'=>'#b45309'],
                ['bg'=>'#fce4ec','icon'=>'🍓','accent'=>'#be185d'],
                ['bg'=>'#e8eaf6','icon'=>'🫐','accent'=>'#3730a3'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse($products->take(4) as $product)
            @php $p = $palettes[$loop->index % 4]; @endphp
            <div class="product-card" style="background:#fff;border-radius:18px;overflow:hidden;border:1px solid #e8e2d8;display:flex;flex-direction:column;">

                {{-- Gambar --}}
                @if($product->gambar)
                    <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}" style="width:100%;height:160px;object-fit:cover;">
                @else
                    <div style="height:160px;background:{{ $p['bg'] }};display:flex;align-items:center;justify-content:center;font-size:3.5rem;position:relative;">
                        {{ $p['icon'] }}
                        <span style="position:absolute;top:10px;left:10px;background:rgba(255,255,255,0.85);color:{{ $p['accent'] }};font-size:10px;font-weight:600;padding:2px 9px;border-radius:999px;">
                            {{ $product->category->nama_kategori ?? 'Fermentasi' }}
                        </span>
                    </div>
                @endif

                <div style="padding:16px 18px 18px;flex:1;display:flex;flex-direction:column;">
                    <h3 class="font-display" style="font-size:15px;font-weight:700;color:#1a1a1a;margin:0 0 7px;line-height:1.3;">{{ $product->nama_produk }}</h3>
                    <p style="color:#6b7280;font-size:12px;line-height:1.65;margin:0 0 auto;padding-bottom:14px;flex:1;">
                        {{ Str::limit($product->deskripsi ?? 'Minuman fermentasi alami kaya probiotik dan enzim baik untuk tubuh.', 72) }}
                    </p>
                    <div style="display:flex;align-items:center;justify-content:space-between;padding-top:12px;border-top:1px solid #f0ece5;">
                        <span class="font-display" style="font-size:16px;font-weight:900;color:#0d3d2e;">Rp&nbsp;{{ number_format($product->harga,0,',','.') }}</span>
                        <a href="/products/{{ $product->id }}" style="background:#0d3d2e;color:#fff;font-size:12px;font-weight:500;padding:7px 14px;border-radius:8px;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='#1a7a4a'" onmouseout="this.style.background='#0d3d2e'">Detail →</a>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column:1/-1;text-align:center;padding:3rem 0;color:#9ca3af;">
                <div style="font-size:3rem;margin-bottom:12px;">🍵</div>
                <p>Belum ada produk. Jalankan seeder terlebih dahulu.</p>
            </div>
            @endforelse
        </div>

        @if($products->count() > 4)
        <div style="text-align:center;margin-top:2rem;">
            <a href="/products" style="display:inline-flex;align-items:center;gap:8px;border:1.5px solid #0d3d2e;color:#0d3d2e;font-weight:500;font-size:14px;padding:11px 28px;border-radius:11px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='#0d3d2e';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#0d3d2e'">
                Lihat {{ $products->count() - 4 }} Produk Lainnya →
            </a>
        </div>
        @endif
    </div>
</section>

{{-- ===== KEUNGGULAN ===== --}}
<section style="background:#fff;padding:4rem 0;border-top:1px solid #ede8df;">
    <div class="container mx-auto px-5">
        <div style="text-align:center;margin-bottom:2.5rem;">
            <p style="color:#1a7a4a;font-size:11px;font-weight:500;letter-spacing:2px;text-transform:uppercase;margin-bottom:6px;">Kenapa Pilih Kami</p>
            <h2 class="font-display" style="font-size:1.7rem;font-weight:900;color:#1a1a1a;margin:0;">Jaminan Kualitas Kami</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach([
                ['🌿','Bahan Pilihan Lokal','Bekerja sama langsung dengan petani lokal untuk memastikan bahan baku terbaik tanpa bahan pengawet.'],
                ['🔬','Proses Terstandar','Setiap batch difermentasi sesuai standar kualitas dengan kultur bakteri baik yang tersertifikasi.'],
                ['📦','Pengiriman Terjaga','Dikemas dengan insulasi khusus menjaga kesegaran produk sejak gudang hingga tangan Anda.'],
            ] as [$icon,$judul,$desc])
            <div style="display:flex;gap:16px;align-items:flex-start;padding:22px;border-radius:14px;background:#f7f5f0;border:1px solid #ede8df;">
                <div style="width:46px;height:46px;border-radius:12px;background:#0d3d2e;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">{{ $icon }}</div>
                <div>
                    <h3 style="font-weight:600;font-size:15px;color:#1a1a1a;margin:0 0 7px;">{{ $judul }}</h3>
                    <p style="color:#6b7280;font-size:13px;line-height:1.7;margin:0;">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== TESTIMONIAL ===== --}}
<section style="background:#f7f5f0;padding:4rem 0;border-top:1px solid #ede8df;">
    <div class="container mx-auto px-5">
        <div style="text-align:center;margin-bottom:2.5rem;">
            <p style="color:#1a7a4a;font-size:11px;font-weight:500;letter-spacing:2px;text-transform:uppercase;margin-bottom:6px;">Kata Mereka</p>
            <h2 class="font-display" style="font-size:1.7rem;font-weight:900;color:#1a1a1a;margin:0;">Testimoni Pelanggan</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach([
                ['Rina S.','Bandung','Kombucha Nanas-nya enak banget! Pencernaan saya jadi lebih lancar sejak rutin minum setiap pagi. Sangat direkomendasikan!','⭐⭐⭐⭐⭐','RS'],
                ['Budi P.','Jakarta','Probiotik Strawberry-nya jadi favorit keluarga. Anak-anak suka karena rasanya manis alami. Packaging-nya juga rapi dan segar sampai rumah.','⭐⭐⭐⭐⭐','BP'],
                ['Maya D.','Surabaya','Kefir Susu Segarnya luar biasa! Tekstur creamy, rasa autentik. Saya sudah berlangganan 3 bulan dan tidak mau ganti produk lain.','⭐⭐⭐⭐⭐','MD'],
            ] as [$nama,$kota,$ulasan,$bintang,$inisial])
            <div style="background:#fff;border-radius:16px;padding:22px;border:1px solid #e8e2d8;">
                <div style="color:#1a7a4a;font-size:14px;margin-bottom:12px;">{{ $bintang }}</div>
                <p style="color:#374151;font-size:13px;line-height:1.75;margin:0 0 16px;font-style:italic;">"{{ $ulasan }}"</p>
                <div style="display:flex;align-items:center;gap:10px;border-top:1px solid #f0ece5;padding-top:14px;">
                    <div style="width:36px;height:36px;border-radius:50%;background:#0d3d2e;display:flex;align-items:center;justify-content:center;color:#6ed282;font-size:12px;font-weight:600;flex-shrink:0;">{{ $inisial }}</div>
                    <div>
                        <p style="font-weight:600;font-size:13px;color:#1a1a1a;margin:0;">{{ $nama }}</p>
                        <p style="font-size:11px;color:#9ca3af;margin:0;">{{ $kota }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA BANNER ===== --}}
<section style="background:#0d3d2e;padding:3.5rem 0;">
    <div class="container mx-auto px-5" style="text-align:center;">
        <h2 class="font-display" style="color:#fff;font-size:1.8rem;font-weight:900;margin:0 0 12px;">Siap Mulai Hidup Lebih Sehat?</h2>
        <p style="color:#b0d8c0;font-size:15px;margin:0 0 28px;max-width:440px;margin-left:auto;margin-right:auto;line-height:1.7;">Temukan produk fermentasi terbaik untuk mendukung kesehatan pencernaan dan vitalitas Anda sehari-hari.</p>
        <a href="/products" style="display:inline-flex;align-items:center;gap:8px;background:#6ed282;color:#0a2a1c;font-weight:600;font-size:15px;padding:14px 32px;border-radius:12px;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='#88e89a'" onmouseout="this.style.background='#6ed282'">
            Mulai Belanja Sekarang →
        </a>
    </div>
</section>

@endsection