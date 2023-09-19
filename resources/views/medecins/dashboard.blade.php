@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if (!$rdvs->count() > 0)
        <div class="alert alert-info">
            <h4>Thank you for your registration. You are now one of our practitioners.</h4>
            <p>If a patient books an appointment with you, you will find it listed here.</p>
        </div>
    @else
        <h2>Patient Appointments</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Patient Name</th>
                    <th>Patient Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rdvs as $rdv)
                    <tr>
                        <td>{{ $rdv->appointment_date }}</td>
                        <td>{{ $rdv->appointment_time }}</td>
                        <td>{{ $rdv->user->name }}</td>
                        <td>{{ $rdv->phonenumber }}</td>
                        <td>
                            <form method="POST" action="{{ route('rdv.destroy', $rdv->id) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
