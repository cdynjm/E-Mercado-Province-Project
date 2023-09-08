<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
   
    protected $table = "review_ratings";
    protected $fillable = [
        'PostID',
        'SellerID',
        'BuyerID',
        'comments',
        'star_rating',
    ];

    public function buyer(){
        return $this->hasOne(Buyer::class, 'id', 'BuyerID');
    }

}
