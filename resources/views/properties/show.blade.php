@extends('layouts/app')

@section('content')
    <div class="container">

        <h1>Annonce : {{ $property->title }}</h1>

        <div class="row">

            <div class="col-lg-3">
                <div class="card text-center mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ Str::limit($property->description, 20) }}</p>
                        <div class="d-grid">
                            <a href="#" class="btn btn-primary">Voir l'annonce</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        {{ number_format($property->price) }} €
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
