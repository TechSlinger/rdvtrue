@extends('layouts.app')

@section('content')
<div>
    <form method="post" action="{{ route('confirm', ['rdv' => $rdv]) }}">
        @csrf
        <button type="submit">Confirm</button>
    </form>
    
    
</div>

@endsection
