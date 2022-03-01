<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginView() {
        return view("admin.login");
    }

    public function login(Request $request) {
        $this->validate($request, [
            "email" => "required|string",
            "password" => "required|string|min:8",
        ]);

        $credentials = $request->only("email", "password");

        if (Auth::guard("admin")->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/admin/dashboard");
        }

        return back()->withErrors([
            "credentials" => "The credentials doesn't exist!"
        ]);
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::guard("admin")->logout();
        return redirect("/admin/login");
    }
}
