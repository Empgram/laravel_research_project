@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make Appointment</div>

                <div class="card-body">
                    <p>Appointment for Form ID: {{ $guidanceReport->form_id }}</p>
                    <p>Student Name: {{ $guidanceReport->student_name }}</p>
                    <p>Perpetrator Name: {{ $guidanceReport->perpetrator_name }}</p>
                    <p>Reason: {{ $guidanceReport->reason }}</p>

                    <!-- Add appointment form here -->
                    <form action="{{ route('make-appointment', ['form_id' => $guidanceReport->form_id]) }}" method="POST">
                        @csrf
                        <!-- Add appointment form fields here -->
                        <div class="form-group">
                            <label for="appointment_date">Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="appointment_time">Appointment Time</label>
                            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
