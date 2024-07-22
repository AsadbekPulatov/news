<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request){
        $data = $request->validated();
        return $this->authService->login($data);
    }

    public function register(RegisterRequest $request){
        $data = $request->validated();
        return $this->authService->register($data);
    }

    public function logout(){
        return $this->authService->logout();
    }
}
