@extends ('layouts/app')

@section('content')

  <div class="perfil row">

    <div class="col-md-8">

      <!-- BOTON EDITAR CURSO -->
      {{-- MOSTRAR SOLO SI ES EMPRESA --}}

        <a href="/editar" class="btn btn-primary" >Editar</a>

      {{-- MOSTRAR SOLO SI ES EMPRESA --}}
      <!-- BOTON EDITAR CURSO -->

      <div class="titulo-curso">
        <h1 class="display-10"> <b>  C001 - CURSO 1</b> </h1>
      </div>

      <h2 class="display-20">Mira el siguiente video</h2>

      <div class="curso-video">
        <iframe id="ytplayer" type="text/html" width="720" height="405"
          src="https://www.youtube.com/embed/gVKTgaldTWA?controls=0&modestbranding=1&playsinline=1&color=white"
          frameborder="0" allowfullscreen>
        </iframe>
      </div>

      <!-- <h2 class="display-2">Material adicional</h2>

      <div class="">
        <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=[https://www.your_website/file_name.pptx]' width='100%' height='600px' frameborder='0'>
      </div> -->

      <div class="curso-examen">
        <h3>Estas listo? </h3>
        <a href="examen" class="btn btn-success btn-lg" >Hacer el Examen!</a>
      </div>

    </div>

  </div>

@endsection
