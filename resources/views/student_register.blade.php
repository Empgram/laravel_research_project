@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Student Dashboard</h1>
            </div>

            <!-- Content goes here -->
            <div class="card">
                <div class="card-body">
                    Welcome to the Student Dashboard!
                </div>
            </div>

            <!-- Student Registration Form -->
            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Student Registration</div>
                        <div class="card-body">
                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="studentlrn" class="form-label">Student LRN</label>
                                    <input type="text" class="form-control" id="student_lrn" name="student_lrn" required>
                                </div>

                                <div class="mb-3">
                                    <label for="studentname" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" required>
                                </div>

                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <input type="text" class="form-control" id="section" name="section" required>
                                </div>

                                <div class="mb-3">
                                    <label for="grade" class="form-label">Grade</label>
                                    <input type="text" class="form-control" id="grade" name="grade" required>
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="age" name="age" required>
                                </div>

                                <div class="mb-3">
                                    <label for="guardianname" class="form-label">Guardian Name</label>
                                    <input type="text" class="form-control" id="guardian_name" name="guardian_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="guardianphone" class="form-label">Guardian Phone</label>
                                    <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="guardianemail" class="form-label">Guardian Email</label>
                                    <input type="email" class="form-control" id="guardian_email" name="guardian_email" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Register Student</button>
                                <a href="{{ route('student.list') }}" class="btn btn-primary">Back</a> <!-- Add this button -->
               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
