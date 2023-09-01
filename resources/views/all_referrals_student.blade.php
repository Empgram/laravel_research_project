@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-2 col-lg-1 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <!-- Hide Button -->
                <button class="btn btn-primary d-md-none" id="hideSidebar">Hide Sidebar</button>
                
                <ul class="nav flex-column">
                <li class="nav-item">
                        <span class="nav-link" style="display: inline-block; background-color: #ff6600; color: #fff; padding: 8px 12px; border-radius: 5px; font-weight: bold; margin-left: 10px;">
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" style="width: 60px; height: 60px; border-radius: 50%; margin-right: 10px;">
                            {{ Auth::user()->name }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="bi bi-person"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            <i class="bi bi-house-door"></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#referralSubMenu">
        <i class="bi bi-gear"></i>
        Referral
    </a>
    <div class="collapse" id="referralSubMenu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('guidance-reports.list') }}">
                    Teacher
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('referrals.all') }}">
                    Student
                </a>
            </li>
</div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.list') }}">
                            <i class="bi bi-person-plus"></i>
                            Register Student
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view-all-appointments') }}">
                            <i class="bi bi-calendar"></i>
                            Appointments
                        </a>
                    </li>
                    <!-- Add more dashboard items here -->
                </ul>
                <!-- Open Button (Initially hidden) -->
                <button class="btn btn-primary d-none" id="openSidebar">Open Sidebar</button>
            </div>
        </nav>


        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container">
                <h1>All Student Referrals</h1>

            
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Student LRN</th>
                                <th>Form ID</th>
                                <th>Reason</th>
                                <th>State</th>
                                <th>Referral Date</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($referrals as $referral)
                                <tr>
                                    <td>{{ $referral->id }}</td>
                                    <td>{{ $referral->student_name }}</td>
                                    <td>{{ $referral->studentlrn }}</td>
                                    <td>{{ $referral->form_id }}</td>
                                    <td>{{ $referral->reason }}</td>
                                    <td>{{ $referral->state }}</td>
                                    <td>{{ $referral->referral_date }}</td>
                                    <td>{{ $referral->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
            </div>
            <div class="card-body">
                            <br>
                            <a href="{{ route('student-referral.create') }}" class="btn btn-primary">Add Referral</a>
                        </div>
        </main>
        
    </div>
</div>
@endsection
