<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function login(): View
    {
        return view('user.login');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }

    public function auth(): RedirectResponse
    {
        $email = request()->input('email');
        $password = request()->input('password');

        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('user.login');
        }

        return redirect()->route('home');
    }
}
