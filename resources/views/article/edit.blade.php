@extends('layouts.app')
@section('content')
<div class="col-md-12 col-sm-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">
            <h4 class="font-weight-bold">Edit Article</h4>
            <form action="{{ route('article.update', $article->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
              </div>
              <div class="form-group">
                <label for="full_text">Full Text</label>
                <textarea class="form-control" id="full_text" name="full_text" rows="5" required>{{ $article->full_text }}</textarea>
              </div>
              <div class="form-group">
                <label for="short_text">Short Text</label>
                <textarea class="form-control" id="short_text" name="short_text" rows="3" required>{{ $article->short_text }}</textarea>
              </div>
              <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection