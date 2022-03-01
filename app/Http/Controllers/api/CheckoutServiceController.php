<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckoutService as CheckoutServiceResource;
use App\Models\CheckoutImage;
use App\Models\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutServiceController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "instructions" => "required|string",
            "timingSlot" => "required",
            "dateSlot" => "required",
            "totalPrice" => "required",
            "userId" => "required",
            "serviceId" => "required",
            "images" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $checkoutService = CheckoutService::create([
            "instructions" => $request->instructions,
            "timing_slot" => $request->timingSlot,
            "date_slot" => $request->dateSlot,
            "total_price" => $request->totalPrice,
            "user_id" => $request->userId,
            "service_id" => $request->serviceId
        ]);

        foreach ($request->images as $image) {
            CheckoutImage::create([
                "image" => $image,
                "checkout_service_id" => $checkoutService->id
            ]);
        }

        return response(new CheckoutServiceResource($checkoutService), 200);
    }

    public function show(CheckoutService $checkoutService)
    {
        return response(new CheckoutServiceResource($checkoutService), 200);
    }
}
