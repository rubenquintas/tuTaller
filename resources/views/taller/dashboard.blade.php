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
                <div class="card-header">Datos fiscales</div>
                <div class="card-body">
                    @if ($talleres->isEmpty())  
                        <a class="btn btn-sm" href="{{ route('taller.create') }}" role="button">Añadir datos fiscales</a>
                    @else
                        @foreach ($talleres as $taller)
                            @if($taller->user_id == Auth::user()->id)
                                <ul>
                                    <ol style="display: none">ID: {{ $taller->id}}</ol>
                                    <ol>Nombre fiscal: {{ $taller->nombre_fiscal}}</ol>
                                    <ol>CIF: {{ $taller->cif}}</ol>
                                    <ol>Direción: {{ $taller->direccion}}</ol>
                                    <ol>Número: {{ $taller->numero}}</ol>
                                    <ol>Código postal: {{ $taller->codigopostal}}</ol>
                                    <ol>Localidad: {{ $taller->localidad}}</ol>
                                    <ol>Provincia: {{ $taller->provincia}}</ol>
                                    <ol>País: {{ $taller->pais}}</ol>
                                    <ol>Teléfono: {{ $taller->telefono}}</ol>
                                    <ol>
                                    <form method="POST" id="delete-form-{{ $taller->id }}" action="{{ route('taller.delete', $taller->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="btn btn-sm" href="{{ route('taller.edit', $taller->id) }}" role="button">Modificar</a>
                                        <button onclick="document.getElementById(delete-form-{{ $taller->id }}).submit()"
                                        class="btn btn-sm" href="{{ route('taller.delete', $taller->id) }}" role="button">Eliminar
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
                <div class="card-header">Empleados
                    <a class="btn btn-sm" href="{{ route('taller.createEmpleado') }}" role="button">Añadir nuevo empleado</a>
                </div>
                <div class="card-body">
                    @foreach ($empleados as $empleado)
                        @if($empleado->taller_id == Auth::user()->id)
                            <ul>
                                <ol style="display: none">ID: {{ $empleado->id}}</ol>
                                <ol>Nombre: {{ $empleado->nombre}}</ol>
                                <ol>Apellidos: {{ $empleado->apellidos}}</ol>
                                <ol>DNI: {{ $empleado->dni}}</ol>
                                <ol>Direción: {{ $empleado->direccion}}</ol>
                                <ol>Número: {{ $empleado->numero}}</ol>
                                <ol>Código postal: {{ $empleado->codigopostal}}</ol>
                                <ol>Localidad: {{ $empleado->localidad}}</ol>
                                <ol>Provincia: {{ $empleado->provincia}}</ol>
                                <ol>País: {{ $empleado->pais}}</ol>
                                <ol>Teléfono: {{ $empleado->telefono}}</ol>
                                <ol>
                                    <form method="POST" id="delete-form-{{ $empleado->id }}" action="{{ route('taller.deleteEmpleado', $empleado->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <a class="btn btn-sm" href="{{ route('taller.editEmpleado', $empleado->id) }}" role="button">Modificar</a>
                                        <button onclick="document.getElementById(delete-form-{{ $empleado->id }}).submit()"
                                            class="btn btn-sm" href="{{ route('taller.deleteEmpleado', $empleado->id) }}" role="button">Eliminar
                                        </button>
                                    </form>
                                </ol>
                            </ul>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">Citas</div>
                <div class="card-body"> 
                        @foreach ($talleres as $taller)
                            @foreach ($citas as $cita)
                                @if($cita->taller_id == $taller->id)
                                    @if($taller->user_id == Auth::user()->id)
                                        <ul>
                                            <ol>Cliente ID: {{ $cita->cliente_id}}</ol>
                                            <ol>Cliente:
                                                @foreach ($clientes as $cliente)
                                                    @if ($cliente->id == $cita->cliente_id)
                                                        {{ $cliente->nombre}}
                                                    @endif
                                                @endforeach
                                            </ol>
                                            <ol>Fecha: {{ $cita->fecha}}</ol>
                                            <ol>Teléfono: {{ $cita->telefono}}</ol>
                                        </ul>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
