@extends ('layouts/app')

@section('content')
<div class="container">



    <div class="col-md-12 text-center">

      @if(Auth::user()->es_empresa)
      <div class="col-12 text-right">
        <a href="{{ route('curso.edit', $curso->uuid) }}" class="btn btn-primary" >Editar</a>
      </div>
      @endif

      <div class="titulo-curso">
        <h1 class="display-10"> <strong>{{ $curso->nombre }}</strong> </h1>
      </div>


<div class="accordion" id="accordionCurso">
  
  @if($curso->linkVideo)
  <div class="card">
    <div class="card-header hand" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" >
          Mira el siguiente video
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionCurso">
      <div class="card-body">

        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="{{ $curso->linkVideo }}" allowfullscreen></iframe>
        </div>

      </div>
    </div>
  </div>
  @endif

  @if($curso->linkPDF)
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Documento PDF
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionCurso">
      <div class="card-body">

        <iframe src="http://docs.google.com/gview?url={{$curso->linkPDF}}&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  @endif

  @if($curso->linkPPT)
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Presentación PPT
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionCurso">
      <div class="card-body">
        <iframe src="http://docs.google.com/gview?url={{$curso->linkPPT}}&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  @endif

  @if($curso->linkExamen)
      <div class="curso-examen">
        <h3>Estas listo? </h3>
        <a href="{{ route('curso.examen', $curso->uuid) }}" class="btn btn-success btn-lg" >Hacer el Exámen!</a>
      </div>
  
  @endif
</div>



    </div>

  </div>

@endsection
