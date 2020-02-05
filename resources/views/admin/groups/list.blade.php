@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Groups</span>
                        <a href="{{ route('group_create') }}" class="btn btn-outline-dark my-2">Create</a>
                        <div class="float-right">
                            <form class="form-inline my-2" method="GET" action="{{ route('group_list') }}">
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
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $group)
                                            <tr>
                                                <td><a href="{{ route('group_edit', $group->id) }}">{{ $group->id }}</a> </td>
                                                <td>{{ $group->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $groups->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
