@extends('layouts.app')
@section('content')
<form method="post" action="{{ route('adddoctor') }}">
    @csrf
    <br>
    <span >Are you sure you want to join us as a doctor?</span> 
    <button type="submit" name="confirm" class="btn btn-primary">Yes</button>
    <a href="{{ route('home') }}"><button class="btn btn-primary">No</button> </a>
</form>

    
@endsection