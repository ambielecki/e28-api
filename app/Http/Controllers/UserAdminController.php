<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserAdminController extends Controller
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

    public function postEdit(Request $request, $user_id) {
        // TODO::Implement with validation

        $user = User::find($user_id);

        if ($user && $user->save()) {
            return redirect()->route('user_list');
        }

        return back()->withInput();
    }
}
