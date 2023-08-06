@extends('layouts.app')

@section('content')
<style>
    .avatar-circle {
        width: 50px;
        height: 50px;
        background-color: #007bff;
        color: #fff;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
    }
    
    .medecin-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #e6e6e6;
        border-radius: 8px;
        margin-bottom: 20px;
        padding: 20px;
        display: flex;
        align-items: center;
    }

    .medecin-avatar {
        flex: 0 0 100px;
        height: 100px;
        margin-right: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Our Medecins for Our Best Clients</h2>
            <div class="row">
                @foreach($medecins as $medecin)
                <div class="col-md-6">
                    <div class="medecin-card">
                        <div class="medecin-avatar">
                            @if ($medecin->image)
                            <img src="{{ asset('storage/app/public/images/' . $medecin->image) }}" alt="{{ $medecin->name }}" class="img-fluid rounded-circle">
                            @else
                            <div class="avatar-circle">{{ strtoupper(substr($medecin->name, 0, 1)) }}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $medecin->name }}</h5>
                            <p class="card-text">Speciality: {{ $medecin->speciality }}</p>
                            <p class="card-text"> {{ $medecin->description }}</p>
                            <p class="card-text">City: {{ $medecin->city }}</p>
                            <p class="card-text">Address: {{ $medecin->adresse }}</p>
                            <p class="card-text">Phone Number: {{ $medecin->phonenumber }}</p>
                            <a href="{{ route('rdv.create', $medecin) }}">prendre un rdv</a>
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
