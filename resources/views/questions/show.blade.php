@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Question Details</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Question:</h5>
                <p>{{ $question->body }}</p>
                <p class="text-muted">Asked by: {{ $question->askedBy->name }}</p>
            </div>
        </div>

        <h2>Answers</h2>

        @if ($question->answers->isEmpty())
            <p>No answers found.</p>
        @else
            <div class="list-group">
                @foreach ($question->answers as $answer)
                    <div class="list-group-item">
                        <p>{{ $answer->body }}</p>
                        <p class="text-muted">Answered by: {{ $answer->answeredBy->name }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
