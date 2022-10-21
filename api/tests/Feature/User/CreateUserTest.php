<?php

namespace Tests\Feature\User;

use Illuminate\Support\Facades\Hash;
use Packages\Infrastructure\EloquentModels\User\User;
use Tests\DBRefreshTestCase;

final class CreateUserTest extends DBRefreshTestCase {
    public function test_ユーザーの作成を行う(): void {
        $password = 'password';

        $request = [
            'username' => 'username',
            'password' => $password,
        ];
        $response = $this->post('/api/users', $request);
        $response->assertOk();

        unset($request['password']);

        $user = User::first();
        $this->assertTrue(Hash::check($password, $user->password));
        $this->assertEquals(
            $request,
            ['username' => $user->username]
        );
    }

    public function test_ユーザーの作成を行う際に既にユーザーが作成されていたら500が返ること(): void {
        $request = [
            'username' => 'username',
            'password' => 'password',
        ];
        $response = $this->post('/api/users', $request);
        $response = $this->post('/api/users', $request);
        $response->assertStatus(500);
    }
}
