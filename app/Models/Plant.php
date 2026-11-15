<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plant_name',
        'category',
        'unit_price',
        'description',
        'stock_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
