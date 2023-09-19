@extends('layouts.app')
@section('content')
            <div><h2 class="text-center">Feedback of Users</h2></div>
            <div class="container-fluid ms-5" >
            @foreach($feedbacks as $feedback)
            <dl>
                
                <dt>{{$feedback->name}}:</dt>
                <dd>{{$feedback->feedback}}</dd>
                
            </dl>
            @endforeach
        </div>
        
@endsection