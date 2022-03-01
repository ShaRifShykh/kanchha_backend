<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        $admin = Auth::guard("admin")->user();
        return view("admin.editprofile", compact("admin"));
    }

    public function update(Request $request) {

        $admin = Admin::find(Auth::guard("admin")->id());

        if ($request->file("profile_picture")) {
            if (File::exists("storage/app/public/".$admin->profile_picture)){
                File::delete("storage/app/public/".$admin->profile_picture);
            }
            $uploadFolder = "admins";
            $img = $request->file("profile_picture");
            $imgUploadedPath = $img->store($uploadFolder, "public");
            Storage::disk("public")->url($imgUploadedPath);
        }

        $admin->profile_picture = $imgUploadedPath ?? $admin->profile_picture;
        $admin->full_name = $request->full_name ?? $admin->full_name;
        $admin->email = $request->email ?? $admin->email;
        $admin->password = $request->password ? bcrypt($request->password) : $admin->password;
        $admin->save();

        return redirect("/admin/edit_profile");
    }
}
