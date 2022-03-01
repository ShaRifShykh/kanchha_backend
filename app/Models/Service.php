<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "thumbnail", "title", "charges", "duration", "short_description", "category_id",
    ];

    public function category() {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function serviceIncludes() {
        return $this->hasMany(ServiceInclude::class, "service_id", "id");
    }

    public function serviceExcludes() {
        return $this->hasMany(ServiceExclude::class, "service_id", "id");
    }

    public function reviews() {
        return $this->hasMany(Review::class, "service_id", "id");
    }
}
