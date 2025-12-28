<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'order_type_id',
        'comment',
        'motor',
        'order_total',
        'order_total_discounted',
        'advance_amount',
        'balance_amount',
        'rework_amount',
        'grand_total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class);
    }

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }
}
