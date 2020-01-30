@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Events</span>
                        <a href="{{ route('event_create') }}" class="btn btn-outline-dark my-2">Create</a>
                        <div class="float-right">
                            <form class="form-inline my-2" method="GET" action="{{ route('event_list') }}">
                                <input name="search" id="search" class="form-control my-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-dark my-2" type="submit">Search</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Group</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td><a href="{{ route('event_edit', $event->id) }}">{{ $event->id }}</a> </td>
                                            <td>{{ $event->group->name }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->type }}</td>
                                            <td>{{ $event->location->name }}</td>
                                            <td>{{ date('Y-m-d h:i', strtotime($event->start_time)) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $events->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
