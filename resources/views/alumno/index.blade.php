@extends('app.bootstrap.template')

@section('content')

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Fecha Nacimiento</th>
            <th>Nota Media</th>
            <th>Experiencia</th>
            <th>Formación</th>
            <th>Habilidades</th>
            <th>Fotografía</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->nota_media }}</td>
                <td>{{ $alumno->experiencia }}</td>
                <td>{{ $alumno->formacion }}</td>
                <td>{{ $alumno->habilidades }}</td>
                <td>
                    @if($alumno->image)
                        <img src="{{ asset('storage/'.$alumno->image) }}" width="70">
                    @else
                        Sin foto
                    @endif
                </td>

                <td>
                    <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-success btn-sm">show</a>
                    <a href="{{ route('alumno.edit', $alumno->id) }}" class="text-white btn btn-warning btn-sm">edit</a>

                    <form action="{{ route('alumno.destroy', $alumno->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que quieres borrar al alumno {{ $alumno->nombre }}?')">
                            delete
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th colspan="5">Número de alumnos:</th>
            <th>{{ count($alumnos) }}</th>
        </tr>
    </tfoot>

</table>

@endsection
