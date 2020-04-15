<div class="form-group row">
    <label for="app" class="col-md-4 col-form-label text-md-right">App</label>
    <div class="col-md-8">
        <select class="form-control" id="app" name="app">
            @foreach (\App\Page::APPS as $app)
                <option value="{{ $app }}" {{ old('app', ($page->app ? $page->app : '')) == $app ? 'selected' : '' }}>{{ $app }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="page" class="col-md-4 col-form-label text-md-right">Page</label>
    <div class="col-md-8">
        <select class="form-control" id="page" name="page">
            @foreach (\App\Page::PAGE_TYPES as $page_type)
                <option value="{{ $page_type }}" {{ old('page', ($page->page ? $page->page : '')) == $page_type ? 'selected' : '' }}>{{ $page_type }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-group row">
    <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
    <div class="col-md-8">
        <textarea id="content" name="content">{!! $page->content !!}</textarea>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            ClassicEditor
                .create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        });
    </script>
@endpush
