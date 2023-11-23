<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Sanctum\NewAccessToken;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (!Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'message' => 'Invalid username or password'
            ], 401);
        }

        $user = Auth::guard('web')->user();
        /** @var NewAccessToken $token */
        $token = $user->createToken('login');


        return ['token' => $token->plainTextToken];
    }
}
