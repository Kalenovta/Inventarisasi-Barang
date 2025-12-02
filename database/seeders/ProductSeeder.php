<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "Lampu",
            "photo" => "products/lampu_2.jpg",
            "description" => "Deskripsi Produk",
            "sku" => "12345-ok",
            "price" => 10000,
            "stock" => 10,
            "category_id" => 1
        ]);

        Product::create([
            "name" => "Mie Sedap",
            "photo" => "products/Sedap.jpg",
            "description" => "Deskripsi Produk2",
            "sku" => "12345-baik",
            "price" => 20000,
            "stock" => 5,
            "category_id" => 2
        ]);

        Product::create([
            "name" => "Seragam",
            "photo" => "products/Seragam.jpg",
            "description" => "Deskripsi Produk3",
            "sku" => "12345-bagus",
            "price" => 30000,
            "stock" => 8,
            "category_id" => 3
        ]);

    }
}
