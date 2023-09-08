<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    
    protected $table = "users";
    protected $fillable = [
        'id',
        'account_id',
        'username',
        'name'
    ];
}
