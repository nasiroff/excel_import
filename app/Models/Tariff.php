<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{

    use HasFactory;

    protected $fillable = ['zone_id', 'from_weight', 'to_weight', 'price'];

}
