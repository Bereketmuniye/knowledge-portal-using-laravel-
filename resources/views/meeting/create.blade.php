@extends('layouts.app')
@section('content')
    <h1>Announce Meeting</h1>

    <form method="POST" action="{{ route('meeting.store') }}">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="meeting_date">Meeting Date:</label>
            <input type="datetime-local" name="meeting_date" id="meeting_date" required>
        </div>

        <button type="submit">Announce Meeting</button>
    </form>
@endsection
