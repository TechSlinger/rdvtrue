@extends('layouts.app')

@section('content')
<h1>Appointment Informations</h1>

<div>
    <p class="info-alert">You will be contacted by your doctor via phone to confirm this appointment</p>
    <h2>Appointment Details</h2>
    <p>Date: {{ $rdv->appointment_date }}</p>
    <p>Time: {{ $rdv->appointment_time }}</p>
    <p>Phone number: {{ $rdv->phonenumber }}</p>
   
    
</div>
@endsection


