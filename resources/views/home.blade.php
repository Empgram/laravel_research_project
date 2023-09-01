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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Home</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Welcome to User Dashboard</h1>
                    <!-- Display user profile information here -->
                    <a href="{{ route('guidance-reports.create') }}" class="btn btn-primary">Add Referral</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Total Guidance Reports</div>
                        <div class="card-body">
                            <p>Total: {{ $totalGuidanceReports }}</p>
                            <!-- You can add more information or links here -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Total Registered Students</div>
                        <div class="card-body">
                            <p>Total: {{ $totalRegisteredStudents }}</p>
                            <!-- You can add more information or links here -->
                        </div>
                    </div>
                </div>
                <br>
                <br><p></p>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Total Appointments</div>
                        <div class="card-body">
                            <br>
                            <p>Total: {{ $total}}</p>
                            <!-- You can add more information or links here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="col-md-3 col-lg-2 d-md-block bg-light">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const hideButton = $("#hideSidebar");
        const openButton = $("#openSidebar");
        const sidebar = $("#sidebar");

        hideButton.click(function () {
            sidebar.addClass("d-none");
            openButton.removeClass("d-none");
        });

        openButton.click(function () {
            sidebar.removeClass("d-none");
            openButton.addClass("d-none");
        });
    });
</script>

@endsection
