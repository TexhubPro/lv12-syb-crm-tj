<?php

namespace Database\Seeders;

use App\Models\OrderTypeField;
use Illuminate\Database\Seeder;

class OrderTypeFieldSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            ['key' => 'cornice_type', 'name' => 'Тип карниза'],
            ['key' => 'fabric_code', 'name' => 'Код ткани'],
            ['key' => 'profile_color', 'name' => 'Цвет профиля'],
            ['key' => 'control_type', 'name' => 'Тип управления'],
            ['key' => 'room', 'name' => 'Комната'],
            ['key' => 'division', 'name' => 'Разделения'],
            ['key' => 'width', 'name' => 'Ширина'],
            ['key' => 'height', 'name' => 'Высота'],
            ['key' => 'quantity', 'name' => 'Кол-во'],
            ['key' => 'area', 'name' => 'Площадь'],
            ['key' => 'price', 'name' => 'Цена'],
            ['key' => 'amount', 'name' => 'Сумма'],
            ['key' => 'discount', 'name' => 'Скидка'],
            ['key' => 'total', 'name' => 'Итого'],
            ['key' => 'note', 'name' => 'Примечания'],
            ['key' => 'corsage', 'name' => 'Карсаж'],
            ['key' => 'tape', 'name' => 'Лента'],
            ['key' => 'sewing', 'name' => 'Пошив'],
            ['key' => 'installation', 'name' => 'Монтаж'],
            ['key' => 'motor', 'name' => 'Мотор'],
            ['key' => 'tiebacks', 'name' => 'Прихваты'],
        ];

        foreach ($fields as $field) {
            OrderTypeField::updateOrCreate(
                ['key' => $field['key']],
                ['name' => $field['name']]
            );
        }
    }
}
