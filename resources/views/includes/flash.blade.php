@if (Session::has('flash_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success_alert">
        {{ Session::get('flash_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('flash_warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('flash_danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (count($errors))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->getMessages() as $error_field => $field_errors)
                <li>
                    {{ $error_field }}
                    <ul>
                        @foreach ($field_errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif