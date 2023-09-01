@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
           <button style="background-color:white;width:80px;" onclick=""> <a href="{{ route('email.form') }}" >New Message</a> </button><!-- Add this button -->
              
                <div class="card-header">Messages</div>

                <div class="card-body">
                    @foreach($messages as $message)
                        <div class="card-header">
                            <<<pa>{{$message -> recipient_email}}</pa>>>;
                            <pa>{{$message-> created_at}}</pa>
                            <p>{{$message->body }}</p>

                            </div>
                    @endforeach
                </div>
               
                  <a href="{{ route('home') }}" class="btn btn-primary">Back</a> <!-- Add this button -->
               
            </div>
        </div>
    </div>
</div>
@endsection
