@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>


<div class="card">
    <div class="card-header">
        Create Role
    </div>

    <div class="card-body">
        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                @error('name')
                    <em class="invalid-feedback">
                        {{ $message }}
                    </em>
                @enderror
            </div>

            <div class="row d-flex justify-content-center mt-100">
                <div class="col-md-6">
                    <select id="choices-multiple-remove-button" name="permissions[]" placeholder="Select upto 5 tags" multiple>
                        @foreach ($permissions as $permission )
                         <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
