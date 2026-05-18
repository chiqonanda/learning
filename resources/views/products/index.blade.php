@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Daftar Produk
</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @foreach($products as $product)

    <div class="bg-white p-5 rounded-xl shadow-lg">

        <h2 class="text-xl font-bold mb-3">
            {{ $product->nama_produk }}
        </h2>

        <p class="mb-2">
            Harga: Rp {{ number_format($product->harga) }}
        </p>

        <p>
            Kategori:
            {{ $product->category->nama_kategori ?? 'Tidak Ada' }}
        </p>

    </div>

    @endforeach

</div>

@endsection