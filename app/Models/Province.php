<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use SoftDeletes;

    protected $table = "refprovince";
    protected $fillable = [
        'provDesc',
        'provCode',
    ];

    protected $hidden = [
        'password',
    ];

}
