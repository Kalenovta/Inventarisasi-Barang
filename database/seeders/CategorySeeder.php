<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Elektronik',
            'description' => 'Barang-barang elektronik seperti HP, laptop, dan perangkat listrik.'
        ]);

        Category::create([
            'name' => 'Makanan & Minuman',
            'description' => 'Produk makanan kemasan, minuman, dan bahan konsumsi lainnya.'
        ]);

        Category::create([
            'name' => 'Pakaian',
            'description' => 'Berbagai jenis pakaian seperti kaos, celana, dan jaket.'
        ]);
    }
}
