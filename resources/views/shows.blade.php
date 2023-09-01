@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Student Details</div>
        <div class="card-body">
            <h5 class="card-title">Student Information</h5>
            <p><strong>Student LRN:</strong> {{ $student->student_lrn }}</p>
            <p><strong>Student Name:</strong> {{ $student->student_name }}</p>
            <p><strong>Address:</strong> {{ $student->address }}</p>
            <p><strong>Contact:</strong> {{ $student->contact }}</p>
            <p><strong>Section:</strong> {{ $student->section }}</p>
            <p><strong>Grade:</strong> {{ $student->grade }}</p>
            <p><strong>Age:</strong> {{ $student->age }}</p>
            <p><strong>Guardian Name:</strong> {{ $student->guardian_name }}</p>
            <p><strong>Guardian Phone:</strong> {{ $student->guardian_phone }}</p>
            <p><strong>Guardian Email:</strong> {{ $student->guardian_email }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
