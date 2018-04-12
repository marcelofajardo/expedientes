<?php

namespace App\Http\Controllers;

use App\Expediente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\TipoExpediente;
use App\Http\Requests\ExpedienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::all();
        return view('expedientes.index', ['expedientes' => $expedientes, 'action'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoExpedientes = TipoExpediente::all()->pluck('nombre', 'id');
        return view('expedientes.create', [
          'tipoExpedientes'=> $tipoExpedientes,
          'clasificacionExpedientes'=> $clasificacionExpedientes
        ]);
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
        $data['user_id'] = Auth::user()->id;
        $data['nombre_usuario'] = Auth::user()->nombre;
        $data['usuario'] = Auth::user()->username;
        $data['rol_usuario'] = Auth::user()->rol->nombre;
        //dd($data);
        $creada = Expediente::create($data);
        if ($creada)
        {
           // $this->enviar($despachoRequest->archivo);
            Session::flash('message-success', 'Expediente guardado satisfactoriamente.');
            return redirect()->route('expediente.index');
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
      $logs = DB::table('logs')
          ->where('expediente_id', '=', $expediente->id)
          ->get();
      $anexos = DB::table('anexo')
          ->where('expediente_id', '=', $expediente->id)
          ->get();
        return view('expedientes.show', [
          'logs'=>$logs,
          'anexos'=>$anexos,
          'expediente'=>$expediente,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        $tipoExpedientes = TipoExpediente::all()->pluck('nombre', 'id');
        return view('expedientes.edit', [
          'expediente' => $expediente,
          'tipoExpedientes' => $tipoExpedientes,
          'clasificacionExpedientes' => $clasificacionExpedientes,

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

    /*
    private function enviar($dato)
    {
        \Mail::Send('emails.notification',['nombre'=>'Aviso de Carga al Sistema', 'dato'=>$dato],function($message){
            $message->from('maurotello73@gmail.com', 'Sistema');
            $message->to('maurotello73@gmail.com')->subject('Sistema - Mails');
        });
    }
    */
}
