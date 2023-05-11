<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRolesController extends Controller
{

    public function add()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::with('roles')->find($user->id);


            $usersSelect = User::get();
            $roles = Roles::get();


            $usuarios = User::with('roles')->get();
            if ($user->roles->count() < 1) {
                return redirect()->back();
            } else {
                foreach ($user->roles as $item) {
                    if ($item->name === 'Admin') {
                        return view('roles.add', compact('usersSelect', 'roles', 'user'));
                    } else {
                        return redirect()->back();
                    }
                }
            }
        }
    }
    public function userRole(Request $request)
    {
        $dados = [
            "id_user" => $request->id_user,
            "id_role" => $request->id_role,
        ];

        $sucesso = UserRoles::create($dados);
        if ($sucesso) {
            return redirect()->back();
        }
    }
}
