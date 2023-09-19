@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4 doctor-color" >Our Practitioner for Our Best Clients</h2>
            <div class="row">
                @foreach($medecins as $medecin)
                <div class="col-md-6">
                    <div class="medecin-card">
                        <div class="medecin-avatar">
                            @if ($medecin->image)
                            <img src="{{ asset('storage/images/' . $medecin->image) }}" alt="{{ $medecin->name }}" class="img-fluid rounded-circle">
                            @else
                            <div class="avatar-circle">{{ strtoupper(substr($medecin->name, 0, 1)) }}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="card-title mb-3"><h3>{{ ($medecin->name) }}</h3></div>
                            <p class="card-text">Speciality: {{ $medecin->speciality }}</p>
                            <p class="card-text">Description: {{ $medecin->description }}</p>
                            <p class="card-text">City: {{ $medecin->city }}</p>
                            <p class="card-text">Address: {{ $medecin->adresse }}</p>
                            <p class="card-text">Phone Number: {{ $medecin->phonenumber }}</p>
                            <p class="card-text">Email : {{ $medecin->email }}</p>
                            
                            <a href="{{ route('rdv.create', $medecin) }}"><button class="btn btn-info">Book an appointment</button> </a>
                            <a href="{{ route('medecins.show', $medecin->id) }}" class="btn btn-info">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {!! $medecins->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
