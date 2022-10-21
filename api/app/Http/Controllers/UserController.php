<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use Packages\Service\User\Query\InitUserService;

class UserController extends Controller
{
    private InitUserService $initUserService;

    public function __construct(
        InitUserService $initUserService
    ) {
        $this->initUserService = $initUserService;
    }

    public function createUser(CreateUserRequest $request): void {
        $this->initUserService->createUser($request->ofDomain());
    }
}
