<!-- resources/views/roles/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card">
    <div class="card-header">
        Show Role
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $role->id }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>Permissions</th>
                        <td>
                            @foreach($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back to List
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
