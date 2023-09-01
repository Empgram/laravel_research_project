@extends('layouts.app')

@section('content')
<html lang="en">
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"> </script>
            <link rel="stylesheet" type="text.css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
            <style>
    #name_list:hover {
        color: black;
    }
</style>
    </head>
    <body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Guidance Report</div>

                <div class="card-body">
                    <form action="{{ route('guidance-reports.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                        <label for="form_id" class="form-label">Form ID</label>
    <input type="text" class="form-control" id="form_id" name="form_id" value="{{ $form_id }}" readonly>
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
</div>

<div class="mb-3">
    <label for="perpetrator_name" class="form-label">Perpetrator Name</label>
    <input type="text" class="form-control" id="perpetrator_name" name="perpetrator_name" >
    
    <p id="perpetrator_list" name='perpetrator_list'>
</p>
</div>

<script>
    $(document).ready(function(){
        $("#perpetrator_name").on('keyup',function(){
var values = $(this).val();
$.ajax({
    url:"{{ route('psearch')}}",
    type:"GET",
    datas:{'perpetrator_name':values},
    success:function(datas){
        $("#perpetrator_list").html(datas);
    }
});
       
    });
    $(document).on('click','li',function(){
        var values = $(this).text();
        $("#perpetrator_name").val(values);
        $("#perpetrator_list").html("");

        
    });
});
    </script>
    <div class="mb-3">
                            <label for="student_lrn" class="form-label">Perpetrator LRN</label>
                            <input type="text" class="form-control" id="perpetrator_lrn" name="perpetrator_lrn">
                        </div>
                        <div class="mb-3">
    <label for="student_name" class="form-label">Student's Name</label>
    <input type="text" class="form-control" id="student_name" name="student_name" required>
    
    <p id="name_list" name='name_list'>
</p>
</div>

<script>
    $(document).ready(function(){
        $("#student_name").on('keyup',function(){
var value = $(this).val();
$.ajax({
    url:"{{ route('search')}}",
    type:"GET",
    data:{'student_name':value},
    success:function(data){
        $("#name_list").html(data);
    }
});
       
    });
    $(document).on('click','li',function(){
        var value = $(this).text();
        $("#student_name").val(value);
        $("#name_list").html("");

        
    });
});
    </script>
    <div class="mb-3">
                            <label for="student_lrn" class="form-label">Student's LRN</label>
                            <input type="text" class="form-control" id="student_lrn" name="student_lrn" required>
                        </div>

                        <div class="mb-3">
                            <label for="violation_type" class="form-label">Violation Type</label>
                            <input type="text" class="form-control" id="violation_type" name="violation_type" required>
                        </div>

                       
                       
                        <div class="mb-3">
                            <label for="parent_contacted" class="form-label">Parent Contacted ?</label>
                            <select class="form-control"  id="parent_contacted" name="parent_contacted" required>
                            
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
</select>
</div>


                        <div class="mb-3">
                            <label for="teacher_name" class="form-label">Referred By:</label>
                            <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Name of Faculty/Adviser" required>
                        </div>
                        

                        <div class="mb-3">
                            <label for="date" class="form-label">Refferal Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Report</button>
                        <a href="{{ route('guidance-reports.list') }}" class="btn btn-primary">Back</a> <!-- Add this button -->
               
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>