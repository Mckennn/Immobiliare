{{-- On va étendre le fichier resources/view/layouts/app.blade.php --}}
@extends('layouts/app')

{{-- On met le contenu suivant dans le yield content --}}
@section('content')
   <h1>Hello {{$name}}</h1>

    <ul>
        @foreach ($bibis as $bibi)
            <li>
                {{-- @dump($loop) --}}
                {{ $loop->index }} {{ $bibi }}
            </li>
        @endforeach
    </ul>

    <h2>Blade simplifie le PHP</h2>
    <?php echo date('d/m/Y'); ?>
    {{ date('d/m/Y') }}

    <h2>If en Blade</h2>
    @if (1 === 1)
        Je suis un if
    @endif

    <h2>Boucle en Blade</h2>
    @for ($i = 0; $i < 10; $i++)
        {{ $i }}
    @endfor

    <h2>Protection XSS en Blade</h2>
    {{ '<script>alert("toto")</script>' }}
    {!! '<h1>Pas de protection XSS<h1>' !!}
@endsection