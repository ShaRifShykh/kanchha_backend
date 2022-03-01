<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function index() {
        $extra = Extra::find(1);
        return view("admin.extra", compact("extra"));
    }

    public function extra(Request $request) {
        $extra = Extra::find(1);
        $extra->phone_no = $request->phone_no ?? $extra->phone_no;
        $extra->email = $request->email ?? $extra->email;
        $extra->save();

        return redirect("/admin/add_extras");
    }

    public function aboutUs(Request $request) {
        $extra = Extra::find(1);
        $extra->about_us = $request->about_us ?? $extra->about_us;
        $extra->save();

        return redirect("/admin/add_extras");
    }

    public function privacyPolicy(Request $request) {
        $extra = Extra::find(1);
        $extra->privacy_policy = $request->privacy_policy ?? $extra->privacy_policy;
        $extra->save();

        return redirect("/admin/add_extras");
    }

    public function termsAndConditions(Request $request) {
        $extra = Extra::find(1);
        $extra->terms_and_conditions = $request->terms_and_conditions ?? $extra->terms_and_conditions;
        $extra->save();

        return redirect("/admin/add_extras");
    }
}
