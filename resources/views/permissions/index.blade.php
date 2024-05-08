
@extends('layouts.app')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("permissions.create") }}">
            Add Permission
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Permission List
    </div>
    @php
        $count=1;
    @endphp
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td></td>
                            <td>{{ $count++}}</td>
                            <td>{{ $permission->name ?? '' }}</td>
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('permissions.show', $permission->id) }}">
                                        View
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('permissions.edit', $permission->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this permission?');" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
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
        // Delete button
        @can('permission_delete')
        let deleteButtonTrans = 'Delete';
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('delete-multiple-permissions') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });
                if (ids.length === 0) {
                    alert('Please select at least one permission to delete.');
                    return;
                }
                if (confirm('Are you sure you want to delete the selected permissions?')) {
                    $.ajax({
                        headers: {'x-csrf-token': _token},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }
                    }).done(function () {
                        location.reload();
                    });
                }
            }
        };
        dtButtons.push(deleteButton);
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });

        $('.datatable').DataTable({ buttons: dtButtons });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
