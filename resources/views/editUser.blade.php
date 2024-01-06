<!-- resources/views/editUser.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit User</h1>

    <form action="{{ route('updateUser', ['id' => $user->id]) }}" method="post">
        @csrf
        @method('PUT') <!-- Use the PUT method for updating -->

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" value="{{ $user->name }}" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" value="{{ $user->email }}" required>

        <!-- Add other user fields as needed -->

        <button type="submit">Update</button>
    </form>
@endsection
