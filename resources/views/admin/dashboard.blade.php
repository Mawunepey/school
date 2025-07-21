@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Teachers</h5>
                    <p>{{ $totalTeachers ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Students</h5>
                    <p>{{ $totalStudents ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <!-- Add more widgets/stats here -->
    </div>
</div>
@endsection
