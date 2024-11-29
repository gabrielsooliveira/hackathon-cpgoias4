<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return inertia('Auth/Register');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'string', 'max:15'],
        //     'enterprise' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed'],
        //     'origins_meet_id' => ['required', 'exists:origins_meet,id'],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'phone' => $request->phone,
        //     'enterprise' => $request->enterprise,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'origins_meet_id' => $request->origins_meet_id,
        // ]);
        dd($request);
        Auth::login($user);

        return redirect()->route('home');
    }
}
