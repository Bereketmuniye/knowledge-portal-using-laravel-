@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="font-weight-bold">Create Knowledge Base</h4>
                        <form action="{{ route('knowledgeBase.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="text" class="form-control" id="question" name="question" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea class="form-control" id="answer" name="answer" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
