<div class="form-group row">
    <label for="group_id" class="col-md-4 col-form-label text-md-right">Group</label>
    <div class="col-md-8">
        <select class="form-control" id="group_id" name="group_id">
            @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
    <div class="col-md-8">
        <input class="form-control" id="name" name="name" type="text" value="{{ old('first_name', $location->name) }}">
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
    <div class="col-md-8">
        <textarea class="form-control" id="description" name="description" rows="3">
            {{ old('description', $location->description) }}
        </textarea>
    </div>
</div>

<div class="form-group row">
    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
    <div class="col-md-8">
        <input class="form-control" id="address" name="address" type="text" value="{{ old('address', $location->address) }}">
    </div>
</div>

<div class="form-group row">
    <label for="link" class="col-md-4 col-form-label text-md-right">Link</label>
    <div class="col-md-8">
        <input class="form-control" id="link" name="link" type="text" value="{{ old('address', $location->link) }}">
    </div>
</div>
