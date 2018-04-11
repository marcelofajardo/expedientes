<?php

namespace App\Http\Controllers;

use App\ClasificacionAnexo;
use App\Http\Requests\TipoExpedienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClasificacionAnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasificacionAnexos = ClasificacionAnexo::all();

        return view('clasificacionanexos.index', ['clasificacionAnexos' => $clasificacionAnexos, 'action'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clasificacionanexos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoExpedienteRequest $tipoExpedienteRequest)
    {
        $data = $tipoExpedienteRequest->all();
        $creada = ClasificacionAnexo::create($data);
        if ($creada)
        {
           // $this->enviar($despachoRequest->archivo);
            Session::flash('message-success', 'Clasificación guardado satisfactoriamente.');
            return redirect()->route('clasificacion.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClasificacionAnexo $clasificacionAnexo)
    {
        return view('clasificacionanexos.show', compact('clasificacionAnexo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClasificacionAnexo $clasificacionAnexo)
    {
        return view('clasificacionanexos.edit', ['clasificacionAnexo' => $clasificacionAnexo]);
      //  return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoExpedienteRequest $tipoExpedienteRequest, ClasificacionAnexo $clasificacionAnexo)
    {
        $clasificacionAnexo->fill($tipoExpedienteRequest->all())->update();
        Session::flash('message-success', 'Clasificación actualizado satisfactoriamente.');
        return redirect()->route('clasificacion.index');
    }

    public function eliminated()
    {
        $clasificacionAnexosEliminados = ClasificacionAnexo::onlyTrashed()->get();
        return view('clasificacionanexos.eliminated', ['clasificacionAnexos' => $clasificacionAnexosEliminados, 'action' => 'restore']);
    }

    public function restore($id)
    {
        $clasificacionAnexo = ClasificacionAnexo::withTrashed()->where('slug', '=', $id)->first();
        $clasificacionAnexo->restore();
        Session::flash('message-success', 'Clasificación restaurado satisfactoriamente.');
        return redirect()->route('clasificacion.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClasificacionAnexo $clasificacionAnexo)
    {
        $clasificacionAnexo->delete();
        Session::flash('message-danger', 'Clasificación eliminado satisfactoriamente.');
        return redirect()->route('clasificacion.index');
    }
}
