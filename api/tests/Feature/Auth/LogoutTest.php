<?php

namespace Tests\Feature\TimeLimit\Auth;

use Tests\DBRefreshTestCase;

class LogoutTest extends DBRefreshTestCase
{
    public function test_ログアウトを行う(): void
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

        $response = $this->post('/api/users/logout');
        $response->assertOk();

        $this->assertFalse(auth()->check());
    }
}
