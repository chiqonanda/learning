<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * GET /api/products
     * Mengembalikan semua produk beserta kategorinya dalam format JSON
     */
    public function index()
    {
        $products = Product::with('category')->get();

        return response()->json([
            'status'  => 'success',
            'message' => 'Data produk berhasil diambil',
            'total'   => $products->count(),
            'data'    => $products->map(function ($product) {
                return [
                    'id'           => $product->id,
                    'nama_produk'  => $product->nama_produk,
                    'harga'        => $product->harga,
                    'harga_format' => 'Rp ' . number_format($product->harga, 0, ',', '.'),
                    'deskripsi'    => $product->deskripsi,
                    'gambar'       => $product->gambar,
                    'kategori'     => $product->category
                        ? $product->category->nama_kategori
                        : null,
                    'dibuat_pada'  => $product->created_at?->format('d M Y'),
                ];
            }),
        ]);
    }

    /**
     * GET /api/products/{id}
     * Mengembalikan satu produk berdasarkan ID
     */
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (! $product) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => [
                'id'           => $product->id,
                'nama_produk'  => $product->nama_produk,
                'harga'        => $product->harga,
                'harga_format' => 'Rp ' . number_format($product->harga, 0, ',', '.'),
                'deskripsi'    => $product->deskripsi,
                'gambar'       => $product->gambar,
                'kategori'     => $product->category
                    ? $product->category->nama_kategori
                    : null,
            ],
        ]);
    }
}