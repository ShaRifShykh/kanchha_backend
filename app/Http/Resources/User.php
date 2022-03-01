<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'profilePicture' => $this->profile_picture,
            'phoneNumber' => $this->phone_number,
            'otp' => $this->otp,
            'fullName' => $this->full_name,
            'email' => $this->email,
            'createdAt' => $this->created_at->toDayDateTimeString(),
            'userAddresses' => new UserAddressCollection($this->userAddresses)
        ];
    }
}
