<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Packages\Service\Auth\Query\AuthService;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): void {
        $this->authService->login($request->ofDomain());
    }

    public function logout(): void {
        $this->authService->logout();
    }
}
