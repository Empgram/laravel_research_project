@extends('layouts.app')

@section('head')
    <!-- Your jQuery and script for sidebar toggle -->
@endsection

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
        <main class="col-md-10 ms-sm-auto col-lg-10 px-md-10">
            <div class="row justify-content-center mt-10">
                <div class="col-md-15">
                    <div class="card">
                        <div class="card-header">Student Data</div>
                        <br>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-20">
                                    <div class="card">
                                       
                                        <div class="card-body">
                                            <form action="{{ route('student.list') }}" method="GET">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by LRN, Name, or Section" aria-label="Search" aria-describedby="search-button">
                                                    <button class="btn btn-outline-secondary" type="submit" id="search-button">Search</button>
                                                </div>
                                            </form>
                                            <div class="table-scroll">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Student LRN</th>
                                                            <th>Student Name</th>
                                                            <th>Section</th>
                                                            <th>Guardian Name</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($filteredStudents && count($filteredStudents) > 0)
                                                            @foreach ($filteredStudents as $student)
                                                                <tr>
                                                                    <td>{{ $student->student_lrn }}</td>
                                                                    <td>{{ $student->student_name }}</td>
                                                                    <td>{{ $student->section }}</td>
                                                                    <td>{{ $student->guardian_name }}</td>
                                                                    <td>
                                                                        <a href="{{ route('student.show', ['student_lrn' => $student->student_lrn]) }}" class="btn btn-primary">View</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="5">No students found.</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('student.create') }}" class="btn btn-primary">Register Student</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

<style>
    .table-scroll {
        max-height: 300px; /* Set the desired maximum height for the scrollable area */
        overflow-y: auto; /* Enable vertical scrolling when content overflows */
    }
</style>
