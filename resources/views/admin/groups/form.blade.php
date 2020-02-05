<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    <div class="col-md-8">
        <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $group->name) }}">
    </div>
</div>

<div class="form-group row">
    <label for="users" class="col-md-4 col-form-label text-md-right">Users</label>
    <div class="col-md-8">
        <select class="form-control" id="users" name="users"></select>
    </div>
</div>