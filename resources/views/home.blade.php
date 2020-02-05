@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href="{{ route('user_list') }}">Users</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('group_list') }}">Groups</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('event_list') }}">Events</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('location_list') }}">Locations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
