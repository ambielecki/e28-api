<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminEventController extends Controller
{
    public function getList(Request $request): View {
        $query = Event::query();

        if ($request->query('search')) {
            $search = strtolower("%{$request->query('search')}%");
            $query = $query->whereRaw('LOWER(title) LIKE ?', $search)
                ->orWhereRaw('LOWER(description) LIKE ?', $search);
        }

        $events = $query->paginate(25);

        return view('admin.users.list', [
            'events' => $events,
        ]);
    }

    public function getCreate(): View {
        return view('admin.events.create');
    }

    public function postCreate(): RedirectResponse {
        return redirect()->route('event_list');
    }
}
