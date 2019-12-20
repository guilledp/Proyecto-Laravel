<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->es_empresa) {
            return view('perfil.empresa', ['user' => Auth::user()]);
        } else {
            return view('perfil.empleado', ['user' => Auth::user()]);

        }
    }

    public function misCursos()
    {
        return view('cursos');
    }

    public function verCurso()
    {
        return view('curso.ver');
    }

    public function hacerExamen()
    {
        return view('curso.examen');
    }

    public function editarCurso()
    {
        return view('curso.editar');
    }

    
}
