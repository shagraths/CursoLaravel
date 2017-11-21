<?php

namespace proyecto\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use proyecto\User;
use proyecto\Perfil;
use Exception;

class UsersController extends Controller
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
                    u.id,
                    u.name,
                    u.email,
                    p.nombre as perfil 
                FROM users u
                INNER JOIN perfil p ON p.id = u.perfil_id";
        $data = DB::select($sql);
        return view('mantenedores/usuario/listado', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Perfil::all();
        return view('mantenedores/usuario/crear',compact('data'));
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
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->perfil_id = $request->perfil_id;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('usuario.index');
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
            $data_user = User::find($id);
            $select_perfil = Perfil::all();
            return view('mantenedores/usuario/editar',compact('data_user','select_perfil'));
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
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->perfil_id = $request->perfil_id;
            if($request->password !== ''){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect()->route('usuario.index');
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
            $user = User::find($id);
            $user->delete();
            return redirect()->route('usuario.index');
        }catch(Exception $e) {
            return $this->response->errorInternal($e -> getMessage());
        }
    }
}
