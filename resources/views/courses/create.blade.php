@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($course) ? 'Edit' : 'Add' }} Course</h2>

    <form method="POST" action="{{ isset($course) ? route('courses.update', $course) : route('courses.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($course)) @method('PUT') @endif

        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control" value="{{ old('title', $course->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Code</label>
            <input name="code" class="form-control" value="{{ old('code', $course->code ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $course->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Teacher</label>
            <select name="teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $course->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Upload Material (PDF/Image)</label>
            <input type="file" name="file" class="form-control" accept="image/*,application/pdf">
        </div>

        <button class="btn btn-success">{{ isset($course) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection
