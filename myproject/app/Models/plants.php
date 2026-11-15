<?php

namespace App\Models;

use Database\Factories\PlantsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plants extends Model
{
    /** @use HasFactory<PlantsFactory> */
    use HasFactory;
}
