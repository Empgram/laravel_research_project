@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row justify-content-center mt-10">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Guidance Report Details</div>

                        <div class="card-body">
                            <p><strong>Form ID:</strong> {{ $guidanceReport->form_id }}</p>
                            <p><strong>Reason:</strong> {{ $guidanceReport->reason }}</p>
                            <p><strong>Perpetrator LRN:</strong> {{ $guidanceReport->perpetrator_lrn }}</p>
                            <p><strong>Perpetrator Name:</strong> {{ $guidanceReport->perpetrator_name }}</p>
                            <p><strong>Violation Type:</strong> {{ $guidanceReport->violation_type }}</p>
                            <p><strong>Student LRN:</strong> {{ $guidanceReport->student_lrn }}</p>
                            <p><strong>Student Name:</strong> {{ $guidanceReport->student_name }}</p>
                            <p><strong>Parent Contacted:</strong> {{ $guidanceReport->parent_contacted }}</p>
                            <p><strong>Teacher Name:</strong> {{ $guidanceReport->teacher_name }}</p>
                            <p><strong>Date:</strong> {{ $guidanceReport->date }}</p>

                            <!-- Add more details here as needed -->

                            <a href="{{ route('guidance-reports.list') }}" class="btn btn-primary">Back to List</a>
                            <a href="{{ route('student.view', ['lrn' => $guidanceReport->student_lrn]) }}" class="btn btn-primary">View Student</a>
                            <a href="{{ route('student.view', ['lrn' => $guidanceReport->perpetrator_lrn]) }}" class="btn btn-primary">View Perpetrator</a>
                        
    @if($appointment)
    <div class="card">
        <div class="card-header">Appointment Details</div>
        <div class="card-body">
            <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
            <p><strong>Appointment Time:</strong> {{ $appointment->appointment_time }}</p>
        </div>
    </div>
    @else
    <p>No appointment available for this guidance report.</p>
    @endif

    <a href="{{ route('view-appointment', ['form_id' => $guidanceReport->form_id]) }}" class="btn btn-primary">View Appointment</a>
    <!-- Other buttons and links -->

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Right sidebar -->
        <aside class="col-md-3 col-lg-2 d-md-block bg-light">
            <div class="position-sticky">
                <a href="{{ route('make-appointment', ['form_id' => $guidanceReport->form_id]) }}" class="btn btn-primary">Appointment</a>

                <!-- Add more sidebar content here -->
            </div>
        </aside>
    </div>
</div>
@endsection
