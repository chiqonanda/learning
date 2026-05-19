<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Buat kategori
        $kombucha   = Category::create(['nama_kategori' => 'Kombucha']);
        $probiotik  = Category::create(['nama_kategori' => 'Probiotik']);
        $kefir      = Category::create(['nama_kategori' => 'Kefir']);
        $fermentasi = Category::create(['nama_kategori' => 'Fermentasi Buah']);

        // Daftar produk
        $products = [
            [
                'category_id'  => $kombucha->id,
                'nama_produk'  => 'Kombucha Nanas',
                'harga'        => 35000,
                'deskripsi'    => 'Kombucha segar berbahan nanas lokal pilihan. Kaya probiotik alami, enzim pencernaan, dan vitamin C. Rasa manis asam yang menyegarkan, cocok diminum dingin.',
                'stok'         => 50,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $kombucha->id,
                'nama_produk'  => 'Kombucha Mangga',
                'harga'        => 38000,
                'deskripsi'    => 'Perpaduan unik kombucha dengan mangga harum asal Kalimantan. Mengandung antioksidan tinggi dan probiotik aktif yang baik untuk sistem imun tubuh.',
                'stok'         => 40,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $kombucha->id,
                'nama_produk'  => 'Kombucha Jahe Lemon',
                'harga'        => 40000,
                'deskripsi'    => 'Perpaduan hangat jahe segar dengan kesegaran lemon dalam basis kombucha yang kaya probiotik. Sempurna untuk meningkatkan daya tahan tubuh.',
                'stok'         => 35,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $probiotik->id,
                'nama_produk'  => 'Probiotik Strawberry',
                'harga'        => 42000,
                'deskripsi'    => 'Minuman probiotik dengan ekstrak strawberry segar. Mengandung miliaran bakteri baik Lactobacillus yang mendukung kesehatan usus dan pencernaan optimal.',
                'stok'         => 30,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $probiotik->id,
                'nama_produk'  => 'Probiotik Blueberry',
                'harga'        => 45000,
                'deskripsi'    => 'Kaya anthocyanin dari blueberry pilihan yang berpadu dengan kultur probiotik aktif. Mendukung kesehatan otak, jantung, dan sistem pencernaan.',
                'stok'         => 25,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $kefir->id,
                'nama_produk'  => 'Kefir Susu Segar',
                'harga'        => 55000,
                'deskripsi'    => 'Kefir susu sapi segar yang difermentasi selama 24 jam dengan biji kefir asli. Tekstur creamy dengan rasa asam lembut, kaya kalsium dan probiotik.',
                'stok'         => 20,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $fermentasi->id,
                'nama_produk'  => 'Fermentasi Buah Alami',
                'harga'        => 32000,
                'deskripsi'    => 'Campuran buah tropis segar yang difermentasi secara alami. Mengandung enzim aktif, vitamin, dan mineral penting yang mudah diserap tubuh.',
                'stok'         => 60,
                'tersedia'     => true,
            ],
            [
                'category_id'  => $fermentasi->id,
                'nama_produk'  => 'Fermentasi Noni Morinda',
                'harga'        => 60000,
                'deskripsi'    => 'Minuman premium berbahan mengkudu (Morinda citrifolia) yang kaya scoopoletin dan xeronine. Mendukung detoksifikasi alami dan vitalitas tubuh secara menyeluruh.',
                'stok'         => 15,
                'tersedia'     => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}