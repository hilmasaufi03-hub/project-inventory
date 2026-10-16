<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kategori dummy khusus sistem inventaris baru
        $kategori1 = Category::create(['name' => 'Perangkat Elektronik']);
        $kategori2 = Category::create(['name' => 'Atribut & Perlengkapan Kantor']);

        // Data barang dummy
        Product::create([
            'name'        => 'Laptop ThinkPad X1',
            'category_id' => $kategori1->id,
            'price'       => 12500000,
            'stock'       => 8,
        ]);

        Product::create([
            'name'        => 'Kertas HVS A4 80gsm',
            'category_id' => $kategori2->id,
            'price'       => 55000,
            'stock'       => 45,
        ]);
    }
}