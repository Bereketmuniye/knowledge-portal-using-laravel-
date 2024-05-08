@extends('layouts.app')

@section('content')
   <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <h1>Create User</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
