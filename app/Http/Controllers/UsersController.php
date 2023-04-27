<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Podcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.users', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user] );
    }

    public function destroy(User $user)
    {
        Gate::authorize('edit-users', $user);
        $user->delete();
        return redirect(route('home'))->with('message', 'User successfully deleted !');
    }
    public function edit(User $user){
        Gate::authorize('edit-users', $user);
        return redirect(route('users.edit', $user))->with('message', 'Please, edit your user !');
    }


}
