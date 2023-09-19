@extends("layouts.app")
@section("content")

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Practitioner Details</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 medecin-avatar">
                    <br><br>
                    @if ($medecin->image)
                    <img src="{{ asset('storage/images/' . $medecin->image) }}" alt="{{ $medecin->name }}" class="img-fluid rounded-circle">
                    @else
                    <div class="avatar-circle">{{ strtoupper(substr($medecin->name, 0, 1)) }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5 class="card-title mb-2">{{ $medecin->name }}</h5>
                    <p class="card-text">Speciality: {{ $medecin->speciality }}</p>
                    <p class="card-text">Description: {{ $medecin->description }}</p>
                    <p class="card-text">City: {{ $medecin->city }}</p>
                    <p class="card-text">Address: {{ $medecin->adresse }}</p>
                    <p class="card-text">Phone Number: {{ $medecin->phonenumber }}</p>
                    <p class="card-text">Email: {{ $medecin->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
