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
            <h4 class="font-weight-bold"> All Article</h4>
            <div class="mb-3">
              <a href="{{ route('article.create') }}" class="btn btn-success">Create</a>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
              <thead class="bg-primary">
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Full Text</th>
                  <th>Short Text</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($articles as $article)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{ $article->title }}</td>
                  <td>{{ $article->full_text }}</td>
                  <td>{{ $article->short_text }}</td>
                  <td>{{ $article->category->name }}</td>
                  <td>
                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('article.destroy', $article->id) }}" method="POST" style="display: inline-block;">
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
    </div>
  </div>
</div>
@endsection
