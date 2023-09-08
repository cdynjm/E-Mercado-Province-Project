<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    protected $table = "sellers";
    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'middle_name',
        'birthdate',
        'gender',
        'civil_status',
        'contact_number',
        'education',
        'province',
        'municipality',
        'barangay',
        'street',
        'zipcode',
        'username',
        'password',
        'idnumber',
        'idphoto',
        'profile_picture',
        'status',
        'verified_by'
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
