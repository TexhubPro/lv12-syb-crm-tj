<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public const CATEGORY_OPTIONS = [
        'шторы' => 'Шторы',
        'жалюзи' => 'Жалюзи',
        'плиссе' => 'Плиссе',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }
}
