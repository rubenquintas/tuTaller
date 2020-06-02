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
    <form class="text-center border border-light p-5" action="{{ route('cliente.store') }}" method="POST">

        {{ csrf_field() }}

        <p class="h4 mb-4">Datos personales</p>

        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre') }}">
            </div>
            <div class="col">
                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" value="{{ old('apellidos') }}">
            </div>
            <div class="col">
                <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" value="{{ old('dni') }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="{{ old('direccion') }}">
            </div>
            <div class="col">
                <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" value="{{ old('numero') }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="codigopostal" id="codigopostal" class="form-control" placeholder="Código postal" value="{{ old('codigopostal') }}">
            </div>
            <div class="col">
                <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Localidad" value="{{ old('localidad') }}">
            </div>
            <div class="col">
                <input type="text" name="provincia" id="provincia" class="form-control" placeholder="Provincia" value="{{ old('provincia') }}">
            </div>
            <div class="col">
                <input type="text" name="pais" id="pais" class="form-control" placeholder="País" value="{{ old('pais') }}">
                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
            </div>
        </div>

        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Número de teléfono" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="{{ old('telefono') }}">

        <!-- Sign up button -->
        <button id="addDatos" class="btn btn-sm my-4 btn-block" type="submit">Añadir</button>


    </form>
    <!-- Default form register -->
@endsection