@extends ('layouts/app')

@section('content')
<div class="container">

  <div class="perfil">

    <div class="">

      <div id="Iframe-Liason-Sheet" class="iframe-border center-block-horiz">
         <div class="responsive-wrapper responsive-wrapper-wxh-760x1200">
           <iframe src="{{ $curso->linkExamen }}">Cargando...</iframe>
         </div>
       </div>

    </div>

  </div>

</div>
@endsection
