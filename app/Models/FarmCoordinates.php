<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmCoordinates extends Model
{
    use HasFactory;

    protected $table = "farm_coordinates";

    public $timestamps = true;

    protected $fillable = [
        'seller_id',
        'longitude',
        'latitude',
    ];
}
