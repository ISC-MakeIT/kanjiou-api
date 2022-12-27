<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Packages\Service\User\Command\RegisterUserService;
use Packages\Service\User\Command\UserToLoginService;
use Packages\Service\User\Command\UserToLogoutService;

final class UserController extends Controller {
    private RegisterUserService $registerUserService;
    private UserToLoginService $userToLoginService;
    private UserToLogoutService $userToLogoutService;

    public function __construct(
        RegisterUserService $registerUserService,
        UserToLoginService $userToLoginService,
        UserToLogoutService $userToLogoutService
    ) {
        $this->registerUserService = $registerUserService;
        $this->userToLoginService  = $userToLoginService;
        $this->userToLogoutService = $userToLogoutService;
    }

    public function index(): RedirectResponse {
        return redirect('/earthAdmin/login');
    }

    public function showLoginForm(): View|Factory {
        return view('admin.login');
    }

    public function login(LoginRequest $request): RedirectResponse {
        if ($request->hasValidationError()) {
            return back()->withInput()->withErrors($request->validatedMessages());
        }

        $this->userToLoginService->login($request->toDomain());

        return redirect('/earthAdmin/ranks/default');
    }

    public function showSignInForm(): View|Factory {
        return view('admin.signIn');
    }

    public function signIn(RegisterUserRequest $request): RedirectResponse {
        if ($request->hasValidationError()) {
            return back()->withInput()->withErrors($request->validatedMessages());
        }

        $this->registerUserService->registerUser($request->toDomain());

        return redirect('/earthAdmin/ranks/default');
    }

    public function logout(): RedirectResponse {
        $this->userToLogoutService->logout();

        return redirect('/earthAdmin/login');
    }
}
