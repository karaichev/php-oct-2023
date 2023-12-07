<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected User $currentUser;

    protected function login(): void
    {
        $this->currentUser = User::factory()
            ->createOne([
                'password' => Hash::make('password')
            ]);

        Sanctum::actingAs($this->currentUser);
    }
}
