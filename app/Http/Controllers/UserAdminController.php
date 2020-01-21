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
}
