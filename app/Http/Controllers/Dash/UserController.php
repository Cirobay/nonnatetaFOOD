<?php

namespace App\Http\Controllers\Dash;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('dash.users.index');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dash.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('dash.users.edit', $user)->with('info', 'Il Ruolo è stato assegnato correttamente!');
    }
}
