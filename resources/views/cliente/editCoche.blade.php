@extends('layouts.app')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
        
    @endif

    <!-- Default form register --><form class="text-center border border-light p-5" action="{{ route('cliente.updateCoche', $coche->id) }}" method="POST">

        {{ csrf_field() }}

        <p class="h4 mb-4">Coche</p>

        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" value="{{ $coche->marca }}">
            </div>
            <div class="col">
                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo" value="{{ $coche->modelo }}">
            </div>
            <div class="col">
                <input type="text" name="color" id="color" class="form-control" placeholder="Color" value="{{ $coche->color }}">
            </div>
            <div class="col">
                <input type="text" name="vin" id="vin" class="form-control" placeholder="VIN" value="{{ $coche->vin }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="motor" id="motor" class="form-control" placeholder="Motor" value="{{ $coche->motor }}">
            </div>
            <div class="col">
                <input type="text" name="cc" id="cc" class="form-control" placeholder="Cilindrada" value="{{ $coche->cc }}">
            </div>
            <div class="col">
                <input type="text" name="cv" id="cv" class="form-control" placeholder="Potencia (CV)" value="{{ $coche->cv }}">
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col">
                <input type="hidden" name="cliente_id" id="cliente_id" class="form-control" value="{{ $coche->cliente_id }}">
            </div>
        </div>

        <!-- Sign up button -->
        <button id="addDatos" class="btn btn-sm my-4 btn-block" type="submit">Modificar</button>

    </form>
    
    <!-- Default form register -->
@endsection