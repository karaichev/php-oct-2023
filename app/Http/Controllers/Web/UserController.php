<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function login(): View|RedirectResponse
    {
        return view('user.login');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function auth(LoginRequest $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('user.login');
        }

        return redirect()->route('home');
    }
}
