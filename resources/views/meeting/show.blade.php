<!-- resources/views/meeting/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $meeting->title }}</h1>
    <p>{{ $meeting->description }}</p>

    @if ($countdown)
        <p>Time remaining until the meeting: {{ $countdown }}</p>
    @else
        <p>No meeting scheduled.</p>
    @endif
@endsection
