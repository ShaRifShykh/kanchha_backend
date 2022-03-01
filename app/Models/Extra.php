<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "about_us", "privacy_policy", "terms_and_conditions", "phone_no", "email"
    ];
}
