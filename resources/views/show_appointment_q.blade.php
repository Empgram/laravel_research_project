@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Guidance Report Details</div>

                <div class="card-body">
                    <!-- Display guidance report details -->
                    <p><strong>Form ID:</strong> {{ $guidanceReport->form_id }}</p>
                    <p><strong>Reason:</strong> {{ $guidanceReport->reason }}</p>
                    <p><strong>Student Name:</strong> {{ $guidanceReport->student_name }}</p>
                    <p><strong>Student Name:</strong> {{ $guidanceReport->perpetrator_name }}</p>
                    <!-- Display other guidance report fields -->

                    <!-- Display appointment details -->
                    @if ($appointment)
                        <hr>
                        <p><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
                        <p><strong>Appointment Time:</strong> {{ $appointment->appointment_time }}</p>
                        <!-- Display other appointment fields -->
                    @else
                        <p>No appointment associated with this report.</p>
                    @endif

                    <!-- Add more details here as needed -->

                    <a href="{{ route('guidance-reports.list') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
