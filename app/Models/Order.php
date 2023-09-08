<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    protected $table = "confirmedorder";
    protected $fillable = [
        'PostID',
        'BuyerID',
        'SellerID',
        'qty',
        'Amount',
        'orderstatus',
        'confirmdate'
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
    
    public function userbuyer(){
        return $this->hasOne(UserBuyer::class, 'account_id', 'BuyerID');
    }

    public function user2(){
        return $this->hasOne(User2::class, 'account_id', 'SellerID');
    }

}
