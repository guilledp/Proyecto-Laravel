<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function miPerfil() {

        return view('perfil');
    }

    public function misCursos()
    {
        return view('cursos');
    }

    public function verCurso()
    {
        return view('curso');
    }

    public function hacerExamen()
    {
        return view('examen');
    }

    public function editarCurso()
    {
        return view('editar');
    }
}
