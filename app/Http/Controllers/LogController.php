<?php

namespace App\Http\Controllers;

use App\Expediente;
use App\Log;
use App\Http\Requests\LogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::all();
        return view('logs.index', ['logs' => $logs, 'action'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expedientes = Expediente::all()->pluck('caratula', 'id');
        return view('logs.create', ['expedientes'=> $expedientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogRequest $logRequest)
    {
        $data = $logRequest->all();
        $data['user_id'] = Auth::user()->id;
        $data['username'] = Auth::user()->username;
        //dd($data);
        $creada = Log::create($data);
        if ($creada)
        {
           // $this->enviar($despachoRequest->archivo);
            Session::flash('message-success', 'Log guardado satisfactoriamente.');
            return redirect()->route('log.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        return view('logs.show', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        $expedientes = Expediente::all()->pluck('nombre', 'id');
        return view('logs.edit', [
          'log' => $log,
          'expedientes' => $expedientes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogRequest $logRequest, Log $log)
    {
        $log->fill($logRequest->all())->update();
        Session::flash('message-success', 'Log actualizado satisfactoriamente.');
        return redirect()->route('log.index');
    }

    public function eliminated()
    {
        $logsEliminados = Log::onlyTrashed()->get();
        return view('logs.eliminated', ['logs' => $logsEliminados, 'action' => 'restore']);
    }

    public function restore($id)
    {
        $log = Log::withTrashed()->where('slug', '=', $id)->first();
        $log->restore();
        Session::flash('message-success', 'Log restaurado satisfactoriamente.');
        return redirect()->route('log.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        $log->delete();
        Session::flash('message-danger', 'Log eliminado satisfactoriamente.');
        return redirect()->route('log.index');
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
