@extends("layouts.app")

@section("content")
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Product Details</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('storage/images/' . $medecin->image)}}" alt="Product Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3>{{ $medecin->name }}</h3>
                    <p>Price: {{ $medecin->Price }}</p>
                    <p>Description: {{ $medecin->description }}</p>
                    <p>Availability: {{ $medecin->disponibilité }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
