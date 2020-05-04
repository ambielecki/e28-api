@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User Page ID: {{ $user->id }}</div>

                    <div class="card-body">
                        <form id="page_create" method="POST" action="{{ route('user_delete', $user->id) }}">
                            @csrf

                            <p>Are you sure you want to delete this user?</p>
                            <p><b>First Name: </b>{{ $user->first_name }}</p>
                            <p><b>Last Name: </b>{{ $user->last_name }}</p>
                            <p><b>Email: </b>{{ $user->email }}</p>

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Delete User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
