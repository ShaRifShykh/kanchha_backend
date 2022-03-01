<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        "house_and_floor_no", "building_and_block_no", "tag", "user_id"
    ];
}
