<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::with('roles')->find($user->id);

            if ($user->roles->count() < 1) {
                return redirect()->back();
            } else {
                foreach ($user->roles as $item) {
                    if ($item->name === 'Admin') {
                        return view('roles.create', compact('user'));
                        
                    } else {
                        return redirect()->back();
                    }
                }
            }
        }
    }
    public function store(Request $request)
    {
        Roles::create($request->all());
        return redirect()->route('roles.show');
    }
    public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::with('roles')->find($user->id);
            $roles = Roles::all();
            // dd($user);
            return view('roles.show', compact('roles', 'user'));
        }
    }
    public function destroy($id)
    {
        $role = Roles::find($id);
        if ($role) {
            $role->delete();
            return redirect()->back()->with('sucesso', 'Deletado com sucesso');
        }
        return redirect()->back()->with('falha', 'Falha ao deletar');
    }
    public function edit($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::with('roles')->find($user->id);
            // dd($user);
            $role = Roles::find($id);
            return view('roles.edit', compact('role', 'user'));
        }
    }
    public function update(Request $request, $id)
    {
        $role = Roles::find($id);
        $role->update($request->all());
        return redirect()->route('roles.show');
    }
}
