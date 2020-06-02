@extends('layouts.app')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        
    @endif

    <!-- Default form register -->
    <form class="text-center border border-light p-5" action="{{ route('taller.updateEmpleado', $empleado->id) }}" method="POST">

        {{ csrf_field() }}

        <p class="h4 mb-4">Empleado</p>

        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{ $empleado->nombre }}">
            </div>
            <div class="col">
                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" value="{{ $empleado->apellidos }}">
            </div>
            <div class="col">
                <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" value="{{ $empleado->dni }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="{{ $empleado->direccion }}">
            </div>
            <div class="col">
                <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" value="{{ $empleado->numero }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="codigopostal" id="codigopostal" class="form-control" placeholder="Código postal" value="{{ $empleado->codigopostal }}">
            </div>
            <div class="col">
                <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Localidad" value="{{ $empleado->localidad }}">
            </div>
            <div class="col">
                <input type="text" name="provincia" id="provincia" class="form-control" placeholder="Provincia" value="{{ $empleado->provincia }}">
            </div>
            <div class="col">
                <input type="text" name="pais" id="pais" class="form-control" placeholder="País" value="{{ $empleado->pais }}">
                <input type="hidden" name="taller_id" id="taller_id" class="form-control" value="{{ $empleado->id }}">
            </div>
        </div>

        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Número de teléfono" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="{{ $empleado->telefono }}">

        <!-- Sign up button -->
        <button id="addDatos" class="btn btn-sm my-4 btn-block" type="submit">Modificar</button>


    </form>
    
    <!-- Default form register -->
@endsection