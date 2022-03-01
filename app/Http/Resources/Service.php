<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Service extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "thumbnail" => $this->thumbnail,
            "title" => $this->title,
            "charges" => $this->charges,
            "duration" => $this->duration,
            "shortDescription" => $this->short_description,
            "category" => new Category($this->category),
            "serviceIncludes" => new ServiceIncludeCollection($this->serviceIncludes),
            "serviceExcludes" => new ServiceExcludeCollection($this->serviceExcludes),
            "reviews" => new ReviewCollection($this->reviews)
        ];
    }
}
