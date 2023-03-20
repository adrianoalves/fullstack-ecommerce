<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login( LoginRequest $request )
    {
        $user = User::query()->where('email', $request->email)->first();
        $authenticated = Hash::check($request->passwd, $user->password);

        if(! $user || ! $authenticated) {
            return \response()->json(['message' => 'Usuário ou senha inválidos'], 401);
        }

        return \response()->json(['token' => $user->createToken('device_test_name')->plainTextToken], 201);
    }
}
