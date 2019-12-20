@extends ('layouts/app')

@section('content')

<div class="container">

  <div class="search row" id="buscar-cursos">
    <div class="col-md-6">

      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar" name="q" id="q" value="{{ $q }}">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="q-clear">  <i class="fas fa-broom"></i></button>
        </div>
      </div>

    </div>
  </div>

  <div class="container mt-2" id="row-cursos">

    <div id="vacio-div" class=" text-center d-none">
      No hay resultados
    </div>

    <!-- AQUI VAN LOS CURSOS -->
    <!-- <div class="row cursos"> -->

    <div class="card-columns cursos" >

      @foreach($cursos as $curso)
      <div id="row-curso" class="card cursocard {{ $curso->activo ? 'text-white bg-secondary' : ' bg-light' }} mb-3" style="max-width: 18rem;"  data-curso="{{ $curso->nombre }}">
        <!-- <a href="{{ route('curso.show',$curso->uuid) }}" role="button"> -->
        <div class="card-body">

          <a href="{{ route('curso.show',$curso->uuid) }}" class="card-link">
            <h4 class="card-title {{ $curso->activo ? 'text-white' : 'text-dark' }}">{{ $curso->nombre }}</h4>
          </a>

          @if(!$curso->activo)
          <span class="text-muted">inactivo</span>
          @endif

        </div>

        <div class="card-footer bg-transparent">
          <a href="{{ route('curso.show',$curso->uuid) }}" class="card-link">
            <!-- <i class="fas fa-eye" alt="Ver"></i> -->
          </a>
          Contenido:
          @if($curso->linkVideo) <i class="fab fa-youtube" alt="Video"> </i> @endif
          @if($curso->linkPPT) <i class="fas fa-file-powerpoint"> </i> @endif
          @if($curso->linkPDF) <i class="fas fa-file-pdf"> </i> @endif
          @if($curso->linkExamen) <i class="fas fa-pen-fancy"> </i> @endif
        </div>
      </div>
      @endforeach

    </div>


  </div>
</div>
<div id="paginator-div">

  {{ $cursos->links() }}
</div>

@if(Auth::user()->es_empresa)
<a href="{{ route('curso.create')}}" class="btn-primary btn-circle btn-circle-xl m-1 boton-agregar"><i class="fas fa-plus"></i></a>
@endif

@endsection

@section('jquerys')

$('#q').keyup(function() {

  $('#vacio-div').addClass('d-none');

  $('.cursocard').each(function() {
    if( ~$(this).data('curso').toLowerCase().indexOf($('#q').val().toLowerCase()) ) {
      $(this).removeClass('d-none');
    } else {
      $(this).addClass('d-none');
    }

    if( $('.cursocard:visible').length ==0 ) {
      $('#vacio-div').removeClass('d-none');
    } else {

      $('#vacio-div').addClass('d-none');
    }

    ;
  });

});
$('#q-clear').click(function() {
  $('#vacio-div').addClass('d-none');
  $('#q').val('').trigger('keyup');
});
@endsection
