<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use SoftDeletes;

    protected $table = "beneficiaries";

    public $timestamps = true;

    protected $fillable = [
        'id',
        'Description',
        'AddedBy'
    ];

}
