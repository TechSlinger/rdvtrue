@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Medecin</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('medecins.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>

                            <div class="form-group">
                                <label for="price">Speciality</label>
                                <input type="string" class="form-control" id="price" name="speciality"  >
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">City</label>
                                <textarea class="form-control" id="description" name="city" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Adresse</label>
                                <textarea class="form-control" id="description" name="adresse" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Phonenumber</label>
                                <textarea class="form-control" id="description" name="phonenumber" ></textarea>
                            </div>

                            <div classclass="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" >
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
