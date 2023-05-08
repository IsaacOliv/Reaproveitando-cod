<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        Roles::create($request->all());
        return redirect()->route('roles.show');
    }
    public function show()
    {
        $roles = Roles::all();
        return view('roles.show', compact('roles'));
    }
    public function destroy($id)
    {
        $role=Roles::find($id);
        if ($role) {
            $role->delete();
            return redirect()->back()->with('sucesso', 'Deletado com sucesso');
        }
        return redirect()->back()->with('falha', 'Falha ao deletar');
    }
    public function edit($id)
    {
        $role = Roles::find($id);
        return view('roles.edit', compact('role'));
    }
    public function update(Request $request, $id)
    {
        $role = Roles::find($id);

        $role->update($request->all());

        return redirect()->route('roles.show');

    }

}
