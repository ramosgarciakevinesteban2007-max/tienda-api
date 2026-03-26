<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop Lenovo', 'description' => 'Laptop 15 pulgadas 8GB RAM', 'price' => 1500000, 'stock' => 5],
            ['name' => 'Mouse Inalámbrico', 'description' => 'Mouse ergonómico sin cable', 'price' => 45000, 'stock' => 20],
            ['name' => 'Teclado Mecánico', 'description' => 'Teclado RGB switches azules', 'price' => 120000, 'stock' => 10],
            ['name' => 'Monitor 24"', 'description' => 'Monitor Full HD 75Hz', 'price' => 650000, 'stock' => 7],
            ['name' => 'Audífonos Bluetooth', 'description' => 'Audífonos con cancelación de ruido', 'price' => 200000, 'stock' => 15],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
