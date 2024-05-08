<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('users')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:roles',
        'permissions' => 'array', // Assuming 'permissions' is the name of the input field containing the permissions array
    ]);

    $role = Role::create([
        'name' => $validatedData['name'],
    ]);

    $role->permissions()->sync($validatedData['permissions']);

    return redirect()->route('roles.index');
}

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }
public function edit($id)
{
    $role = Role::findOrFail($id);
    $permissions = Permission::all();

    return view('roles.edit', compact('role', 'permissions'));
}

    public function update(Request $request, Role $role)
{
    $validatedData = $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'permissions' => 'array', // Assuming 'permissions' is the name of the input field containing the permissions array
    ]);

    $role->update([
        'name' => $validatedData['name'],
    ]);

    $role->permissions()->sync($validatedData['permissions']);

    return redirect()->route('roles.index', $role)->with('success', 'Role updated successfully');
}

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
