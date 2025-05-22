@extends('layouts.app')

@section('title', 'Registrar Persona')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('persona.store') }}">
            @csrf
            <div class="card my-4">
                <div class="card-header">
                    <h3 class="mb-0 section-title">
                        Crear persona
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" name="apellido" class="form-control" required
                                value="{{ old('apellido') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rut" class="form-label">RUT</label>
                            <input type="text" name="rut" id="rut" class="form-control"
                                placeholder="12345678-K" required value="{{ old('rut') }}">
                            <small id="rut-msg" class="text-danger d-none">RUT inválido</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control" required
                                value="{{ old('fecha_nacimiento') }}">
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
                            <button type="submit" class="btn btn-success" id="submit-btn">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const rutInput = document.querySelector('#rut');
    const msg = document.querySelector('#rut-msg');
    const btn = document.querySelector('#submit-btn');

    rutInput.addEventListener('keyup', function () {
        const valido = validarRUT(rutInput.value);

        if (!valido && rutInput.value.length > 0) {
            msg.classList.remove('d-none');
            btn.setAttribute('disabled', true)
        } else {
            msg.classList.add('d-none');
            btn.removeAttribute('disabled')
        }
    });

    function validarRUT(rutCompleto) {
        rutCompleto = rutCompleto.replaceAll('.', '').replace('-', '');
        if (rutCompleto.length < 2) return false;

        const cuerpo = rutCompleto.slice(0, -1);
        let dv = rutCompleto.slice(-1).toUpperCase();

        let suma = 0;
        let multiplo = 2;

        for (let i = cuerpo.length - 1; i >= 0; i--) {
            suma += parseInt(cuerpo[i]) * multiplo;
            multiplo = multiplo < 7 ? multiplo + 1 : 2;
        }

        let dvEsperado = 11 - (suma % 11);
        dvEsperado = dvEsperado === 11 ? '0' : dvEsperado === 10 ? 'K' : dvEsperado.toString();

        return dv === dvEsperado;
    }
});
</script>
