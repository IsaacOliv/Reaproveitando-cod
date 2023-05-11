<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login()
    {
        if (Auth::user()) {
            return redirect()->back();
        }
        return view('users.login');
    }
    public function create()
    {

        if (Auth::user()) {
            return redirect()->back();
        }
        return view('users.cadastro');
    }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if ($user) {
            return redirect()->route('login')->with('sucesso', 'Cadastro efetuado com sucesso');
        }
    }
    public function authenticade(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $request->session();

            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect()->back();
    }

    public function show(Request $request)
    {
        $users = User::all();
        $auth = Auth::user();

        $user = Auth::user();
        $user = User::with('roles')->find($user->id);
        $usuarios = User::with('roles')->get();
        if ($user->roles->count() < 1) {
            return redirect()->back();
        } else {
            foreach ($user->roles as $item) {
                if ($item->name === 'Admin') {
                    
                    return view('users.show', compact('users', 'auth'));
                } else {
                    return redirect()->back();
                }
            }
        }
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back();
        }
    }
}
