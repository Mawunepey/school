@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($teacher) ? 'Edit' : 'Add' }} Teacher</h2>

    <form method="POST" action="{{ isset($teacher) ? route('teachers.update', $teacher) : route('teachers.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($teacher)) @method('PUT') @endif

        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ old('name', $teacher->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" value="{{ old('email', $teacher->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Subject</label>
            <input name="subject" class="form-control" value="{{ old('subject', $teacher->subject ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Upload File (Image/PDF)</label>
            <input type="file" name="file" class="form-control" accept="image/*,application/pdf">
        </div>

        <button class="btn btn-success">{{ isset($teacher) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
