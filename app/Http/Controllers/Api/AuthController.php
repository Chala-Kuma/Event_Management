<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    //

    public function register(RegisterUserRequest $request){

        $request->validated();
        return User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password" => Hash::make($request->password)
        ]);

    }

    public function login(LoginRequest $request){
        $request->validated();

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match.',
            ], 401);
        }

        $user = User::where("email", $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}
