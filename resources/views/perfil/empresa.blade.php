@extends ('layouts/app')

@section('content')
<div class="container">

  @if (session('success'))
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="col-md-12">
        <div id="aviso_ok" class="aviso alert alert-success alert-styled-right alert-dismissible">
          <span class="font-weight-semibold">{{ session('success') }}</span>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if (session('errors')) @endif

  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="{{ route('update-avatar') }}" method="POST" id="update_avatar_form" enctype="multipart/form-data">
        @csrf
        <input type="file" name="avatar" id="avatar" style="display: none">
      </form>

      <form action="{{ route('update-logo') }}" method="POST" id="update_logo_form" enctype="multipart/form-data">
        @csrf
        <input type="file" name="logo" id="logo" style="display: none">
      </form>

      <form action="{{ route('user-update') }}" method="POST">
        @csrf
        <div class="accordion" id="accordionCurso">

          <div class="card">
            <div class="card-header hand" id="headingDE" data-toggle="collapse" data-target="#collapseDE" aria-expanded="true" aria-controls="collapseDE">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" >
                  Datos de la empresa
                </button>
              </h2>
            </div>

            <div id="collapseDE" class="collapse show" aria-labelledby="headingDE" data-parent="#accordionCurso">
              <div class="card-body">

                <div class="form-group row">
                  <div class="col-md-10 text-center">
                    <div>
                      <img src="{{ asset("img/userlogo/$user->logo") }}" class="img-fluid " style="height:85px;width: auto"  id="user_upload_logo_button" data-toggle="tooltip" data-placement="right" title="Click para cambiar su logo. Recomendada: 218x85px" alt="Click para cambiar su logo. Recomendada: 218x85px">
                    </div>
                    <div>
                      @error('logo')
                      <span class="alert alert-danger alert-dismissible" >
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

              </div>


              <div class="form-group row">
                <label for="empresa" class="col-md-4 col-form-label text-md-right">{{ __('Razón Social') }}</label>
                <div class="col-md-6">
                  <input type="text" class="form-control @error('empresa') is-invalid @enderror" id="empresa" name="empresa" placeholder="Razón Social de la empresa" value="{{ $user->empresa }}">
                  @error('empresa')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="cuit" class="col-md-4 col-form-label text-md-right">{{ __('CUIT') }}</label>
                <div class="col-md-6">
                  <input type="text" class="form-control @error('cuit') is-invalid @enderror" id="cuit" name="cuit" placeholder="Apellido" value="{{ $user->cuit }}">
                  @error('cuit')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="codigo_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Código de empresa') }}</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="codigo_empresa" name="codigo_empresa" placeholder="ASDFG" value="{{ $user->codigo_empresa }}" readonly="">
                  <span class="text-muted small">Compartí este codigo acceder los cursos!</span>
                </div>
              </div>

            </div>
          </div>


          <div class="card">
            <div class="card-header hand" id="headingDS" data-toggle="collapse" data-target="#collapseDS" aria-expanded="true" aria-controls="collapseDS">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" >
                  Inicio de sesion
                </button>
              </h2>
            </div>

            <div id="collapseDS" class="collapse @if (session('errors')) show @endif" aria-labelledby="headingDS" data-parent="#accordionCurso">
              <div class="card-body">

                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                  <div class="col-md-6">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" value="{{ $user->email }}" autocomplete="username">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña actual') }}</label>
                  <div class="col-md-6">
                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="password" placeholder="Su contraseña" >
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>


                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                  <div class="col-md-6">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Nueva contraseña" autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Repetir contraseña') }}</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password-confirm" placeholder="Vuelva a escribir la contraseña" autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- BOTONES -->
        <div class="botones" id="botones-perfil">

          <a href="{{ route('home') }}" class="btn btn-secondary" >Cancelar</a>
          <input type="submit" id="btn-guardar-acceso" class="btn btn-primary" value="Guardar" >

        </div>
        <!-- BOTONES -->

      </form>

    </div>


  </div>
</div>

@endsection
@section('jquerys')

$('#user_upload_avatar_button').tooltip();
$('#user_upload_logo_button').tooltip();

$('#btn-guardar-acceso').click(function() {

});

$( "#user_upload_avatar_button" ).click(function(e) {
  $( "#avatar" ).click();
});
$( "#user_upload_logo_button" ).click(function(e) {
  $( "#logo" ).click();
});

$('#update_avatar_form').on('change', "input#avatar", function (e) {
  e.preventDefault();
  $("#update_avatar_form").submit();
});

$('#update_logo_form').on('change', "input#logo", function (e) {
  e.preventDefault();
  $("#update_logo_form").submit();
});

$(document).ready(function(){
  setTimeout(function() { $( ".aviso" ).hide('slow'); }, 4000);
});
@endsection
