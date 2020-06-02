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
    <form class="text-center border border-light p-5" action="{{ route('cliente.storeCoche') }}" method="POST">

        {{ csrf_field() }}

        <p class="h4 mb-4">Coche</p>

        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" value="{{ old('marca') }}">
            </div>
            <div class="col">
                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" value="{{ old('modelo') }}">
            </div>
            <div class="col">
                <input type="text" name="color" id="color" class="form-control" placeholder="Color" value="{{ old('color') }}">
            </div>
            <div class="col">
                <input type="text" name="vin" id="vin" class="form-control" placeholder="VIN" value="{{ old('vin') }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="motor" id="motor" class="form-control" placeholder="Motor" value="{{ old('motor') }}">
            </div>
            <div class="col">
                <input type="text" name="cc" id="cc" class="form-control" placeholder="Cilindrada" value="{{ old('cc') }}">
            </div>
            <div class="col">
                <input type="text" name="cv" id="cv" class="form-control" placeholder="Potencia (CV)" value="{{ old('cv') }}">
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
            </div>
        </div>

        <!-- Sign up button -->
        <button id="addDatos" class="btn btn-sm my-4 btn-block" type="submit">Añadir</button>


    </form>
    <!-- Default form register -->
@endsection