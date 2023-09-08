<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aid_received extends Model
{
    use HasFactory;

    protected $table = "aid_received";

    public $timestamps = true;

    protected $fillable = [
        'seller_id',
        'aid_id',
    ];

    public function Aid() {
        return $this->hasOne(Aid::class, 'id', 'aid_id');
    }
}
