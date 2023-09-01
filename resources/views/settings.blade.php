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
                <h1 class="h2">Settings</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Account Settings</h1>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('update.settings') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="notification_email">Notification Email:</label>
                            <input type="email" id="notification_email" name="notification_email" value="{{ old('notification_email', Auth::user()->notification_email) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="timezone">Timezone:</label>
                            <select id="timezone" name="timezone" class="form-control">
                                @foreach(timezone_identifiers_list() as $timezone)
                                    <option value="{{ $timezone }}" {{ old('timezone', Auth::user()->timezone) === $timezone ? 'selected' : '' }}>{{ $timezone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text_size">Text Size:</label>
                            <select id="text_size" name="text_size" class="form-control">
                                <option value="small" {{ old('text_size', Auth::user()->text_size) === 'small' ? 'selected' : '' }}>Small</option>
                                <option value="medium" {{ old('text_size', Auth::user()->text_size) === 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="large" {{ old('text_size', Auth::user()->text_size) === 'large' ? 'selected' : '' }}>Large</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="enable_notifications" name="enable_notifications" {{ old('enable_notifications', Auth::user()->enable_notifications) ? 'checked' : '' }} class="form-check-input">
                            <label for="enable_notifications" class="form-check-label">Enable Notifications</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('styles')
<style>
    .small-text {
        font-size: 14px;
    }
    
    .medium-text {
        font-size: 16px;
    }
    
    .large-text {
        font-size: 18px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var textSizeSelect = document.getElementById('text_size');
        var contentContainer = document.querySelector('.card-body');

        textSizeSelect.addEventListener('change', function() {
            var selectedValue = this.value;
            contentContainer.classList.remove('small-text', 'medium-text', 'large-text');
            contentContainer.classList.add(selectedValue + '-text');
        });
    });
</script>
@endpush
