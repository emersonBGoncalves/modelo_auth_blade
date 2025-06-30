<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt($credentials)) {
            // Authentication passed, redirect to intended page
            return redirect()->intended('home');
        }

        // Authentication failed, redirect back with error
        return back()->withErrors([
            'email' => 'Email ou senha incorretos.',
        ]);
    }

    /**
     * Handle an incoming logout request.
     */
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/')->with('message', 'Você saiu com sucesso.');
    }

    public function register(Request $request)
    {
        // Validate the registration data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password',
        ],
        [
            'email.unique' => 'Este e-mail já está registrado.',
            'password' => 'As senha é obrigatório e deve ter no minimo 8 caracteres.',
            'name' => 'O nome é obrigatório.',
            'email' => 'O e-mail é obrigatório e deve ser válido.',
            'password_confirmation.same' => 'A confirmação de senha deve coincidir com a senha.',
            'password_confirmation' => 'A confirmação de senha é obrigatória e deve ter no minimo 8 caracteres.',
        ]);

        // Check if the user already exists
        if (User::where('email', $data['email'])->exists()) {
            return back()->withErrors([
                'email' => 'Este e-mail já está registrado.',
            ]);
        }

        // Create the user
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);

        return redirect('/')->with('message', 'Registro realizado com sucesso.');
    }
}
