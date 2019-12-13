<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Curso;
class cursoController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function crearCurso()
  {
      return view('crear');
  }

  public function mostrarCursos()
  {
  $cursos = Curso::all();
  return view('cursos',compact('cursos'));
  }

  public function guardarCurso(request $req)
  {

      $curso = new Curso;

      $curso->nombre = $req->nombre;
      $curso->linkVideo = $req->linkVideo;
      $curso->linkPDF = $req->linkPDF;
      $curso->linkPPT = $req->linkPPT;
      $curso->linkExamen = $req->linkExamen;
      $curso->empresa_ID = 1;

      $curso->save();

      return redirect('cursos');;

  }

}
