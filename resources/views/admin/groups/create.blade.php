@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Group</div>

                    <div class="card-body">
                        <form id="group_create" method="POST" action="{{ route('group_create') }}">
                            @csrf

                            @include('admin.groups.form')

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create Group
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

@push('scripts')
    <script>
        let token = document.getElementsByName('_token')[0].value;

        $('#users').select2({
            ajax: {
                url: '/admin/users/ajax-list',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.terms,
                        _token: token,
                    };

                    return query;
                },
            },
        });
    </script>
@endpush
