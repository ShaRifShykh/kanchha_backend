<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceExclude;
use App\Models\ServiceInclude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::with("category", "serviceIncludes", "serviceExcludes")->orderBy("id", "DESC")->get();
        return view("admin.service.services", compact("services"));
    }

    public function add() {
        $categories = Category::all();
        return view("admin.service.addservice", compact("categories"));
    }

    public function insert(Request $request) {
        $this->validate($request, [
            "thumbnail" => "required|max:4096|mimes:jpg,jpeg,gif,png",
            "title" => "required|string",
            "charges" => "required",
            "duration" => "required|string",
            "short_description" => "required",
            "category_id" => "required",
            "service_include" => "required",
            "service_exclude" => "required"
        ]);

        $uploadFolder = "services";
        $img = $request->file("thumbnail");
        $imgUploadedPath = $img->store($uploadFolder, "public");
        Storage::disk("public")->url($imgUploadedPath);

        $service = Service::create([
            "thumbnail" => $imgUploadedPath,
            "title" => $request->title,
            "charges" => $request->charges,
            "duration" => $request->duration,
            "short_description" => $request->short_description,
            "category_id" => $request->category_id,
        ]);

        $service_includes = $request->service_include;

        foreach ($service_includes as $key => $service_include) {
            ServiceInclude::create([
                "includes" => $service_include,
                "service_id" => $service->id
            ]);
        }

        $service_excludes = $request->service_exclude;

        foreach ($service_excludes as $key => $service_exclude) {
            ServiceExclude::create([
                "excludes" => $service_exclude,
                "service_id" => $service->id
            ]);
        }

        return redirect("/admin/services");
    }

    public function edit($id) {
        $categories = Category::all();
        $service = Service::with("serviceIncludes", "serviceExcludes")->find($id);
        return view("admin.service.editservice", compact("categories", "service"));
//        return $service->serviceIncludes()->count();
    }

    public function update(Request $request) {
        $this->validate($request, [
            "id" => "required",
            "thumbnail" => "max:4096|mimes:jpg,jpeg,gif,png",
            "title" => "required|string",
            "charges" => "required",
            "duration" => "required|string",
            "short_description" => "required",
            "category_id" => "required",
            "service_include" => "required",
            "service_exclude" => "required"
        ]);

        $service = Service::find($request->id);

        if ($request->file("thumbnail")) {
            if (File::exists("storage/app/public/".$service->thumbnail)){
                File::delete("storage/app/public/".$service->thumbnail);
            }
            $uploadFolder = "services";
            $img = $request->file("thumbnail");
            $imgUploadedPath = $img->store($uploadFolder, "public");
            Storage::disk("public")->url($imgUploadedPath);
        }

        $service->update([
            "thumbnail" => $imgUploadedPath ?? $service->thumbnail,
            "title" => $request->title ?? $service->title,
            "charges" => $request->charges ?? $service->charges,
            "duration" => $request->duration ?? $service->duration,
            "short_description" => $request->short_description ?? $service->short_description,
            "category_id" => $request->category_id ?? $service->category_id,
        ]);

        $service_include_ids = $request->service_include_ids;
        $service_includes = $request->service_include;

        foreach ($service_includes as $key => $service_include) {
            $serviceInclude = ServiceInclude::where("id", "=", $service_include_ids[$key] ?? 0)->first();

            if ($serviceInclude == null) {
                ServiceInclude::create([
                    "includes" => $service_include,
                    "service_id" => $service->id
                ]);
            }
            else {
                $serviceInclude->update([
                    "includes" => $service_include,
                    "service_id" => $service->id
                ]);
            }
        }

        $service_exclude_ids = $request->service_exclude_ids;
        $service_excludes = $request->service_exclude;

        foreach ($service_excludes as $key => $service_exclude) {
            $serviceExclude = ServiceExclude::where("id", "=", $service_exclude_ids[$key] ?? 0)->first();

            if ($serviceExclude == null) {
                ServiceExclude::create([
                    "excludes" => $service_include,
                    "service_id" => $service->id
                ]);
            } else {
                $serviceExclude->update([
                    "excludes" => $service_include,
                    "service_id" => $service->id
                ]);
            }
        }
        return redirect("/admin/services");
    }

    public function delete($id) {
        $services = Service::with("serviceIncludes", "serviceExcludes")->find($id);
        $services->serviceExcludes()->delete();
        $services->serviceIncludes()->delete();
        if (File::exists("storage/app/public/".$services->thumbnail)){
            File::delete("storage/app/public/".$services->thumbnail);
        }
        $services->delete();

        return redirect("/admin/services");
    }
}
