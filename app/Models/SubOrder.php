<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_type_id',
        'profile_color_id',
        'cornice_type_id',
        'order_kind',
        'division',
        'fabric_code_id',
        'control_type_id',
        'width',
        'height',
        'quantity',
        'area',
        'price',
        'amount',
        'discount',
        'total',
        'room',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class);
    }

    public function profileColor()
    {
        return $this->belongsTo(ProfileColor::class);
    }

    public function corniceType()
    {
        return $this->belongsTo(CorniceType::class);
    }

    public function fabricCode()
    {
        return $this->belongsTo(FabricCode::class);
    }

    public function controlType()
    {
        return $this->belongsTo(ControlType::class);
    }
}
