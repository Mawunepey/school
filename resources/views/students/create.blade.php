@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Student</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label>Class:</label>
            <input type="text" name="class" class="form-control" required value="{{ old('class') }}">
        </div>
        <div class="mb-3">
            <label>Upload Image/PDF (optional):</label>
            <input type="file" name="file" class="form-control" accept="image/*,application/pdf">
        </div>
        <button type="submit" class="btn btn-success">Add Student</button>
    </form>
</div>
@endsection
