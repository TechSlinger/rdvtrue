@extends('layouts.app')

@section('content')
<h1>Confirmed Appointments</h1>

<div>
    <h2>Appointment Details</h2>
    <p>Date: {{ $rdv->appointment_date }}</p>
    <p>Time: {{ $rdv->appointment_time }}</p>
    @if (!$rdv->confirmed)
        <form method="post" action="{{ route('confirm', ['rdv' => $rdv]) }}">
            @csrf
            <button type="submit">Confirm Appointment</button>
        </form>
    @else
        Appointment Confirmed
    @endif
</div>
@endsection
