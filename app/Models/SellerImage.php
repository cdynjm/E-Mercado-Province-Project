<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerImage extends Model
{
    protected $table = "productimages";
    protected $fillable = [
        'SellerID',
        'FileName',
        'PostID'
    ];

}
