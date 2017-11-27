<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use proyecto\Variedad;
use proyecto\Producto;
use Exception;

class VariedadController extends Controller
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
        $sql = "SELECT
            v.id_variedad,
            v.nombre_variedad,
            v.id_producto,
            p.nombre_producto
            FROM variedad v
            INNER JOIN producto p ON p.id_producto = v.id_producto";
        $data = DB::select($sql);
        return view('mantenedores/variedad/listado', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Producto::all();
        return view('mantenedores/variedad/crear',compact('data'));
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
            $variedad = new Variedad();
            $variedad->nombre_variedad = $request->nombre_variedad;
            $variedad->id_producto = $request->id_producto;
            $variedad->save();
            return redirect()->route('variedad.index');
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
            $data_variedad = Variedad::find($id);
            $select_producto = Producto::all();
            return view('mantenedores/variedad/editar',compact('data_variedad','select_producto'));
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
            $variedad = Variedad::find($id);
            $variedad->nombre_variedad = $request->nombre_variedad;
            $variedad->id_producto = $request->id_producto;
            $variedad->save();
            return redirect()->route('variedad.index');
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
            $variedad = Variedad::find($id);
            $variedad->delete();
            return redirect()->route('variedad.index');
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }
}
