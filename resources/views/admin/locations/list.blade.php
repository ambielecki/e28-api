@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Locations</span>
                        <a href="{{ route('location_create') }}" class="btn btn-outline-dark my-2">Create</a>
                        <div class="float-right">
                            <form class="form-inline my-2" method="GET" action="{{ route('location_list') }}">
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
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($locations as $location)
                                            <tr>
                                                <td><a href="{{ route('location_edit', $location->id) }}">{{ $location->id }}</a> </td>
                                                <td>{{ $location->group->name }}</td>
                                                <td>{{ $location->name }}</td>
                                                <td>{{ $location->address }}</td>
                                                <td><a href="{{ $location->link }}">Link</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $locations->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
