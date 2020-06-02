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
<form class="text-center border border-light p-5" action="{{ route('cliente.updateCita', $cita->id) }}" method="POST">

    {{ csrf_field() }}

    <p class="h4 mb-4">Cita</p>

    <div class="form-row mb-4">
        <div class="col">
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $cita->fecha }}">
        </div>
        <div class="col">
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" value="{{ $cita->telefono }}">
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <input type="hidden" name="cliente_id" id="cliente_id" class="form-control" value="{{ $cita->cliente_id }}">
            <select id="taller_id" class="custom-select mr-sm-2" name="taller_id" value="{{ $cita->taller_id }}" required autocomplete="taller_id">
                <option value="">Elige...</option>
                @foreach ($talleres as $taller)
                    <option value="{{ $taller->id }}">{{ $taller->nombre_fiscal }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Sign up button -->
    <button id="addDatos" class="btn btn-sm my-4 btn-block" type="submit">Añadir</button>


</form>
<!-- Default form register -->
@endsection