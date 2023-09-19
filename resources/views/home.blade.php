@extends('layouts.app')

@section('content')


    <!-- Add your CSS styling here or link to an external stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

<header class=" text-white text-center ">
    <h1><b>HealthCare</b></h1>


    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="text-center mb-4"><b>Digital Healthcare</b></h2>
                <h3><i>Welcome to our health application, you can book an appointment with your preferred doctor.</i></h3>

                <a href="/doctors" class="btn btn-primary btn-lg d-block mx-auto my-4">Book an Appointment</a>
            </div>
        </div>
        <form action="{{ route('medecins.search') }}" method="post" id="rdv">
            @csrf
            <div class="input-group">
                <input type="search" name="city" class="form-control me-2" placeholder="Enter city...">
                <input type="search" name="speciality" class="form-control me-2 " placeholder="Enter speciality...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>
</header>
<div class="row mt-5">
    <!-- Display search results here -->
    <div class="col-md-8 mx-auto mt-3">
        <div class="row">
            @if (!empty($medecins) && $medecins->count() > 0)
                @foreach($medecins as $medecin)
                <div class="col-md-6 mb-4"> <!-- Make each column half the width of the container -->
                    <div class="medecin-card">
                        <div class="col-md-2 medecin-avatar">
                            @if ($medecin->image)
                                <img src="{{ asset('storage/images/' . $medecin->image) }}" alt="{{ $medecin->name }}" class="img-fluid rounded-circle">
                            @else
                                <div class="avatar-circle">{{ strtoupper(substr($medecin->name, 0, 1)) }}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ $medecin->name }}</h5>
                            <p class="card-text">Speciality: {{ $medecin->speciality }}</p>
                            <p class="card-text">Description: {{ $medecin->description }}</p>
                            <p class="card-text">City: {{ $medecin->city }}</p>
                            <p class="card-text">Address: {{ $medecin->adresse }}</p>
                            <p class="card-text">Phone Number: {{ $medecin->phonenumber }}</p>
                            <p class="card-text">Email : {{ $medecin->email }}</p>
                            <a href="{{ route('rdv.create', $medecin) }}" class="btn btn-info">Book an appointment</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>



    <div class="row mt-5" id="services">
        <!-- Feature cards -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
               <a href="#rdv"><img src="{{ asset('storage/images/image4.avif') }}" class="card-img-top" alt="Find the Right Medecin"></a>
                <div class="card-body">
                    <h3 class="card-title">Find the Right Doctor</h3>
                    <p class="card-text">Search and discover the best doctors in your area with just a few clicks.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="/doctors">
                    <img src="{{ asset('storage/images/image2.avif') }}" class="card-img-top" alt="Book Appointments">
                </a>
                    <div class="card-body">
                    <h3 class="card-title">Book Appointments</h3>
                    <p >Effortlessly book appointments with your preferred doctors through our intuitive application.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="#feedback"><img src="{{ asset('storage/images/image1.avif') }}" class="card-img-top" alt="Get Expert Advice"></a>
                <div class="card-body">
                    <h3 class="card-title">Give Your Feedback</h3>
                    <p class="card-text">Give us your feedback about the application to help us in its improvment.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="feedback">
    <div class="start mt-3 mb-3 text-center d-block  btn bg-primary text-light">write your feedback here</div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('submit.feedback') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="feedback">Your Feedback</label>
            <textarea name="feedback" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </form>
</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>








<!-- Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add this JavaScript code to the end of the body tag or in a separate JS file -->
<!-- Add this JavaScript code to the end of the body tag or in a separate JS file -->

@endsection
