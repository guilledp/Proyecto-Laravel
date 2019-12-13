@extends ('layouts/app')

@section('content')

  <div class="">

    <h4 class="display-5">Informacion del curso</h4>

    <form action="" method="post">

    {{-- CAMPO LINK VIDEO --}}
    <div class="form-group row">
      <label for="linkVideo" class="col-md-2 col-form-label text-md-right">{{ __('Link Video') }}</label>

      <div class="col-md-6">
        <input id="linkVideo" type="text" class="form-control @error('linkVideo') is-invalid @enderror" name="linkVideo" value="{{ old('linkVideo') }}" autofocus>

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
        <input id="linkPPT" type="text" class="form-control @error('linkPPT') is-invalid @enderror" name="linkPPT" value="{{ old('linkPPT') }}" autofocus>

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
        <input id="linkPDF" type="text" class="form-control @error('linkPDF') is-invalid @enderror" name="linkPDF" value="{{ old('linkPDF') }}" autofocus>

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
        <input id="linkExamen" type="text" class="form-control @error('linkExamen') is-invalid @enderror" name="linkVideo" value="{{ old('linkExamen') }}" autofocus>

        <span class="invalid-feedback" role="alert">
          @error('linkExamen')
          <strong>{{ $message }}</strong>
          @enderror
        </span>
      </div>
    </div>
    {{-- CAMPO LINK EXAMEN --}}

    <div class="botones">

      <a href="index.php" class="btn btn-secondary" >cancelar</a>
      <input type="submit" class="btn btn-primary" value="Guardar cambios" >

    </div>

  </form>

</div>

@endsection
