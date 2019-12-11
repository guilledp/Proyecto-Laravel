<!-- js -->
<script type="text/javascript" src="{{ asset('js/validar_login.js') }}"></script>
<!-- js -->

@extends('layouts.app')

@section('content')
<div class="login.php">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">

                    <form id="form-login" method="POST" action="{{ route('login') }}">
                        @csrf

{{-- VALIDADO POR JS --}}

                          <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

                                <span class="invalid-feedback" role="alert">
                                @error('email')
                                        <strong>{{ $message }}</strong>
                                @enderror
                              </span>
                            </div>
                          </div>

{{-- VALIDADO POR JS --}}
{{-- VALIDADO POR JS --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                <span class="invalid-feedback" role="alert">
                                @error('password')
                                        <strong>{{ $message }}</strong>
                                @enderror
                              </span>
                            </div>
                        </div>

{{-- VALIDADO POR JS --}}

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidate tu contraseña?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
