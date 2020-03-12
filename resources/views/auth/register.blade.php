@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Añadido de tipo de cuenta del usuario -->

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de cuenta') }}</label>

                            <div class="col-md-6">
                                <select id="role_id" class="custom-select mr-sm-2 @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}" required autocomplete="role_id">
                                    <option value="">Elige...</option>
                                    <option value="1">Cliente</option>
                                    <option value="2">Taller</option>
                                    <option value="3">Concesionario</option>
                                    <option value="4">Compraventa</option>
                                    <option value="5">Recambios</option>
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- El añadido del tipo de usuario termina aquí -->

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="checkbox" name="lopd" id="lopd" value="1">

                                    <label class="form-check-label" for="lopd">
                                        Estoy de acuerdo con <a href="" data-toggle="modal" data-target="#exampleModalLong">LOPD</a>
                                    </label>
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                LA (VUESTRA EMPRESA) está especialmente sensibilizada en la protección de los datos de los USUARIOS de los servicios a los que se accede a través de su web. Mediante la presente Política de Privacidad (en adelante , la Política) LA (VUESTRA EMPRESA) informa a los USUARIOS del sitio web: (VUESTROS DATOS)del tratamiento y usos a los que se someten los datos de carácter personal que se recaban en la web, con el fin de que decidan, libre y voluntariamente, si desean facilitar la información solicitada.

                                                LA (VUESTRA EMPRESA) se reserva la facultad de modificar esta Política con el objeto de adaptarla a novedades legislativas, criterios jurisprudenciales, prácticas del sector, o intereses de la entidad. Cualquier modificación en la misma será anunciada con la debida antelación, a fin de que tengas perfecto conocimiento de su contenido.
                                                
                                                Ciertos servicios prestados en el portal pueden contener condiciones particulares con previsiones en materia de protección de Datos Personales. De ellos puedes informarte en los correspondientes apartados.
                                                
                                                TITULARIDAD DEL TRATAMIENTO
                                                En dichos supuestos, los datos recabados por LA (VUESTRA EMPRESA) serán incorporados a ficheros titularidad de LA (VUESTRA EMPRESA) , debidamente inscritos en el Registro General de Protección de Datos.
                                                
                                                USOS Y FINALIDADES
                                                La finalidad de la recogida y tratamiento de los datos personales es la gestión, prestación y personalización de los servicios y contenidos del mismo que el USUARIO utilice y de la cual se informará en cada apartado.
                                                
                                                COMUNICACIÓN DE LOS DATOS
                                                Los datos recabados a través de la web sólo serán cedidos en aquellos casos en que expresamente se informe de ello al USUARIO.
                                                
                                                ACTUALIZACIÓN DE LOS DATOS
                                                Con el fin de que los datos obrantes en nuestras bases de datos siempre correspondan a tu situación real deberás mantenerlos actualizados, bien actualizándolos tú directamente en los caso en que ello sea posible bien comunicándolo al departamento correspondiente.
                                                
                                                UTILIZACIÓN DE COOKIES
                                                Con el objeto de proteger la intimidad de los usuarios de su página web LA (VUESTRA EMPRESA) no emplea cookies cuando los mismos navegan por la misma.
                                                
                                                SEGURIDAD DE LOS DATOS
                                                LA (VUESTRA EMPRESA) ha adoptado en su sistema de información las medidas técnicas y organizativas legalmente requeridas, a fin de garantizar la seguridad y confidencialidad de los datos almacenados, evitando así, en la medida de lo posible, su alteración, pérdida, tratamiento o acceso no autorizado.
                                                
                                                DERECHOS DE LOS USUARIOS
                                                En todo caso podrás acceder a tus datos, rectificarlos, cancelarlos y en su caso, oponerte a su tratamiento:
                                                a) bien mediante solicitud acompañada de una fotocopia de tu D.N.I., remitida a la siguiente dirección postal: LA (VUESTRA EMPRESA) . X(VUESTROS DATOS)X, C.P. X (VUESTROS DATOS)X - X(VUESTROS DATOS)X
                                                b) bien mandando un e-mail a la siguiente dirección de correo electrónico: X(VUESTROS DATOS)X
                                                
                                                 
                                                
                                                Mas información en la Agencia Española de Protección de Datos:
                                                
                                                <a href="http://www.agpd.es/portalwebAGPD/index-ides-idphp.php">
                                                    http://www.agpd.es/portalwebAGPD/index-ides-idphp.php
                                                </a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
