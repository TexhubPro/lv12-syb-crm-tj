<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subOrders()
    {
        return $this->hasMany(SubOrder::class);
    }
}
