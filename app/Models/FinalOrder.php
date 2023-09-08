<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalOrder extends Model
{
   
    protected $table = "finishorder";
    protected $fillable = [
        'PostID',
        'BuyerID',
        'SellerID',
        'qty',
        'Amount',
        'RatingID'
    ];

    public function product(){
        return $this->hasOne(PostProduct::class, 'id', 'PostID');
    }

    public function seller(){
        return $this->hasOne(Seller::class, 'id', 'SellerID');
    }

    public function buyer(){
        return $this->hasOne(Buyer::class, 'id', 'BuyerID');
    }
    
    public function user2(){
        return $this->hasOne(User2::class, 'account_id', 'SellerID');
    }


}
