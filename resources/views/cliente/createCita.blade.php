@extends('layouts.app')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @if ($error == 'The cliente id field is required.')
            <div class="alert alert-danger" role="alert">
                "Introduce primero tus datos personales."
            </div>
            @else
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endif
        @endforeach
        
    @endif

    <!-- Default form register -->
    <form class="text-center border border-light p-5" action="{{ route('cliente.storeCita') }}" method="POST">

        {{ csrf_field() }}

        <p class="h4 mb-4">Cita</p>

        <div class="form-row mb-4">
            <div class="col">
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}">
            </div>
            <div class="col">
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" value="{{ old('telefono') }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="hidden" name="cliente_id" id="cliente_id" class="form-control" value="
                @foreach ($clientes as $cliente)
                    @if ($cliente->user_id == Auth::user()->id)
                        {{ $cliente->id }}
                    @endif
                @endforeach
                ">
                <select id="taller_id" class="custom-select mr-sm-2" name="taller_id" value="{{ old('taller_id') }}" required autocomplete="taller_id">
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