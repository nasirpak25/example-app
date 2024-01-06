<!-- resources/views/readUsers.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Read Users</h1>

   
    <table class=" ms-5">
        <tr class="border">
            <td class="border p-3">Name </td>
            <td class="border p-3">Email <td>
        </tr>
        @foreach ($users as $user)
        <tr>
            
            <td class="border p-3">{{ $user->name }}</td>
            <td class="border p-3"> {{ $user->email }}</td>
            <td class="border p-1"><button><a class="text-decoration-none" href="{{ route('editUser', ['id' => $user->id]) }}">Update</a></button>
            </td>
            <td class="border p-1">
                <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </table>
       
    
@endsection
