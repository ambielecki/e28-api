<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Session;

class AdminUserController extends Controller
{
    public function getList(Request $request): View {
        $query = User::query();

        if ($request->query('search')) {
            $search = strtolower("%{$request->query('search')}%");
            $query = $query->whereRaw('LOWER(first_name) LIKE ?', $search)
                ->orWhereRaw('LOWER(last_name) LIKE ?', $search)
                ->orWhereRaw('LOWER(email) LIKE ?', $search);
        }

        $users = $query->paginate(25);

        return view('admin.users.list', [
            'users' => $users,
        ]);
    }

    public function getEdit($user_id): View {
        $user = User::find($user_id);

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function postEdit(UserRequest $request, $user_id): RedirectResponse {
        $user = User::find($user_id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin') ? 1 : 0;

        if ($user->save()) {
            Session::flash('flash_success', "User $user->first_name $user->last_name Updated Successfully");

            return redirect()->route('user_list');
        }

        return back()->withInput();
    }

    public function getPassword(): View {
        return view('admin.users.password');
    }

    public function postPassword(Request $request): RedirectResponse {
        $request->validate([
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        $user = \Auth::user();

        if ($user && Hash::check($request->input('current_password'), $user->password)) {
            $user->password = Hash::make($request->input('new_password'));
            if ($user->save()) {
                Session::flash('flash_success', 'Password Updated Successfully');

                return redirect()->route('home');
            }
        } else {
            return back()->withErrors([
                'current_password' => 'Current Password is Incorrect'
            ]);
        }

        return back();
    }
}
