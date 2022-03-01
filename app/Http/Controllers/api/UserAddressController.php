<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserAddress as UserAddressResource;
use App\Http\Resources\UserAddressCollection;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAddressController extends Controller
{
    public function index() {
        return response(new UserAddressCollection(UserAddress::all()), 200);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "houseAndFloorNo" => "required|string",
            "buildingAndBlockNo" => "required|string",
            "tag" => "required|string",
            "userId" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $userAddress = UserAddress::create([
            "house_and_floor_no" => $request->houseAndFloorNo,
            "building_and_block_no" => $request->buildingAndBlockNo,
            "tag" => $request->tag,
            "user_id" => $request->userId
        ]);

        return response(new UserAddressResource($userAddress), 200);
    }

    public function show(UserAddress $userAddress)
    {
        return response(new UserAddressResource($userAddress), 200);
    }

    public function update(Request $request, UserAddress $userAddress)
    {
        $validator = Validator::make($request->all(), [
            "houseAndFloorNo" => "required|string",
            "buildingAndBlockNo" => "required|string",
            "tag" => "required|string",
            "userId" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $userAddress->update([
            "house_and_floor_no" => $request->houseAndFloorNo ?? $userAddress->house_and_floor_no,
            "building_and_block_no" => $request->buildingAndBlockNo ?? $userAddress->building_and_block_no,
            "tag" => $request->tag ?? $userAddress->tag,
            "user_id" => $request->userId ?? $userAddress->user_id,
        ]);

        return response(new UserAddressResource($userAddress), 200);
    }

    public function destroy(UserAddress $userAddress)
    {
        $userAddress->delete();
        return "User Address is successfully delete";
    }
}
