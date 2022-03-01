<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceCollection;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function getByCategory(Request $request) {
        $validator = Validator::make($request->all(), [
            "categoryId" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $services = Service::where("category_id", "=", $request->categoryId)->get();

        return response(new ServiceCollection($services), 200);
    }
}
