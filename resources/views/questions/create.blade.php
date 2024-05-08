@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Question</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question-body">Question:</label>
                        <textarea class="form-control" id="question-body" name="body" rows="5" placeholder="Enter your question" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
