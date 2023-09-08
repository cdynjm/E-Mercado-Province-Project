<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use SoftDeletes;

    protected $table = "refcitymun";
    protected $fillable = [
        'citymunDesc',
        'provCode',
        'citymunCode',
        'ZipCode'
    ];

}
