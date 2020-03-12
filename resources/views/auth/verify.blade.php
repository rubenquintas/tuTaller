@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un enlace de verificación a tu email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, revisa el enlace de verificación en tu email.') }}
                    {{ __('Si no has recibido nada en tu email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aquí para enviar otro enlace de verificación.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
