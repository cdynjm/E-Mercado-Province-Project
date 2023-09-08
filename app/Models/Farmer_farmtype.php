<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer_farmtype extends Model
{
    use HasFactory;

    protected $table = "farmer_farmtype";

    public $timestamps = true;

    protected $fillable = [
        'seller_id',
        'farmid',
        'farmsubid',
        'grossyield',
        'netyield'
    ];

    public function FarmType() {
        return $this->hasOne(FarmType::class, 'id', 'farmid');
    }

    public function FarmTypeSub() {
        return $this->hasOne(FarmTypeSub::class, 'id', 'farmsubid');
    }
}
