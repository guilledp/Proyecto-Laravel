@extends ('layouts/app')

@section('content')

<div class="col-md-11">

    <h4 class="display-5">Crear un nuevo curso</h4>
    <p></p>

    <form action="{{url('crear')}}" method="post">
      @csrf

      {{-- CAMPO NOMBRE --}}
      <div class="form-group row">
        <label for="nombre" class="col-md-3 col-form-label text-md-right">{{ __('Nombre del curso') }}</label>

        <div class="col-md-9">
          <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" autofocus>

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
      <label for="linkVideo" class="col-md-3 col-form-label text-md-right">{{ __('Link Video') }}</label>

      <div class="col-md-9">
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
      <label for="linkVideo" class="col-md-3 col-form-label text-md-right">{{ __('Link PPT') }}</label>

      <div class="col-md-9">
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
      <label for="linkPDF" class="col-md-3 col-form-label text-md-right">{{ __('Link PDF') }}</label>

      <div class="col-md-9">
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
      <label for="linkExamen" class="col-md-3 col-form-label text-md-right">{{ __('Link Examen Google Forms') }}</label>

      <div class="col-md-9">
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

      <a href="{{url('cursos')}}" class="btn btn-secondary" >cancelar</a>
      <input type="submit" class="btn btn-primary" value="Crear curso" >

    </div>

  </form>

</div>

@endsection
