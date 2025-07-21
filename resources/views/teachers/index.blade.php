@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table">
        <thead><tr><th>Name</th><th>Email</th><th>Subject</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->subject }}</td>
                <td>
                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $teachers->links() }}
</div>
@endsection
