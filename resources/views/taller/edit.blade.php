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
    <form class="text-center border border-light p-5" action="{{ route('taller.update', $taller->id) }}" method="POST">

        {{ csrf_field() }}

        <p class="h4 mb-4">Datos personales</p>

        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="nombre_fiscal" id="nombre_fiscal" class="form-control" placeholder="Nombre fiscal" value="{{ $taller->nombre_fiscal }}">
            </div>
            <div class="col">
                <input type="text" name="cif" id="cif" class="form-control" placeholder="CIF" value="{{ $taller->cif }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" value="{{ $taller->direccion }}">
            </div>
            <div class="col">
                <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" value="{{ $taller->numero }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="codigopostal" id="codigopostal" class="form-control" placeholder="Código postal" value="{{ $taller->codigopostal }}">
            </div>
            <div class="col">
                <input type="text" name="localidad" id="localidad" class="form-control" placeholder="Localidad" value="{{ $taller->localidad }}">
            </div>
            <div class="col">
                <input type="text" name="provincia" id="provincia" class="form-control" placeholder="Provincia" value="{{ $taller->provincia }}">
            </div>
            <div class="col">
                <input type="text" name="pais" id="pais" class="form-control" placeholder="País" value="{{ $taller->pais }}">
                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ $taller->user_id }}">
            </div>
        </div>

        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Número de teléfono" aria-describedby="defaultRegisterFormPhoneHelpBlock" value="{{ $taller->telefono }}">

        <!-- Sign up button -->
        <button id="addDatos" class="btn btn-sm my-4 btn-block" type="submit">Modificar</button>


    </form>
    <!-- Default form register -->
@endsection