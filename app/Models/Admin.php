<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    public $timestamps = true;

    protected $fillable = [
        'account_id',
        'municipal',
        'province',
        'first_name',
        'last_name',
        'profile_picture'
    ];

    public function Province() {
        return $this->hasOne(Province::class, 'provCode', 'province');
    }

    public function Municipality() {
        return $this->hasOne(Municipality::class, 'citymunCode', 'municipal');
    }
    public function User() {
        return $this->hasOne(User::class, 'account_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
