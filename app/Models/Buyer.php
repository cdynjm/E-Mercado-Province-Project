<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use SoftDeletes;

    protected $table = "buyers";

    public $timestamps = true;

    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'contact_number',
        'birth_date',
        'gender',
        'province',
        'municipality',
        'barangay',
        'street',
        'zipcode',
        'profile_picture'
    ];

    public function Province() {
        return $this->hasOne(Province::class, 'provCode', 'province');
    }

    public function Municipality() {
        return $this->hasOne(Municipality::class, 'citymunCode', 'municipality');
    }

    public function Barangay() {
        return $this->hasOne(Barangay::class, 'brgyCode', 'barangay');
    }

}
