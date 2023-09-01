@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Student</div>
        <div class="card-body">
            <form method="POST" action="{{ route('student.update', ['student_lrn' => $student->student_lrn]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="student_name">Student Name:</label>
                    <input type="text" name="student_name" value="{{ $student->student_name }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="{{ $student->address }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" value="{{ $student->contact }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="section">Section:</label>
                    <input type="text" name="section" value="{{ $student->section }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="grade">Grade:</label>
                    <input type="text" name="grade" value="{{ $student->grade }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" name="age" value="{{ $student->age }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="guardian_name">Guardian Name:</label>
                    <input type="text" name="guardian_name" value="{{ $student->guardian_name }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="guardian_phone">Guardian Phone:</label>
                    <input type="text" name="guardian_phone" value="{{ $student->guardian_phone }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="guardian_email">Guardian Email:</label>
                    <input type="email" name="guardian_email" value="{{ $student->guardian_email }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
