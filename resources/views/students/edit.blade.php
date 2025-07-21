@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $student->name) }}">
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $student->email) }}">
        </div>
        <div class="mb-3">
            <label>Class:</label>
            <input type="text" name="class" class="form-control" required value="{{ old('class', $student->class) }}">
        </div>
        <div class="mb-3">
            <label>Replace File (optional):</label>
            <input type="file" name="file" class="form-control" accept="image/*,application/pdf">
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection
