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
        'parent_id',
        'unit',
        'min_qty',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'min_qty' => 'decimal:2',
    ];

    public const CATEGORY_OPTIONS = [
        'шторы' => 'Шторы',
        'жалюзи' => 'Жалюзи',
        'плиссе' => 'Плиссе',
    ];

    public const UNIT_OPTIONS = [
        'piece' => 'Штук',
        'meter' => 'Метр',
        'square_meter' => 'Квадратный метр',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function fields()
    {
        return $this->belongsToMany(OrderTypeField::class)
            ->withPivot('sort')
            ->orderBy('order_type_order_type_field.sort');
    }
}
