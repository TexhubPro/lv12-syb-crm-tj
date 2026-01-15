<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTypeField extends Model
{
    use HasFactory;

    public const DEFAULT_FIELDS = [
        ['key' => 'cornice_type', 'name' => 'Тип карниза'],
        ['key' => 'fabric_code', 'name' => 'Код ткани'],
        ['key' => 'profile_color', 'name' => 'Цвет профиля'],
        ['key' => 'control_type', 'name' => 'Тип управления'],
        ['key' => 'room', 'name' => 'Комната'],
        ['key' => 'width', 'name' => 'Ширина'],
        ['key' => 'height', 'name' => 'Высота'],
        ['key' => 'quantity', 'name' => 'Кол-во'],
        ['key' => 'area', 'name' => 'Площадь'],
        ['key' => 'price', 'name' => 'Цена'],
        ['key' => 'amount', 'name' => 'Сумма'],
        ['key' => 'discount', 'name' => 'Скидка'],
        ['key' => 'total', 'name' => 'Итого'],
        ['key' => 'note', 'name' => 'Примечания'],
    ];

    protected $fillable = [
        'name',
        'key',
    ];

    public function orderTypes()
    {
        return $this->belongsToMany(OrderType::class);
    }

    public static function ensureDefaults(): void
    {
        self::upsert(self::DEFAULT_FIELDS, ['key'], ['name']);
    }
}
