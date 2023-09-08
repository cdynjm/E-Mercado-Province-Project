<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PostProduct extends Model
{

    use SoftDeletes;
    public $timestamps = true;
    protected $table = "postproducts";
    protected $fillable = [
        'SellerID',
        'Title',
        'ProductType',
        'ProductKind',
        'Stocks',
        'UOM',
        'StockAvailable',
        'AvailableDate',
        'Description',
        'draft',
        'Remarks',
        'slug_name',
        'DatePublished'
    ];


    public function producttype() {
        return $this->hasOne(FarmType::class, 'id', 'ProductType');
    }

    public function kind() {
        return $this->hasOne(FarmTypeSub::class, 'id', 'ProductKind');
    }

    public function unit() {
        return $this->hasOne(UOM::class, 'id', 'UOM');
    }

    public function seller(){
        return $this->hasOne(Seller::class, 'id', 'SellerID');
    }

    public function images() {
        return $this->hasMany(SellerImage::class, 'PostID', 'id');
    }

    public function user2(){
        return $this->hasOne(User2::class, 'account_id', 'SellerID');
    }

    public function fav(){
        return $this->hasOne(Favorite::class, 'PostID', 'id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class, "PostID", 'id');
    }
}
