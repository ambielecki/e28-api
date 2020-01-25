<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminEventController extends Controller
{
    public function getList(): View {
        return view('admin.events.list');
    }

    public function getCreate(): View {
        return view('admin.events.create');
    }

    public function postCreate(): RedirectResponse {
        return redirect()->route('event_list');
    }
}
