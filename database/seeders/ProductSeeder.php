<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Mouse Óptico',
            'description' => 'Mouse de alta precisão com 6 botões',
            'price' => 49.99,
            'stock' => 120,
        ]);

        Product::create([
            'name' => 'Teclado Mecânico',
            'description' => 'Teclado com switches mecânicos e retroiluminação RGB',
            'price' => 299.99,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Monitor 24" Full HD',
            'description' => 'Monitor LED de 24 polegadas com resolução Full HD',
            'price' => 799.99,
            'stock' => 30,
        ]);

        Product::create([
            'name' => 'Fone de Ouvido Bluetooth',
            'description' => 'Fones de ouvido sem fio com cancelamento de ruído',
            'price' => 199.99,
            'stock' => 70,
        ]);

        Product::create([
            'name' => 'Webcam 1080p',
            'description' => 'Webcam com resolução 1080p e microfone embutido',
            'price' => 159.99,
            'stock' => 90,
        ]);
    }
}
