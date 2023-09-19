@extends("layouts.app")

@section("content")
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    <div>
      <a  class="btn btn-primary mb-3 mt-2" href="{{route('medecins.create')}}" >Add new Doctor</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <caption>All doctors</caption>
            <thead class="table-light">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>image</th>
                    <th>speciality</th>
                    <th>city</th>
                    <th>adresse</th>
                    <th>phonenumber</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-devider">
                @foreach($medecins as $medecin)
                <tr>
                    <td>{{ $medecin->id }}</td>
                    <td>{{ $medecin->name }}</td>
                    <td>
                        <div class="col-md-2 medecin-avatar">
                            @if ($medecin->image)
                                <img src="{{ asset('storage/images/' . $medecin->image) }}" alt="{{ $medecin->name }}" class="img-fluid rounded-circle">
                            @else
                                <div class="avatar-circle">{{ strtoupper(substr($medecin->name, 0, 1)) }}</div>
                            @endif
                        </div>
                    </td>
                    <td>{{ $medecin->speciality }}</td>
                    <td>{{ $medecin->city }}</td>
                    <td>{{ $medecin->adresse }}</td>
                    <td>{{ $medecin->phonenumber }}</td>
                    <td>{{ $medecin->description }}</td>
                    <td>
                        <form method="POST" action="{{ route('medecins.destroy', $medecin->id) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            <a class="btn btn-primary" href="{{ route('medecins.edit', $medecin->id) }}">Edit</a>
                            <a class="btn btn-info" href="{{ route('medecins.show', $medecin->id) }}">Show</a>            
                            </form>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $medecins->links() !!}
    </div>
</div>
@endsection
