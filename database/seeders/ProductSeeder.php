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
        Product::factory(5)->create([
            'brand' => 'A Brand'
        ]);
        Product::factory(5)->create([
            'brand' => 'B Brand'
        ]);
        Product::factory(5)->create([
            'brand' => 'C Brand'
        ]);
    }
}