<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'profile_picture',
        'phone_number',
        'otp',
        'full_name',
        'email'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function reviews() {
        return $this->hasMany(Review::class, "user_id", "id");
    }

    public function userAddresses() {
        return $this->hasMany(UserAddress::class ,"user_id", "id");
    }
}
