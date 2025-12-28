<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorniceType extends Model
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
