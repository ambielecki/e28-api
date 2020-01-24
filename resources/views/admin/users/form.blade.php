<div class="form-group row">
    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
    <div class="col-md-8">
        <input class="form-control" id="first_name" name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}">
    </div>
</div>

<div class="form-group row">
    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
    <div class="col-md-8">
        <input class="form-control" id="last_name" name="last_name" type="text" value="{{ old('last_name', $user->last_name) }}">
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
    <div class="col-md-8">
        <input class="form-control" id="email" name="email" type="text" value="{{ old('email', $user->email) }}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right" for="is_admin">
        Admin
    </label>
    <div class="col-md-8">
        <input class="form-control" type="checkbox" id="is_admin" name="is_admin" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
    </div>
</div>