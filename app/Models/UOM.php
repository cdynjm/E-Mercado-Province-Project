<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UOM extends Model
{
    protected $table = "uom";
    protected $fillable = [
        'UnitName'
    ];

}
