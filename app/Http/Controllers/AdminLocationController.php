<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\LocationRequest;
use App\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Session;

class AdminLocationController extends Controller
{
    public function getList(Request $request): View {
        $query = Location::query();

        if ($request->query('search')) {
            $search = strtolower("%{$request->query('search')}%");
            $query = $query->whereRaw('LOWER(name) LIKE ?', $search)
                ->orWhereRaw('LOWER(description) LIKE ?', $search)
                ->orWhereRaw('LOWER(address) LIKE ?', $search);
        }

        $locations = $query
            ->with(['group'])
            ->paginate(25);

        return view('admin.locations.list', [
            'locations' => $locations,
        ]);
    }

    public function getCreate(): View {
        $location = new Location();
        $groups = Group::all();

        return view('admin.locations.create', [
            'location' => $location,
            'groups' => $groups,
        ]);
    }

    public function postCreate(LocationRequest $request): RedirectResponse {
        $location = new Location();
        $location->group_id = $request->input('group_id');
        $location->name = $request->input('name');
        $location->description = $request->input('description');
        $location->address = $request->input('address');
        $location->link = $request->input('link');

        if ($location->save()) {
            Session::flash('flash_success', "Location: $location->name Updated Successfully");

            return redirect()->route('location_list');
        }
        Session::flash('flash_error', 'There was a problem saving your location, please try again.');

        return back()->withInput();
    }

    public function getEdit($location_id): View {
        $location = Location::find($location_id)->with('group');
        $groups = Group::all();

        return view('admin.locations.edit', [
            'location' => $location,
            'groups' => $groups,
        ]);
    }

    public function postEdit(LocationRequest $request, $location_id): RedirectResponse {
        return back();
    }
}
