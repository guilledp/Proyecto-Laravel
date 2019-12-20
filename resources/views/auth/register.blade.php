@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link @if(old('es_empresa')==1) active @endif" href="#registro_empresa">Como Empresa</a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if(old('es_empresa')==0) active @endif" href="#registro_usuario">Como Usuario</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content border mb-3">

  <div id="registro_empresa" class="tab-pane fade @if(old('es_empresa')==1) show active @endif "><br>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                    <!-- TRUQUITO -->
                    <input id="es_empresa" type="hidden" name="es_empresa" value="1">
                    <!-- TRUQUITO -->

{{-- CODIGO EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="codigo_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="codigo_empresa" maxlength="6" type="text" class="form-control" name="codigo_empresa" value="{{ old('codigo_empresa') }}" autocomplete="empresa" readonly="" placeholder="Se asignara automaticamente">

                            </div>
                        </div>
{{-- CODIGO EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- NOMBRE EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}" autocomplete="empresa" required="" placeholder="Razón Social / Nombre de fantasía">

                                @error('empresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- NOMBRE EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- CUIT EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>

                            <div class="col-md-6">
                                <input id="cuit" type="string" maxlength="11" pattern="\d+" minlength="11" class="form-control @error('cuit') is-invalid @enderror" name="cuit" value="{{ old('cuit') }}" autocomplete="cuit" required="" placeholder="Solo números">

                                @error('cuit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- CUIT EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- EMAIL +++++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email@suempresa.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- EMAIL ++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- PASSWORD +++++++++++++++++++++++++++++++++++++++++++++++ --}}
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
{{-- PASSWORD +++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- PASSWORD2 ++++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
{{-- PASSWORD2 ++++++++++++++++++++++++++++++++++++++++++++++ --}}

                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>


<div id="registro_usuario" class="tab-pane fade @if(old('es_empresa')==0) show active @endif"><br>

                  <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <input id="es_empresa" type="hidden" name="es_empresa"  value="0">
                  <input id="empresa" type="hidden" name="empresa"  value="">
                  <input id="cuit" type="hidden" name="cuit"  value="">

{{-- NOMBRE ++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Juan">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- NOMBRE ++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- APELLIDO ++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Pérez">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- APELLIDO ++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- CODIGO EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="codigo_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Codigo Empresa') }}</label>

                            <div class="col-md-6">
                                <input id="codigo_empresa" type="text" class="form-control @error('codigo_empresa') is-invalid @enderror" name="codigo_empresa" value="{{ old('codigo_empresa') }}" required autocomplete="empresa" autofocus placeholder="AFFDS (El codigo provisto por su empresa)">

                                @error('codigo_empresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- CODIGO EMPRESA +++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- EMAIL +++++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email@suempresa.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{-- EMAIL ++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- PASSWORD +++++++++++++++++++++++++++++++++++++++++++++++ --}}
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
{{-- PASSWORD +++++++++++++++++++++++++++++++++++++++++++++++ --}}
{{-- PASSWORD2 ++++++++++++++++++++++++++++++++++++++++++++++ --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
{{-- PASSWORD2 ++++++++++++++++++++++++++++++++++++++++++++++ --}}

                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
</div>
@endsection


@section('jquerys')

  $(".nav-tabs a").click(function(){
    $(this).tab('show');
  });


@endsection
