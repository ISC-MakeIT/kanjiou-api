<?php

namespace Tests\Feature\TimeLimit\Auth;

use Tests\DBRefreshTestCase;

class LoginTest extends DBRefreshTestCase
{
    public function test_ログインを行う(): void
    {
        $request = [
            'username' => 'username',
            'password' => 'password',
        ];
        $response = $this->post('/api/users', $request);
        $response->assertOk();

        $request = [
            'username' => 'username',
            'password' => 'password',
        ];
        $response = $this->post('/api/users/login', $request);
        $response->assertOk();

        $this->assertTrue(auth()->check());
    }
}
