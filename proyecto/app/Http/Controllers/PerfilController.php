<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
use proyecto\Perfil;
use Exception;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perfil::all();
        return view('mantenedores/perfil/listado', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenedores/perfil/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $perfil = new Perfil();
            $perfil->nombre = $request->nombre;
            $perfil->estado = $request->estado;
            $perfil->save();
            return redirect()->route('perfil.index');
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data_perfil = Perfil::find($id);
            return view('mantenedores/perfil/editar',compact('data_perfil'));
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $perfil = Perfil::find($id);
            $perfil->nombre = $request->nombre;
            $perfil->estado = $request->estado;
            $perfil->save();
            return redirect()->route('perfil.index');
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $perfil = Perfil::find($id);
            $perfil->delete();
            return redirect()->route('perfil.index');
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }
}
