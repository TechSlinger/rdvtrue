@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Book Appointment with {{ $medecin->name }}</h1>
    <form method="POST" action="{{ route('rdv.store', ['medecin' => $medecin]) }}" id="appointmentForm">
        @csrf
        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="appointment_time">Appointment Time:</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="user_name">Your Name:</label>
            <input type="text" name="user_name" id="user_name" class="form-control" required>
        </div>
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
