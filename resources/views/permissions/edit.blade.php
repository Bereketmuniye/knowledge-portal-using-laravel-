@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Permission
    </div>

    <div class="card-body">
        <form action="{{ route("permissions.edit", $permission->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection
