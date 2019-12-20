@extends ('layouts/app')

@section('content')
<div class="container">

  <div class="">

    <h4 class="display-5">Informacion del curso</h4>

    <form action="{{ route('curso.update', $curso->uuid) }}" method="POST">
      @method('PATCH')
      @csrf

      {{-- CAMPO NOMBRE --}}
      <div class="form-group row">
        <label for="nombre" class="col-md-2 col-form-label text-md-right">{{ __('Nombre Curso') }}</label>

        <div class="col-md-6">
          <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') ? old('nombre') : $curso->nombre }}" autofocus required="">

          <span class="invalid-feedback" role="alert">
            @error('nombre')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </div>
      {{-- CAMPO NOMBRE --}}


      {{-- CAMPO LINK VIDEO --}}
      <div class="form-group row">
        <label for="linkVideo" class="col-md-2 col-form-label text-md-right">{{ __('Link Video') }}</label>

        <div class="col-md-6">
          <input id="linkVideo" type="text" class="form-control @error('linkVideo') is-invalid @enderror" name="linkVideo" value="{{ old('linkVideo') ? old('linkVideo') : $curso->linkVideo }}" autofocus>

          <span class="invalid-feedback" role="alert">
            @error('linkVideo')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </div>
      {{-- CAMPO LINK VIDEO --}}

      {{-- CAMPO LINK PPT --}}
      <div class="form-group row">
        <label for="linkVideo" class="col-md-2 col-form-label text-md-right">{{ __('Link PPT') }}</label>

        <div class="col-md-6">
          <input id="linkPPT" type="text" class="form-control @error('linkPPT') is-invalid @enderror" name="linkPPT" value="{{ old('linkPPT') ? old('linkPPT') : $curso->linkPPT }}" autofocus>

          <span class="invalid-feedback" role="alert">
            @error('linkPPT')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </div>
      {{-- CAMPO LINK PPT --}}

      {{-- CAMPO LINK PDF --}}
      <div class="form-group row">
        <label for="linkPDF" class="col-md-2 col-form-label text-md-right">{{ __('Link PDF') }}</label>

        <div class="col-md-6">
          <input id="linkPDF" type="text" class="form-control @error('linkPDF') is-invalid @enderror" name="linkPDF" value="{{ old('linkPDF') ? old('linkPDF') : $curso->linkPDF }}" autofocus>

          <span class="invalid-feedback" role="alert">
            @error('linkPDF')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </div>
      {{-- CAMPO LINK PDF --}}

      {{-- CAMPO LINK EXAMEN --}}
      <div class="form-group row">
        <label for="linkExamen" class="col-md-2 col-form-label text-md-right">{{ __('Link Examen Google Forms') }}</label>

        <div class="col-md-6">
          <input id="linkExamen" type="text" class="form-control @error('linkExamen') is-invalid @enderror" name="linkExamen" value="{{ old('linkExamen') ? old('linkExamen') : $curso->linkExamen }}" autofocus>

          <span class="invalid-feedback" role="alert">
            @error('linkExamen')
            <strong>{{ $message }}</strong>
            @enderror
          </span>
        </div>
      </div>
      {{-- CAMPO LINK EXAMEN --}}

      {{-- CAMPO ACTIVO --}}

      <div class="form-group row">
        <div class="col-md-2"></div>

        <div class="col-md-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="activo" value="1" {{ $curso->activo ? 'checked' : '' }} id="activo">
            <label class="form-check-label" for="activo">Activo</label>
          </div>

        </div>
      </div>




      {{-- CAMPO ACTIVO --}}

      <div class="botones">

        <a href="{{ route('cursos.index') }}" class="btn btn-secondary" >Cancelar</a>
        <input type="submit" class="btn btn-primary" value="Guardar" >

      </div>

    </form>

  </div>
</div>
@endsection
