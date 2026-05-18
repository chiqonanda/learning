@extends('layouts.app')

@section('content')

<div class="bg-green-600 text-white p-10 rounded-xl shadow-lg text-center">

    <h1 class="text-4xl font-bold mb-4">
        Minuman Fermentasi Sehat
    </h1>

    <p class="text-lg">
        Fermentasi alami untuk kesehatan tubuh.
    </p>

</div>

<h2 class="text-2xl font-bold mt-10 mb-5">
    Produk Kami
</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @foreach($products as $product)

    <div class="bg-white p-5 rounded-xl shadow">

        <h3 class="text-xl font-bold mb-2">
            {{ $product->nama_produk }}
        </h3>

        <p class="text-green-700 font-semibold mb-2">
            Rp {{ number_format($product->harga) }}
        </p>

        <p class="text-gray-600">
            Kategori:
            {{ $product->category->nama_kategori ?? 'Tidak Ada' }}
        </p>

    </div>

    @endforeach

</div>

@endsection