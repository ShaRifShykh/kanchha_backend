<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy("id", "DESC")->get();
        return view("admin.category.categories", compact("categories"));
    }

    public function add() {
        return view("admin.category.addcategory");
    }

    public function insert(Request $request) {
        $this->validate($request, [
            "background_image" => "required|max:4096|mimes:jpg,jpeg,gif,png",
            "name" => "required|string",
            "short_description" => "required",
        ]);

        $uploadFolder = "categories";
        $img = $request->file("background_image");
        $imgUploadedPath = $img->store($uploadFolder, "public");
        Storage::disk("public")->url($imgUploadedPath);

        Category::create([
            "background_image" => $imgUploadedPath,
            "name" => $request->name,
            "short_description" => $request->short_description
        ]);

        return redirect("/admin/categories");
    }

    public function edit($id) {
        $category = Category::find($id);
        return view("admin.category.editcategory", compact("category"));
    }

    public function update(Request $request) {
        $this->validate($request, [
            "id" => "required|numeric"
        ]);

        $category = Category::find($request->id);

        if ($request->file("background_image")) {
            $this->validate($request, [
                "background_image" => "required|max:4096|mimes:jpg,jpeg,gif,png"
            ]);
            if (File::exists("storage/app/public/".$category->background_image)){
                File::delete("storage/app/public/".$category->background_image);
            }
            $uploadFolder = "categories";
            $img = $request->file("background_image");
            $imgUploadedPath = $img->store($uploadFolder, "public");
            Storage::disk("public")->url($imgUploadedPath);
        }

        $category->update([
            "background_image" => $request->file("background_image") ? $imgUploadedPath : $category->background_image,
            "name" => $request->name ?? $category->name,
            "short_description" => $request->short_description ?? $category->short_description
        ]);

        return redirect("/admin/categories");
    }

    public function delete($id) {
        $category = Category::find($id);
        if (File::exists("storage/app/public/".$category->background_image)){
            File::delete("storage/app/public/".$category->background_image);
        }
        $category->delete();

        return redirect("/admin/categories");
    }
}
