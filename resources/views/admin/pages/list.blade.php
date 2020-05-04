@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>Pages</span>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>App</th>
                                            <th>Page</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $page)
                                            <tr>
                                                <td><a href="{{ route('page_edit', $page->id) }}">{{ $page->id }}</a> </td>
                                                <td>{{ $page->app }}</td>
                                                <td>{{ $page->page }}</td>
                                                <td>
                                                    <a href="{{ route('page_edit', $page->id) }}">
                                                        <button type="submit" class="btn btn-primary">
                                                            Edit Page
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('page_delete', $page->id) }}">
                                                        <button type="submit" class="btn btn-primary">
                                                            Delete Page
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $pages->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
