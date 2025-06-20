<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::paginate(50);
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->fill($validated)->save();

        return Redirect::route('admin.users.index');
    }


    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return Redirect::route('admin.users.index');
    }
}
