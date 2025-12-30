<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderTypeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'шторы' => 'Шторы',
            'жалюзи' => 'Жалюзи',
            'плиссе' => 'Плиссе',
        ];

        foreach ($categories as $category => $label) {
            for ($i = 1; $i <= 100; $i++) {
                $price = random_int(1, 1000) + random_int(0, 99) / 100;

                OrderType::create([
                    'name' => $label . ' ' . $i,
                    'category' => $category,
                    'price' => $price,
                ]);
            }
        }
    }
}
