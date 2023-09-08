<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmType extends Model
{
    // use softDeletes;

    protected $table = "farmtype";

    protected $fillable = [
        'description',
        'remarks'
    ];
}
