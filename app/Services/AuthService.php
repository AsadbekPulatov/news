<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($data){
        if (Auth::attempt(['email' => $data["email"], 'password' => $data["password"]])) {
            $auth = Auth::user();
            $user['token'] = $auth->createToken('AuthToken')->plainTextToken;
            $user['user'] = $auth;
            return $user;
        } else {
            $res = [
                "error" => "unauthorized",
                "message" => "email or password invalid"
            ];
            return response()->json($res, 401);
        }

    }

    public function register($data){
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return $user;
    }

    public function logout(){
        auth()->user()->currentAccessToken()->delete();
        $message = "User successfully logged out!";
        return $message;
    }
}
