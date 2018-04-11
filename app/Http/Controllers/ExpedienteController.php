<?php

namespace App\Http\Controllers;

use App\Expediente;
use App\TipoExpediente;
use App\Http\Requests\ExpedienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Expediente::all();

        return view('expedientes.index', ['expedientes' => $expedientes, 'action'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoExpedientes = TipoExpediente::all();
        return view('expedientes.create', ['tipoExpedientes'=> $tipoExpedientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpedienteRequest $expedienteRequest)
    {
        $data = $expedienteRequest->all();
        $creada = Expediente::create($data);
        if ($creada)
        {
           // $this->enviar($despachoRequest->archivo);
            Session::flash('message-success', 'Expediente guardado satisfactoriamente.');
            return redirect()->route('expedientes.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {
        return view('expedientes.show', compact('expediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        $tipoExpedientes = TipoExpediente::all();
        return view('expedientes.edit', [
          'expediente' => $expediente,
          'tipoExpedientes' => $tipoExpedientes,

        ]);
      //  return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpedienteRequest $expedienteRequest, Expediente $expediente)
    {
        $expediente->fill($expedienteRequest->all())->update();
        Session::flash('message-success', 'Expediente actualizado satisfactoriamente.');
        return redirect()->route('expediente.index');
    }

    public function eliminated()
    {
        $expedientesEliminados = Expediente::onlyTrashed()->get();
        return view('expedientes.eliminated', ['expedientes' => $expedientesEliminados, 'action' => 'restore']);
    }

    public function restore($id)
    {
        $expediente = Expediente::withTrashed()->where('slug', '=', $id)->first();
        $expediente->restore();
        Session::flash('message-success', 'Expediente restaurado satisfactoriamente.');
        return redirect()->route('expediente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente)
    {
        $expediente->delete();
        Session::flash('message-danger', 'Expediente eliminado satisfactoriamente.');
        return redirect()->route('expediente.index');
    }
}
