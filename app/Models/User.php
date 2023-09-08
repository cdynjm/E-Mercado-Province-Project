<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Balping\HashSlug\HasHashSlug;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, Notifiable, HasRoles, InteractsWithMedia;
    use HasHashSlug;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'username',
        'phone_number',
        'user_type',
        'status',
        'banned',
        'email',
        'password',
        'status',
        'secretkey',
        'name',
        'profile',
        'active_status',
        'dark_mode',
        'messenger_color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function userProfile() {
        if (strtolower(Auth::user()->user_type) == "seller")
            return $this->hasOne(Seller::class, 'id', 'account_id');
        if (strtolower(Auth::user()->user_type) == "buyer")
            return $this->hasOne(Buyer::class, 'id', 'account_id');
        if (strtolower(Auth::user()->user_type) == "provincial")
            return $this->hasOne(Admin::class, 'id', 'account_id');
        if (strtolower(Auth::user()->user_type) == "municipal")
            return $this->hasOne(Admin::class, 'id', 'account_id');
    }
}
