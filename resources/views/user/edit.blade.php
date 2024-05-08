@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>
    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Update</button>
    </form>
@endsection
