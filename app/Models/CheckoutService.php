<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutService extends Model
{
    use HasFactory;

    protected $fillable = [
        "instructions", "timing_slot", "date_slot", "total_price", "user_id", "service_id"
    ];

    public function checkoutImages() {
        return $this->hasMany(CheckoutImage::class, "checkout_service_id", "id");
    }
}
