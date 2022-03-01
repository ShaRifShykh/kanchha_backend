<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutImage extends Model
{
    use HasFactory;

    protected $fillable = false;
    public $timestamps = [
        "image", "checkout_service_id"
    ];
}
