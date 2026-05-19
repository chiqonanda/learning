<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * GET /api/products
     * Query params: search, category, per_page, page
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filter pencarian nama
        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('nama_kategori', 'like', '%' . $request->category . '%');
            });
        }

        // Filter ketersediaan
        if ($request->has('tersedia')) {
            $query->where('tersedia', (bool) $request->tersedia);
        }

        // Pagination (default 12 per halaman)
        $perPage  = min((int) $request->get('per_page', 12), 50);
        $products = $query->latest()->paginate($perPage);

        return response()->json([
            'status'  => 'success',
            'message' => 'Data produk berhasil diambil',
            'meta'    => [
                'total'        => $products->total(),
                'per_page'     => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page'    => $products->lastPage(),
            ],
            'data' => $products->getCollection()->map(fn ($p) => $this->formatProduct($p)),
            'links' => [
                'next' => $products->nextPageUrl(),
                'prev' => $products->previousPageUrl(),
            ],
        ]);
    }

    /**
     * GET /api/products/{id}
     */
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (! $product) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Produk dengan ID ' . $id . ' tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $this->formatProduct($product),
        ]);
    }

    /**
     * Format data produk untuk response JSON
     */
    private function formatProduct($product): array
    {
        return [
            'id'           => $product->id,
            'nama_produk'  => $product->nama_produk,
            'harga'        => $product->harga,
            'harga_format' => 'Rp ' . number_format($product->harga, 0, ',', '.'),
            'deskripsi'    => $product->deskripsi,
            'gambar_url'   => $product->gambar
                                ? asset('storage/' . $product->gambar)
                                : null,
            'stok'         => $product->stok ?? null,
            'tersedia'     => $product->tersedia ?? true,
            'kategori'     => $product->category
                                ? ['id' => $product->category->id, 'nama' => $product->category->nama_kategori]
                                : null,
            'dibuat_pada'  => $product->created_at?->format('d M Y'),
        ];
    }
}