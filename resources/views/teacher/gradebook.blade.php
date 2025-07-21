@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gradebook</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Assignment</th>
                <th>Grade</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grades as $grade)
                <tr>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->assignment->title }}</td>
                    <td>{{ $grade->grade }}</td>
                    <td>{{ $grade->comments }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No grade records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
