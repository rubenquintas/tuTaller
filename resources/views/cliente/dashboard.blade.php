@extends('layouts.app')

@section('content')

@if (session('successMsg'))

    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>
    
@endif

<div class="container">
    <div class="title text-center">
        Bienvenid@ {{ ucfirst(Auth::user()->name) }}
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Datos personales</div>
                <div class="card-body">
                    @if ($clientes->isEmpty())  
                        <a class="btn btn-sm" href="{{ route('cliente.create') }}" role="button">Añadir datos personales</a>
                    @else
                        @foreach ($clientes as $cliente)
                            @if($cliente->user_id == Auth::user()->id)
                                <ul>
                                    <ol style="display: none">ID: {{ $cliente->id}}</ol>
                                    <ol>Nombre: {{ $cliente->nombre}}</ol>
                                    <ol>Apellidos: {{ $cliente->apellidos}}</ol>
                                    <ol>DNI: {{ $cliente->dni}}</ol>
                                    <ol>Direción: {{ $cliente->direccion}}</ol>
                                    <ol>Número: {{ $cliente->numero}}</ol>
                                    <ol>Código postal: {{ $cliente->codigopostal}}</ol>
                                    <ol>Localidad: {{ $cliente->localidad}}</ol>
                                    <ol>Provincia: {{ $cliente->provincia}}</ol>
                                    <ol>País: {{ $cliente->pais}}</ol>
                                    <ol>Teléfono: {{ $cliente->telefono}}</ol>
                                    <ol>
                                        <form method="POST" id="delete-form-{{ $cliente->id }}" action="{{ route('cliente.delete', $cliente->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <a class="btn btn-sm" href="{{ route('cliente.edit', $cliente->id) }}" role="button">Modificar</a>
                                            <button onclick="document.getElementById(delete-form-{{ $cliente->id }}).submit()"
                                                class="btn btn-sm" href="{{ route('cliente.delete', $cliente->id) }}" role="button">Eliminar
                                            </button>
                                        </form>
                                    </ol>
                                </ul>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header">Coches
                    <a class="btn btn-sm" href="{{ route('cliente.createCoche') }}" role="button">Añadir nuevo coche</a>
                </div>
                <div class="card-body" >
                    @foreach ($coches as $coche)
                        @if($coche->cliente_id == Auth::user()->id)
                            <ul>
                                <ol style="display: none">ID: {{ $coche->id}}</ol>
                                <ol>Marca: {{ $coche->marca}}</ol>
                                <ol>Modelo: {{ $coche->modelo}}</ol>
                                <ol>VIN: {{ $coche->vin}}</ol>
                                <ol>Motor: {{ $coche->motor}}</ol>
                                <ol>Cilindrada: {{ $coche->cc}}</ol>
                                <ol>Potencia (CV): {{ $coche->cv}}</ol>
                                <ol>Color: {{ $coche->color}}</ol>
                                <ol>
                                    <form method="POST" id="delete-form-{{ $coche->id }}" action="{{ route('cliente.deleteCoche', $coche->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="btn btn-sm" href="{{ route('cliente.editCoche', $coche->id) }}" role="button">Modificar</a>
                                        <button onclick="document.getElementById(delete-form-{{ $coche->id }}).submit()"
                                            class="btn btn-sm" href="{{ route('cliente.deleteCoche', $coche->id) }}" role="button">Eliminar
                                        </button>
                                    </form>
                                </ol>
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Citas
                    <a class="btn btn-sm" href="{{ route('cliente.createCita') }}" role="button">Añadir nueva cita</a>
                </div>
                <div class="card-body">
                    @foreach ($citas as $cita)
                        @foreach($clientes as $cliente)
                        @if($cita->cliente_id == $cliente->id)
                            <ul>
                                <ol style="display: none">ID: {{ $cita->id}}</ol>
                                <ol>Taller: 
                                    @foreach($talleres as $taller)
                                        @if($taller->id == $cita->taller_id)
                                            {{ $taller->nombre_fiscal }}
                                        @endif
                                    @endforeach
                                </ol>
                                <ol>Fecha: {{ $cita->fecha}}</ol>
                                <ol>Teléfono: {{ $cita->telefono}}</ol>
                                <ol>
                                    <form method="POST" id="delete-form-{{ $cita->id }}" action="{{ route('cliente.deleteCita', $cita->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="btn btn-sm" href="{{ route('cliente.editCita', $cita->id) }}" role="button">Modificar</a>
                                        <button onclick="document.getElementById(delete-form-{{ $cita->id }}).submit()"
                                            class="btn btn-sm" href="{{ route('cliente.deleteCita', $cita->id) }}" role="button">Eliminar
                                        </button>
                                    </form>
                                </ol>
                            </ul>
                        @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
