@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Delete Page ID: {{ $page->id }}</div>

                    <div class="card-body">
                        <form id="page_create" method="POST" action="{{ route('page_delete', $page->id) }}">
                            @csrf

                            <p>Are you sure you want to delete this page?</p>
                            <p><b>App: </b>{{ $page->app }}</p>
                            <p><b>Page: </b>{{ $page->page }}</p>
                            {!! $page->content !!}

                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary">
                                    Delete Page
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
