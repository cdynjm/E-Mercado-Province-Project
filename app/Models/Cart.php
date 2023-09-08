<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   
    protected $table = "cart";
    protected $fillable = [
        'PostID',
        'BuyerID',
        'SellerID',
        'qty',
        'Amount'
    ];

    public function product(){
        return $this->hasOne(PostProduct::class, 'id', 'PostID');
    }

    public function seller(){
        return $this->hasOne(Seller::class, 'id', 'SellerID');
    }
    
    public function user2(){
        return $this->hasOne(User2::class, 'account_id', 'SellerID');
    }


}
