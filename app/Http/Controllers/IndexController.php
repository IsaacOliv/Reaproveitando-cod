<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::with('roles')->find($user->id);

            $usuarios = User::with('roles')->get();
            // dd($usuarios);
            return view('index', compact('user', 'usuarios'));
        }
    }
}
