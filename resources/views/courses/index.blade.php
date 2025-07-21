@extends('layouts.app')

@section('content')
{{-- <!-- resources/views/courses/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">All Courses</h2>
    </x-slot>

    <div class="p-6">
        <p>This is the courses index page.</p>
    </div>
</x-app-layout> --}}

<div class="container">
    <h1>Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>


    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table">
        <thead><tr><th>Title</th><th>Code</th><th>Teacher</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->title }}</td>
                <td>{{ $course->code }}</td>
                <td>{{ $course->teacher->name }}</td>
                <td>
                    <a href="{{ route('courses.index') }}"
                        class="{{ request()->routeIs('courses.index') ? 'text-indigo-600 font-bold' : 'text-gray-700 hover:text-indigo-600' }}">
                        Courses
                    </a>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $courses->links() }}
</div>
@endsection
