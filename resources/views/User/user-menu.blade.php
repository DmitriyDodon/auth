@extends('layout')

@section('content')
    <div class="container" align="center">
        <div class="card m-5 py-3" style="width: 18rem;" align="center">
            <h1>{{ $user->name }}</h1>
            <div class="card-body">
                <p>Hello, {{ $user->name }}</p>
                <a href="/logout" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
@endsection
