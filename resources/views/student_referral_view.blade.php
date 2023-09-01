@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Referral for Student') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('referral.student.add') }}">
                        @csrf

                       
                        
                        <div class="mb-3">
                        <label for="form_id" class="form-label">Form ID</label>
    <input type="text" class="form-control" id="form_id" name="form_id" >
 </div>
 <div class="mb-3">
    <label for="student_name" class="form-label">Student's Name</label>
    <input type="text" class="form-control" id="student_name" name="student_name" required>
    
  
</div>
 <div class="mb-3">
                            <label for="student_lrn" class="form-label">Student's LRN</label>
                            <input type="text" class="form-control" id="studentlrn" name="studentlrn" required>
                        </div>
                            
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason for Referral</label>
                           
    <select class="form-control" id="reason" name="reason" required>
        <optgroup label="Moods/Behaviors">
            <option value="Eating Disorder/body image concern">Eating Disorder/body image concerns</option>
            <option value="Anxious/Worried">Anxious/Worried</option>
            <option value="Depress">Depress/Unhappy</option>
            <option value="Shy/withdrawn">Shy/withdrawn</option>
            <option value="Low-esteem">Low-esteem</option>
            <option value="Aggressive">Aggressive</option>
            <option value="Stealing">Stealing</option>
            <!-- Add other moods/behavior options here -->
        </optgroup>
        <optgroup label="Relationship">
            <option value="Bullying">Bullying</option>
            <option value="Difficulty Making Friends">Difficulty Making Friends</option>
            <option value="Poor Social Skills">Poor Social Skills</option>
            <option value="Problem with Friends">Problem with Friends</option>
            <option value="Boy/Girl Issue">Boy/Girl Issue</option>
            <!-- Add other relationship options here -->
        </optgroup>
        <optgroup label="School Concern">
            <option value="Homework Not Turned In/Not Complete">Homework Not Turned In/Not Complete</option>
            <option value="Low Test/Assignment Grades">Low Test/Assignment Grades</option>
            <!-- Add other school concern options here -->
        </optgroup>
    </select>
</div> @error('reason')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        

                        <div class="mb-3">
                            <label for="state" class="form-label">{{ __('State of Reason') }}</label>
                            <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" required>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="referral_date" class="form-label">{{ __('Referral Date') }}</label>
                            <input id="referral_date" type="date" class="form-control @error('referral_date') is-invalid @enderror" name="referral_date" required>
                            @error('referral_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Referral') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
