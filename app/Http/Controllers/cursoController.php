<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use \App\Curso;
use Illuminate\Support\Str;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // filtro cursos por empresa del logueado
        $qCursos = Curso::whereEmpresaId(Auth::user()->Empresa->id);

        // filtro por busueda
        $q = '';
        if($request->has('q')) {
            $q = $request->q;
            $qCursos->where('nombre','like',"%$q%");
        }

        // si no es empresa, solo los activos
        if(!Auth::user()->es_empresa) {
            $qCursos->whereActivo(true);
        }

        $cursos = $qCursos->paginate(config('app.pagination_limit', 10));

        return view('curso.index',['cursos' => $cursos, 'q' => $q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = new Curso;
        return view('curso.crear', ['curso' => $curso]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'string|unique:cursos|max:200',
            'linkVideo' => 'nullable|url|required_without_all:linkPPT,linkPDF',
            'linkPPT' => 'nullable|url|required_without_all:linkVideo,linkPDF',
            'linkPDF' => 'nullable|url|required_without_all:linkPPT,linkVideo',
            'linkExamen' => 'nullable|url'
        ],
        [
        'required_without_all' => 'Al menos un link debe ser provisto'
        ]);

        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->uuid = Str::uuid();
        $curso->linkVideo = $request->linkVideo;
        $curso->linkPPT = $request->linkPPT;
        $curso->linkPDF = $request->linkPDF;
        $curso->linkExamen = $request->linkExamen;
        $curso->activo = $request->activo || 1;
        $curso->empresa_id = Auth::user()->id;

        $curso->save();
        return redirect(route('cursos.index'))->with("success", "Curso ".$curso->nombre." creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $curso = Curso::whereUuid($uuid)->first();
        return view('curso.ver', ['curso' => $curso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $curso = Curso::whereUuid($uuid)->first();
        return view('curso.editar', ['curso' => $curso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $curso = Curso::whereUuid($uuid)->first();
        $curso->nombre = $request->nombre;
        $curso->linkVideo = $request->linkVideo;
        $curso->linkPPT = $request->linkPPT;
        $curso->linkPDF = $request->linkPDF;
        $curso->linkExamen = $request->linkExamen;
        $curso->activo = $request->activo || 0;
        $curso->save();
        
        return redirect(route('cursos.index'))->with("success", "Curso ".$curso->nombre." modificado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function examen($uuid)
    {
        $curso = Curso::whereUuid($uuid)->first();
        return view('curso.examen', ['curso' => $curso]);
    }
}
