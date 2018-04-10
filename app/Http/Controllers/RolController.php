<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Http\Requests\RolRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::all();
        
        return view('roles.index', ['roles' => $roles, 'action'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolRequest $rolRequest)
    {
        $data = $rolRequest->all();
        $creada = Rol::create($data);
        if ($creada)
        {
           // $this->enviar($despachoRequest->archivo);
            Session::flash('message-success', 'Rol guardado satisfactoriamente.');
            return redirect()->route('rol.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return view('roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        return view('roles.edit', ['rol' => $rol]);
      //  return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolRequest $rolRequest, Rol $rol)
    {
        $rol->fill($rolRequest->all())->update();
        Session::flash('message-success', 'Rol actualizado satisfactoriamente.');
        return redirect()->route('rol.index');
    }

    public function eliminated()
    {
        $rolesEliminados = Rol::onlyTrashed()->get();
        return view('roles.eliminated', ['roles' => $rolesEliminados, 'action' => 'restore']);
    }

    public function restore($id)
    {
        $rol = Rol::withTrashed()->where('slug', '=', $id)->first();
        $rol->restore();
        Session::flash('message-success', 'Rol restaurado satisfactoriamente.');
        return redirect()->route('rol.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        Session::flash('message-danger', 'Rol eliminado satisfactoriamente.');
        return redirect()->route('rol.index');
    }
}
