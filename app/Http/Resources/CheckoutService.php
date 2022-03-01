<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutService extends JsonResource
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
            "id" => $this->id,
            "instructions" => $this->instructions,
            "timingSlot" => $this->timing_slot,
            "dateSlot" => $this->date_slot,
            "totalPrice" => $this->total_price,
            "checkoutImages" => new CheckoutImageCollections($this->checkoutImages)
        ];
    }
}
