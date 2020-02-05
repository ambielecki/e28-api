<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminGroupController extends Controller
{
    public function getList(Request $request): View {
        $query = Group::query();

        if ($request->query('search')) {
            $search = strtolower("%{$request->query('search')}%");
            $query = $query->whereRaw('LOWER(name) LIKE ?', $search);
        }

        $groups = $query->paginate(25);

        return view('admin.groups.list', [
            'groups' => $groups,
        ]);
    }

    public function getCreate(): View {
        $group = new Group();

        return view('admin.groups.create', [
            'group' => $group,
        ]);
    }

    public function postCreate(GroupRequest $request): RedirectResponse {
        $group = new Group();
        $group->name = $request->input('name');
        $group->options = [];

        // TODO: Save and attach users

        return back()->withInput();
    }

    public function getEdit($group_id): View {
        $group = Group::find($group_id);

        return view('admin.groups.edit', [
            'group' => $group,
        ]);
    }

    public function postEdit(GroupRequest $request, $group_id) {
        $group = Group::find($group_id);

        // TODO: Update

        return redirect()->route('group_edit', $group_id);
    }
}
