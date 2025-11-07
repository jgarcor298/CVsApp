@extends('app.bootstrap.template')

@section('content')
<main class="px-3">

    <h1>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1>

    {{-- Foto del alumno (si existe) --}}
    <p class="lead">
        @if($alumno->fotografia)
            <img src="{{ route('fotografia.fotografia', $alumno->id) }}" width="150">
        @else
            <span class="text-muted">Sin fotografía</span>
        @endif
    </p>

     @if($alumno->isPdf())
    <p class="lead">
        <a href="{{ $alumno->getPdf() }}" target="pdf">PDF</a>
    </p>
    @endif

    <p class="lead">
        <strong>Correo:</strong> {{ $alumno->correo }}
    </p>

    <p class="lead">
        <strong>Teléfono:</strong> {{ $alumno->telefono }}
    </p>

    <p class="lead">
        <strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento }}
    </p>

    <p class="lead">
        <strong>Nota media:</strong> {{ $alumno->nota_media }}
    </p>

    <p class="lead">
        <strong>Experiencia:</strong> {{ $alumno->experiencia }}
    </p>

    <p class="lead">
        <strong>Formación:</strong> {{ $alumno->formacion }}
    </p>

    <p class="lead">
        <strong>Habilidades:</strong> {{ $alumno->habilidades }}
    </p>

    <p class="lead">
        <a href="{{ route('alumno.index') }}" class="btn btn-lg btn-light fw-bold border-white bg-white">
            Volver al listado
        </a>
    </p>

</main>
@endsection
