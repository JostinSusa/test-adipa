@extends('layouts.app')

@section('title', 'Editar Persona')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('persona.update', $person->id) }}">
            @csrf
            @method('PUT')
            <div class="card my-4">
                <div class="card-header">
                    <h3 class="mb-0">
                        Editar persona
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required
                                value="{{ old('nombre', $person->nombre) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control" required
                                value="{{ old('apellido', $person->apellido) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rut" class="form-label">RUT</label>
                            <input type="text" name="rut" class="form-control" placeholder="12.345.678-K"
                                value="{{ $person->rut }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                            @php
                                $fecha =
                                    old('fecha_nacimiento') ??
                                    ($person->fecha_nacimiento
                                        ? \Carbon\Carbon::parse($person->fecha_nacimiento)->format('Y-m-d')
                                        : '');
                            @endphp
                            <input type="date" name="fecha_nacimiento" class="form-control" required
                                value="{{ old('fecha_nacimiento', $fecha) }}">
                        </div>
                        <div class="col-12">
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
                        </div>
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="{{ route('persona.index') }}" type="button" class="btn btn-secondary">Regresar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
