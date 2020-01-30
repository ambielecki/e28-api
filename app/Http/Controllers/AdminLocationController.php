<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\LocationRequest;
use App\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLocationController extends Controller
{
    public function getList(Request $request): View {
        return view('admin.locations.list');
    }

    public function getCreate(): View {
        $groups = Group::all();

        return view('admin.locations.create', compact('groups'));
    }

    public function postCreate(LocationRequest $request): RedirectResponse {
        return redirect()->route('location_list');
    }

    public function getEdit($location_id): View {
        $location = Location::find($location_id);
        $groups = Group::all();

        return view('admin.locations.edit', compact(
            'location',
            'groups'
        ));
    }

    public function postEdit(LocationRequest $request, $location_id): RedirectResponse {
        return back();
    }
}
