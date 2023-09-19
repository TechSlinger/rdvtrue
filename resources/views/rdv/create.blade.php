@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Book Appointment with {{ $medecin->name }}</h1>
    <form method="POST" action="{{ route('rdv.store', ['medecin' => $medecin]) }}" id="appointmentForm" novalidate target="_blanck">
        @csrf
        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" id="appointment_date" 
            class="form-control" required>
        </div>
        <div class="form-group">
            <label for="appointment_time">Appointment Time:</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="phonenumber">Your Phone number:</label>
            <input type="text" name="phonenumber" id="phonenumber" class="form-control" required>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <!-- Add more patient input fields if needed -->
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>

<script>
// JavaScript to disable past dates in the appointment_date input
document.addEventListener('DOMContentLoaded', function() {
    const appointmentDateInput = document.getElementById('appointment_date');
    const today = new Date().toISOString().split('T')[0];
    appointmentDateInput.setAttribute('min', today);
});
</script>
@endsection
