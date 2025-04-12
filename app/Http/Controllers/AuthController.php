<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traitement du formulaire de connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // rediriger vers tableau de bord
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ]);
    }

    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        $roles = Role::all(); // pour choisir un rôle à l'inscription
        return view('auth.register', compact('roles'));
    }

    // Traitement de l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role_id' => ['required', 'exists:roles,id']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        Auth::login($user); // connexion automatique après inscription

        return redirect('/dashboard');
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
