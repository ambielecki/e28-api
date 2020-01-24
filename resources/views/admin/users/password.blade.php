@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Change Password</div>

                    <div class="card-body">
                        <form id="user_password" method="POST" action="{{ route('user_password') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-right">Current Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="current_password" name="current_password" type="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="new_password" name="new_password" type="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="new_password_confirmation" name="new_password_confirmation" type="password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
