@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12">
  <div class="x_panel">
    @php
        $count=1;
    @endphp
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            <h4 class="font-weight-bold"> All Catagory</h4>
            <div class="mb-3">
              <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
              <thead class="bg-primary">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->created_at }}</td>
                  <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
