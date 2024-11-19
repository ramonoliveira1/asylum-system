<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Confirmação de senha
            'access_level' => 'required|in:0,1', // 0: Usuário normal, 1: Administrador
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Criptografa a senha
            'access_level' => $validated['access_level'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Usuário criado com sucesso!');
    }

}
