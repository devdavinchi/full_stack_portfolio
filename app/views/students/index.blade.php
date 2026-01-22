
@extends('layouts.master')

@section('content')

<a href="index.php?page=create">Add Student</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    @foreach($students as $s)
    <tr>
        <td>{{ $s['id'] }}</td>
        <td>{{ $s['name'] }}</td>
        <td>{{ $s['email'] }}</td>
        <td>{{ $s['course'] }}</td>
        <td>
            <a href="index.php?page=edit&id={{ $s['id'] }}">Edit</a>
            <a href="index.php?page=delete&id={{ $s['id'] }}">Delete</a>
        </td>
    </tr>
    @endforeach

</table>

@endsection
