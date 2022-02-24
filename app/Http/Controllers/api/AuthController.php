<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class AuthController extends Controller
{
    // Login User with Phone Number and send otp
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            "phoneNumber" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $otp = rand(10000,99999);
        $user = User::where('phone_number','=',$request->phoneNumber)->first();

        if ($user == null) {
            return response(['errors' => "User doesn't exits!"], 422);
        }

        $user->otp = $otp;
        $user->save();

        // Sending OTP to user number
//        $basic  = new Basic("797a72af", "DytDVgkbn8Qo2Jh3");
//        $client = new Client($basic);
//        $response = $client->sms()->send(
//            new SMS($user->phone_number, "Kanchha", 'Otp code: ' . $otp)
//        );
//        $message = $response->current();
//
//        if ($message->getStatus() == 0) {
//            return response(UserResource::make($user), 200);
//        } else {
//            return response($message->getStatus(), 401);
//        }
        return response(UserResource::make($user), 200);
    }

    // Register User with Phone Number and send otp
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            "phoneNumber" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $userTest = User::where("phone_number", "=", $request->phoneNumber)->first();
        if ($userTest != null) {
            return response(['errors' => "User already exist!"], 422);
        }

        $otp = rand(10000,99999);
        $user = new User();
        $user->phone_number = $request->phoneNumber;
        $user->otp = $otp;
        $user->save();

        // Sending OTP to user number
//        $basic  = new Basic("797a72af", "DytDVgkbn8Qo2Jh3");
//        $client = new Client($basic);
//        $response = $client->sms()->send(
//            new SMS($user->phone_number, "Kanchha", 'Otp code: ' . $otp)
//        );
//        $message = $response->current();
//
//        if ($message->getStatus() == 0) {
//            return response(UserResource::make($user), 200);
//        } else {
//            return response($message->getStatus(), 401);
//        }
        return response(UserResource::make($user), 200);
    }

    // Verify OTP from user
    public function verifyOtp(Request $request) {
        $validator = Validator::make($request->all(), [
            "phoneNumber" => "required",
            "otp" => "required|min:5"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $user = User::where('phone_number','=',$request->phoneNumber)->where('otp', '=', $request->otp)->first();

        if ($user == null) {
            return response(['errors' => "Wrong OTP!"], 401);
        }

        //Create token after registering user
        Auth::login($user);
        $tokenResult = $user->createToken("Personal Access Token");

        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response([
            'accessToken' => $tokenResult->accessToken,
            'tokenType' => "Bearer",
            'expiresAt' => Carbon::parse($token->expires_at)->toDateTimeString()
        ], 200);
    }

    // Resend OTP to user
    public function resendOtp(Request $request) {
        $validator = Validator::make($request->all(), [
            "phoneNumber" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $otp = rand(10000,99999);
        $user = User::where('phone_number','=',$request->phoneNumber)->first();
        $user->otp = $otp;
        $user->save();

        // Sending OTP to user number
//        $basic  = new Basic("797a72af", "DytDVgkbn8Qo2Jh3");
//        $client = new Client($basic);
//        $response = $client->sms()->send(
//            new SMS($user->phone_number, "Kanchha", 'Otp code: ' . $otp)
//        );
//        $message = $response->current();
//
//        if ($message->getStatus() == 0) {
//            return response(UserResource::make($user), 200);
//        } else {
//            return response($message->getStatus(), 401);
//        }
        return response(UserResource::make($user), 200);
    }

    public function setName(Request $request) {
        $validator = Validator::make($request->all(), [
            "phoneNumber" => "required",
            "fullName" => "required"
        ]);

        if ($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $user = User::where("phone_number", "=", $request->phoneNumber)->first();
        $user->full_name = $request->fullName;
        $user->save();

        return response(UserResource::make($user), 200);
    }

    //logout
    public function logout(Request $request){
        return $request->user()->token()->revoke();
    }

    //get userData
    public function user(Request $request){
        return response(UserResource::make($request->user()), 200);
    }

    //authenticate user
    public function authFailed(){
        return response('unauthenticated', 401);
    }
}
