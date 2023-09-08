<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use SoftDeletes;

    protected $table = "refbrgy";
    protected $fillable = [
        'brgyCode',
        'brgyDesc',
        'citymunCode',
        'provCode'
    ];

}
