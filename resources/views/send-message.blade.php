@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Send Message to Guardian</div>
        <div class="card-body">
            <form action="{{ route('send-email') }}" method="post">
                @csrf
                <input type="hidden" name="guardian_email" value="{{ $student->guardian_email }}">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
