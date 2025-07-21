@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $student->name }}</h2>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Class:</strong> {{ $student->class }}</p>

    @if($student->upload)
        <p><strong>Uploaded File:</strong></p>
        <a href="{{ asset('storage/uploads/' . $student->upload->filename) }}" target="_blank">View File</a>
    @endif

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
