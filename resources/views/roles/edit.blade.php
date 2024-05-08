<!-- resources/views/roles/edit.blade.php -->

@extends('layouts.app')

@section('content')
   <div class="card">
    <div class="card-header">
        Edit Role
    </div>

    <div class="card-body">
        <form action="{{ route("roles.update", $role->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
            </div>
            <div class="row d-flex justify-content-center mt-100">
                <div class="col-md-6">
                    <select id="choices-multiple-remove-button" name="permissions[]" placeholder="Select up to 5 tags" multiple>
                        @foreach ($permissions as $permission)
                        <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 5,
            searchResultLimit: 5,
            renderChoiceLimit: 5
        });
    });
</script>
@endsection
