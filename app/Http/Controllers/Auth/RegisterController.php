<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OpenCageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $openCageService;

    public function __construct(OpenCageService $openCageService)
    {
        $this->openCageService = $openCageService;
    }
    public function create()
    {
        return inertia('Auth/Register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $address_id = $this->openCageService->getCoordinates($request->address);

        if ($address_id){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address_id' => $address_id
            ]);

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Usuario criado com sucesso');
        }else{
            return redirect()->back()->with('error', 'Usuario não foi criado! Cidade não identificada');
        }


    }
}
