<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Http\Request;

class UserRolesController extends Controller
{

    public function add()
    {
        $users = User::all();
        $roles = Roles::all();
        return view('roles.add', compact('users', 'roles'));
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
