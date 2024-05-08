@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="font-weight-bold">Edit Knowledge Base Entry</h4>
                        <form action="{{ route('knowledgeBase.update', $knowledgeBase->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" id="question" name="question" value="{{ $knowledgeBase->question }}" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea class="form-control" id="answer" name="answer" rows="3" required>{{ $knowledgeBase->answer }}</textarea>
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
