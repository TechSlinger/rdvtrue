@extends('layouts.app')

@section('content')


    <!-- Add your CSS styling here or link to an external stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom CSS styles for the home page here */
        nav{
            background-color: #01c4ff;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3f6b69;
            color: #fff;
            text-align: center;
            padding: 50px 0;
            margin-top: -30px;
           
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            text-align: center;
        }

        .main-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            font-size: 20px;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .feature-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 60px;
        }

        .feature-section .feature {
            flex: 0 0 30%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .feature-section .feature h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .feature-section .feature p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        footer {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
       

        .quote-text {
            font-size: 24px;
            font-style: italic;
            text-align: center;
        }

        .quote-author {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
    </style>

<header class=" text-white text-center ">
    <h1><b>HealthCare</b></h1>


    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="text-center mb-4"><b>Digital Healthcare</b></h2>
              
                    <p class="quote-text">"Health is the greatest gift, contentment the greatest wealth, faithfulness the best relationship."</p>
                    <p class="quote-author"> Buddha</p>
                <a href="/rdv/create" class="btn btn-primary btn-lg d-block mx-auto my-4">Book an Appointment</a>
            </div>
        </div>
        <form action="{{ route('medecins.search') }}" method="post">
            @csrf
            <div class="input-group">
                <input type="text" name="city" class="form-control me-2" placeholder="Enter city...">
                <input type="text" name="speciality" class="form-control me-2 " placeholder="Enter speciality...">
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
        @if (!empty($medecins) && $medecins->count() > 0)
            @foreach ($medecins as $medecin)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $medecin->name }}</h5>
                        <p class="card-text">City: {{ $medecin->city }}</p>
                        <p class="card-text">Phone Number: {{ $medecin->phonenumber }}</p>
                        <p class="card-text">Speciality: {{ $medecin->speciality }}</p>
                        <p class="card-text">Address: {{ $medecin->adresse }}</p>
                    </div>
                </div>
            @endforeach
       
     
        @endif
    </div>
</div>


   <!-- Image carousel -->
<div id="imageCarousel" class="carousel slide" data-ride="carousel">
    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($images as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/images/' . $image) }}" class="d-block w-100" alt="Random Image">
                </div>
            @endforeach
        </div>
    </div>
    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

</div>

    <div class="row mt-5">
        <!-- Feature cards -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/images/medecin.png') }}" class="card-img-top" alt="Find the Right Medecin">
                <div class="card-body">
                    <h3 class="card-title">Find the Right Medecin</h3>
                    <p class="card-text">Search and discover the best medecins in your area with just a few clicks.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book Appointments">
                <div class="card-body">
                    <h3 class="card-title">Book Appointments</h3>
                    <p class="card-text">Effortlessly book appointments with your preferred medecins through our intuitive platform.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Get Expert Advice">
                <div class="card-body">
                    <h3 class="card-title">Get Expert Advice</h3>
                    <p class="card-text">Receive expert medical advice and guidance from experienced medecins.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="start mt-3 mb-3 text-center d-block  btn bg-dark text-light">write your feedback here</div>
<div class="newfeedback">
    <form id="feedbackForm" method="post">
        @csrf
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Your name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Enter yor Comment</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
            <input type="submit" class="btn btn-info text-black" value="send">
        </div>
    </form>
</div>

<div class="start mt-3 mb-3 text-center d-block  btn bg-dark text-light">Feedback Submissions</div>

<div class="container">
    <ul id="feedbackList"></ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    // Handle form submission
    document.getElementById("feedbackForm").addEventListener("submit", function(event) {
        event.preventDefault();
        // Get the values from the form inputs
        const name = document.getElementById("exampleFormControlInput1").value;
        const feedback = document.getElementById("exampleFormControlTextarea1").value;

        // Create a new list item to display the feedback
        const feedbackList = document.getElementById("feedbackList");
        const listItem = document.createElement("li");
        listItem.innerHTML = `<strong>Name:</strong> ${name}<br><strong>Feedback:</strong> ${feedback}`;

        // Append the list item to the feedback list
        feedbackList.appendChild(listItem);

        // Clear the form inputs
        document.getElementById("exampleFormControlInput1").value = "";
        document.getElementById("exampleFormControlTextarea1").value = "";
    });
</script>

 <script>
    // Handle form submission
    document.getElementById("feedbackForm").addEventListener("submit", function(event) {
        event.preventDefault();
        // Perform any AJAX request or form handling here
        // For example, you can use jQuery's AJAX method or fetch API to submit the form data to the server.
    });
</script>

 <div class="row mt-5">
    <!-- Display search results here -->
   
</div>

<footer class="bg-dark text-white text-center py-4">
    <p>&copy; 2023 HealthCare. All rights reserved.</p>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-4">
            Social Media <br>
            <a href="www.linkedin.com">linkedin</a>
        <br>
            <a href="www.facebook.com">facebook</a><br>
            <a href="www.instagram.com">Instagram</a>
        </div>
        <div class="col-8">
            Contact us :
            <a href="mailto:admin@gmail.com">send us an email</a><br>
            Email :
            admin@gmail.com <br>
            phonenumber:  0626736152
        </div>
    </div>
    
</footer>

<!-- Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add this JavaScript code to the end of the body tag or in a separate JS file -->
<!-- Add this JavaScript code to the end of the body tag or in a separate JS file -->

@endsection
