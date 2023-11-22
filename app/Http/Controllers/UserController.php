<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

        $token = Str::random(32);

        $user = Auth::guard('web')->user();
        $user->update(['api_token' => $token]);

//        dd();

        return ['token' => $token];
    }
}
