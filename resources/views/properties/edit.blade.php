@extends('layouts/app')

@section('content')
    <div class="container">
        <h2>Modifier {{ $property->title }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="post">
            @csrf

            @method('put')            
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $property->title }}">
                
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') ?? $property->description }}</textarea>
            </div>
            <div>
                <label for="price">Prix</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') ?? $property->price }}">
            </div>
            <div class="form-check">
                <input type="checkbox" name="sold" id="sold" class="form-check-input" value="{{ old('sold', $property->sold) ? 'checked' : '' }}">
                <label for="sold" class="">Vendu ?</label>
            </div>

            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
