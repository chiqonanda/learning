<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FermentaCo') — Minuman Fermentasi Sehat</title>
    <meta name="description" content="FermentaCo — Minuman fermentasi alami berbahan lokal terbaik.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;1,9..40,400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; }
        .font-display { font-family: 'Playfair Display', Georgia, serif; }

        /* Navbar */
        #navbar {
            position: sticky; top: 0; z-index: 50;
            background: #0d3d2e;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            transition: box-shadow 0.3s;
        }
        #navbar.scrolled { box-shadow: 0 4px 24px rgba(0,0,0,0.25); }

        .nav-link {
            position: relative; color: #b0d8c0;
            font-size: 14px; font-weight: 500;
            padding: 6px 2px; text-decoration: none;
            transition: color 0.2s;
        }
        .nav-link::after {
            content: ''; position: absolute;
            bottom: 0; left: 0; width: 0; height: 2px;
            background: #6ed282; border-radius: 1px;
            transition: width 0.25s ease;
        }
        .nav-link:hover, .nav-link.active { color: #fff; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        .api-pill {
            background: rgba(110,210,130,0.15);
            border: 1px solid rgba(110,210,130,0.3);
            color: #6ed282; font-size: 11px; font-weight: 500;
            padding: 4px 12px; border-radius: 999px;
            text-decoration: none; letter-spacing: 0.5px;
            transition: all 0.2s; display: inline-flex; align-items: center; gap: 5px;
        }
        .api-pill:hover { background: rgba(110,210,130,0.28); color: #fff; }

        /* Mobile menu */
        #mobile-menu {
            display: none; background: #0a2e20;
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 12px 0;
        }
        #mobile-menu.open { display: block; }
        .mobile-link {
            display: block; padding: 10px 24px;
            color: #b0d8c0; font-size: 15px; font-weight: 500;
            text-decoration: none; transition: color 0.2s, background 0.2s;
        }
        .mobile-link:hover, .mobile-link.active {
            color: #fff; background: rgba(110,210,130,0.1);
        }

        /* Animations */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeUp 0.55s ease both; }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }

        /* Pulse dot */
        @keyframes pulse-dot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(0.8)} }
        .pulse-dot { animation: pulse-dot 2s infinite; }

        /* Card hover */
        .product-card {
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 48px rgba(13,61,46,0.13);
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f0eb; }
        ::-webkit-scrollbar-thumb { background: #a8c8b4; border-radius: 3px; }

        footer a { color: #9ebfaf; transition: color 0.2s; text-decoration: none; }
        footer a:hover { color: #fff; }
    </style>
    @stack('head')
</head>
<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">

{{-- ===== NAVBAR ===== --}}
<header id="navbar">
    <div class="container mx-auto px-5 py-3 flex items-center justify-between gap-6">

        {{-- Logo --}}
        <a href="/" style="display:flex; align-items:center; gap:10px; text-decoration:none; flex-shrink:0;">
            <div style="width:36px; height:36px; border-radius:10px; background:rgba(110,210,130,0.18); display:flex; align-items:center; justify-content:center; font-size:18px;">🍵</div>
            <div>
                <div class="font-display" style="color:#fff; font-size:17px; font-weight:700; line-height:1.1;">FermentaCo</div>
                <div style="color:#6ed282; font-size:9px; letter-spacing:2px; text-transform:uppercase; font-weight:500;">Est. 2024</div>
            </div>
        </a>

        {{-- Desktop Nav --}}
        <nav style="display:flex; align-items:center; gap:28px;" class="hidden md:flex">
            <a href="/"        class="nav-link {{ request()->is('/')        ? 'active' : '' }}">Beranda</a>
            <a href="/products" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">Produk</a>
            <a href="/about"   class="nav-link {{ request()->is('about')    ? 'active' : '' }}">Tentang</a>
        </nav>

        <div style="display:flex; align-items:center; gap:12px;" class="hidden md:flex">
            <a href="/api/products" target="_blank" class="api-pill">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" style="opacity:.8"><circle cx="5" cy="5" r="4" stroke="currentColor" stroke-width="1.5"/><path d="M5 3v2.5L6.5 7" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
                API JSON
            </a>
        </div>

        {{-- Mobile burger --}}
        <button id="burger-btn" class="md:hidden" style="background:none; border:none; cursor:pointer; padding:4px;" aria-label="Menu">
            <svg id="burger-icon" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M3 5h16M3 11h16M3 17h16" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu">
        <a href="/"         class="mobile-link {{ request()->is('/')         ? 'active' : '' }}">🏠 Beranda</a>
        <a href="/products"  class="mobile-link {{ request()->is('products*')  ? 'active' : '' }}">🛒 Produk</a>
        <a href="/about"    class="mobile-link {{ request()->is('about')     ? 'active' : '' }}">📖 Tentang</a>
        <a href="/api/products" target="_blank" class="mobile-link" style="color:#6ed282;">⚡ API JSON</a>
    </div>
</header>

{{-- ===== CONTENT ===== --}}
<main class="flex-1">
    @yield('content')
</main>

{{-- ===== FOOTER ===== --}}
<footer style="background:#0d1f17; border-top:1px solid rgba(255,255,255,0.06); margin-top:auto;">
    <div class="container mx-auto px-5 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            <div class="md:col-span-2">
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:12px;">
                    <span style="font-size:22px;">🍵</span>
                    <span class="font-display" style="color:#fff; font-size:18px; font-weight:700;">FermentaCo</span>
                </div>
                <p style="color:#9ebfaf; font-size:13px; line-height:1.8; max-width:300px;">
                    Kami menghadirkan minuman fermentasi alami berbahan lokal terbaik dari seluruh Nusantara. Sehat, lezat, dan dibuat dengan penuh cinta.
                </p>
                <div style="display:flex; gap:8px; margin-top:14px; flex-wrap:wrap;">
                    @foreach(['Kombucha','Probiotik','Kefir','Fermentasi Buah'] as $tag)
                    <span style="background:rgba(110,210,130,0.12); color:#6ed282; font-size:11px; font-weight:500; padding:3px 10px; border-radius:999px; border:1px solid rgba(110,210,130,0.2);">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 style="color:#6ed282; font-size:10px; font-weight:500; letter-spacing:2px; text-transform:uppercase; margin-bottom:14px;">Navigasi</h4>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:9px;">
                    @foreach(['/' => 'Beranda', '/products' => 'Semua Produk', '/about' => 'Tentang Kami'] as $url => $label)
                    <li><a href="{{ $url }}" style="font-size:13px;">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 style="color:#6ed282; font-size:10px; font-weight:500; letter-spacing:2px; text-transform:uppercase; margin-bottom:14px;">Developer API</h4>
                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:9px;">
                    <li><a href="/api/products" target="_blank" style="font-size:13px; font-family:monospace;">GET /api/products</a></li>
                    <li><a href="/api/products/1" target="_blank" style="font-size:13px; font-family:monospace;">GET /api/products/{id}</a></li>
                </ul>
                <p style="color:#556d5f; font-size:11px; margin-top:10px;">REST API terbuka untuk developer</p>
            </div>
        </div>

        <div style="border-top:1px solid rgba(255,255,255,0.06); padding-top:18px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:8px;">
            <p style="color:#3d5c4a; font-size:12px; margin:0;">© {{ date('Y') }} FermentaCo. Semua hak dilindungi.</p>
            <p style="color:#3d5c4a; font-size:12px; margin:0;">Dibangun dengan Laravel 🛠 & ❤️</p>
        </div>
    </div>
</footer>

<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 10);
    });
    document.getElementById('burger-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('open');
    });
</script>

@stack('scripts')
</body>
</html>