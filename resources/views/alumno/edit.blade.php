@extends('app.bootstrap.template')

@section('content')

<form action="{{ route('alumno.update', $alumno->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="espacio">
        <label for="nombre">Nombre:</label>
        <input  class="form-control" minlength="2" maxlength="80" required id="nombre" 
                name="nombre" placeholder="Introduce tu nombre"
                value="{{ old('nombre', $alumno->nombre) }}" type="text">
    </div>

    <div class="espacio">
        <label for="apellidos">Apellidos:</label>
        <input  class="form-control" minlength="3" maxlength="120" required id="apellidos" 
                name="apellidos" placeholder="Introduce tus apellidos"
                value="{{ old('apellidos', $alumno->apellidos) }}" type="text">
    </div>

    <div class="espacio">
        <label for="telefono">Teléfono:</label>
        <input  class="form-control" minlength="3" maxlength="40" required id="telefono" 
                name="telefono" placeholder="Introduce tu teléfono"
                value="{{ old('telefono', $alumno->telefono) }}" type="text">
    </div>

    <div class="espacio">
        <label for="correo">Correo Electrónico:</label>
        <input  class="form-control" minlength="8" required id="correo" 
                name="correo" placeholder="Introduce tu correo electrónico"
                value="{{ old('correo', $alumno->correo) }}" type="text">
    </div>

    <div class="espacio">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input  class="form-control" required id="fecha_nacimiento" 
                name="fecha_nacimiento"
                value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" type="date">
    </div>

    <div class="espacio">
        <label for="nota_media">Nota media:</label>
        <input  class="form-control" step="0.01" min="0" max="10" required id="nota_media" 
                name="nota_media" placeholder="Introduce tu nota media"
                value="{{ old('nota_media', $alumno->nota_media) }}" type="number">
    </div>

    <div class="espacio">
        <label for="experiencia">Experiencia:</label>
        <input  class="form-control" maxlength="200" required id="experiencia" 
                name="experiencia" placeholder="Introduce tu experiencia"
                value="{{ old('experiencia', $alumno->experiencia) }}" type="text">
    </div>

    <div class="espacio">
        <label for="formacion">Formación:</label>
        <input  class="form-control" maxlength="200" required id="formacion" 
                name="formacion" placeholder="Introduce tu formación"
                value="{{ old('formacion', $alumno->formacion) }}" type="text">
    </div>

    <div class="espacio">
        <label for="habilidades">Habilidades:</label>
        <input  class="form-control" maxlength="200" required id="habilidades"
                name="habilidades" placeholder="Introduce tus habilidades"
                value="{{ old('habilidades', $alumno->habilidades) }}" type="text">
    </div>

    <div class="espacio">
        <label for="fotografia">Fotografía:</label>
        <input class="form-control" id="fotografia" name="fotografia" type="file">
        
        {{-- Mostrar foto actual si existe --}}
        @if($alumno->fotografia)
            <br>
            <img src="{{ asset('storage/'.$alumno->fotografia) }}" width="25%">
        @endif
    </div>

    <div class="espacio">
        <input class="btn btn-primary" value="Editar alumno" type="submit">
    </div>

</form>

@endsection
