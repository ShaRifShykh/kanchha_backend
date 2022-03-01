<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EditProfileController extends Controller
{
    public function update(Request $request, User $user) {

        if ($request->file("profilePicture")) {
            $validator = Validator::make($request->all(), [
                "profilePicture" => "max:4096|mimes:jpg,jpeg,gif,png"
            ]);

            if ($validator->fails()) {
                return response(['errors' => $validator->errors()], 422);
            }

            if (File::exists("storage/app/public/".$user->profile_picture)){
                File::delete("storage/app/public/".$user->profile_picture);
            }

            $uploadFolder = "users";
            $img = $request->file("profilePicture");
            $imgUploadedPath = $img->store($uploadFolder, "public");
            Storage::disk("public")->url($imgUploadedPath);
        }

        $user->update([
            "profile_picture" => $imgUploadedPath ?? $user->profile_picture,
            "phone_number" => $request->phoneNumber ?? $user->phone_number,
            "otp" => $user->otp,
            "full_name" => $request->fullName ?? $user->full_name,
            "email" => $request->email ?? $user->email
        ]);

        return response(new UserResource($user), 200);
    }
}
