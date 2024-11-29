<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->where('status', 1)->first();

        if (!$user) {
            return back()->with('error', 'Sua conta está desativada. Entre em contato com a administração do sistema.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended()->with('success', 'Login realizado com sucesso');
        }

        return back()->with('error', 'As credenciais fornecidas não coincidem com nossos registros.');
    }
}

