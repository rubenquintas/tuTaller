@extends('layouts.app')

@section('content')

@if (session('successMsg'))

    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>
    
@endif

<div class="container">
    <div class="title text-center">
        Bienvenido {{ Auth::user()->name }}
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Datos personales</div>
                <div class="card-body">

                    @foreach ($talleres as $taller)

                        {{-- @if (Auth::user()->id == $taller->user_id) --}}
                            <ul>
                                <ol>Nombre fiscal: {{ $taller->nombre_fiscal}}</ol>
                                <ol>CIF: {{ $taller->cif}}</ol>
                                <ol>Direción: {{ $taller->direccion}}</ol>
                                <ol>Número: {{ $taller->numero}}</ol>
                                <ol>Código postal: {{ $taller->codigopostal}}</ol>
                                <ol>Localidad: {{ $taller->localidad}}</ol>
                                <ol>Provincia: {{ $taller->provincia}}</ol>
                                <ol>País: {{ $taller->pais}}</ol>
                                <ol>Teléfono: {{ $taller->telefono}}</ol>
                                <ol><a class="btn btn-secondary" href="{{ route('taller.edit', $taller->id) }}" role="button">Modificar</a></ol>
                            </ul>
                        {{-- @endif --}}
                        
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
