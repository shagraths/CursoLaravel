<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
use proyecto\Producto;
use Exception;

class ProductoController extends Controller
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
        $data = Producto::all();
        return view('mantenedores/producto/listado', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenedores/producto/crear');
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
            $producto = new Producto();
            $producto->nombre_producto = $request->nombre_producto;
            $producto->save();
            return redirect()->route('producto.index');
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
            $data_producto = Producto::find($id);
            return view('mantenedores/producto/editar',compact('data_producto'));
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
            $producto = Producto::find($id);
            $producto->nombre_producto = $request->nombre_producto;
            $producto->save();
            return redirect()->route('producto.index');
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
            $producto = Producto::find($id);
            $producto->delete();
            return redirect()->route('producto.index');
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }
}
