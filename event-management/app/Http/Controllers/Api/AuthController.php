<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = \App\Models\User::where('email', $request->email)->first();
        if (!$user) {
            throw ValidationException::withMessage([
                'email' => ['The provided credentials are incorrect']
            ]);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessage([
                'email' => ['The provided credentials are incorrect']
            ]);
        }
    }

    public function logout(Request $request)
    {

    }
}
