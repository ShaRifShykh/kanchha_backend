<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Review as ReviewResource;
use App\Http\Resources\ReviewCollection;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function get() {
        return response(new ReviewCollection(Review::all()), 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "review" => "required|string",
            "serviceId" => "required",
            "userId" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $review = Review::create([
            "review" => $request->review,
            "service_id" => $request->serviceId,
            "user_id" => $request->userId
        ]);

        return response(new ReviewResource($review), 200);
    }

    public function show(Review $review)
    {
        return response(new ReviewResource($review), 200);
    }

    public function update(Request $request, Review $review)
    {
        $validator = Validator::make($request->all(), [
            "review" => "required|string",
            "serviceId" => "required",
            "userId" => "required"
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        $review->update([
            "review" => $request->review,
            "service_id" => $request->serviceId,
            "user_id" => $request->userId
        ]);

        return response(new ReviewResource($review), 200);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return "Review is successfully delete";
    }
}
