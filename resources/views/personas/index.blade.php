@extends('layouts.app')

@section('title', 'Registrar Persona')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="section-title">Listado de Personas</h2>
            <a href="{{ route('persona.create') }}" class="btn btn-success">Registrar
                Persona</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Se encontraron errores:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($people->isEmpty())
            <div class="alert alert-warning">No hay registros aún.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>RUT</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->nombre }}</td>
                            <td>{{ $person->apellido }}</td>
                            <td>{{ $person->rut }}</td>
                            <td>{{ \Carbon\Carbon::parse($person->fecha_nacimiento)->format('Y-m-d') }}</td>

                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('persona.edit', $person->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('persona.destroy', $person->id) }}" method="POST"
                                        style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar esta persona?')">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
