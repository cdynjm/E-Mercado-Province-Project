<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancel extends Model
{
   
    protected $table = "cancelledorder";
    protected $fillable = [
        'PostID',
        'BuyerID',
        'SellerID',
        'qty',
        'Amount',
        'notes',
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
    

}
