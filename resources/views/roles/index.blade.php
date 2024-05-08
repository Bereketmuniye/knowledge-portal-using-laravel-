@extends('layouts.app')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("roles.create") }}">
            Add Role
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Role List
    </div>
    @php
        $count=1;
    @endphp
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">
                            <td></td>
                            <td>{{ $count++}}</td>
                            <td>{{ $role->name ?? '' }}</td>
                            <td>
                                @foreach($role->permissions as $permission)
                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-primary bg-primary" href="{{ route('roles.show', $role->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-success bg-success" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                   <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[1, 'desc']],
            pageLength: 100,
        });

        $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    });
</script>

@endsection
