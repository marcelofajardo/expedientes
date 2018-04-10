<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
use App\Task;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

/*
ESTA FUNCION ES PARA EL PRIMER SISTEMA DE ALERTAS QUE ESTÁ DESACTIVADO
**********************************************************************


    public function notification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Notificación solo con mensaje');
                break;
            case 'basic':
                alert()->basic('Notificación Básica', 'Título');
                break;
            case 'info':
                alert()->info('Notificación de Información');
                break;
            case 'success':
                alert()->success('Notificación de Éxito.','Título')->autoclose(3000);
                break;
            case 'error':
                alert()->error('Notificación de Error');
                break;
            case 'warning':
                alert()->warning('Notificación de Advertencia');
                break;
        }
        return redirect()->route('home');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$notificaciones = Notificacion::all();Auth::user()->id;

        $notificaciones = Notificacion::where('user_id', '=', Auth::user()->id)->get();
        $cant_notificaciones = Notificacion::where('user_id', '=', Auth::user()->id)->count();

        $task = Task::where('user_id', '=', Auth::user()->id)->get();
        $cant_task = Task::where('user_id', '=', Auth::user()->id)->count();


        session(['notificaciones' => $notificaciones]);
        session(['cant_notificaciones' => $cant_notificaciones]);

        session(['task' => $task]);
        session(['cant_task' => $cant_task]);

        // ESTO QUE VIENE AHORA ES PARA ACTIVAR EL PRIMER SISTEMA DE ALERTAS QUE ACTUALMENTE
        // ESTA DESHABILITADO
        // alert()->warning('Notificación de Advertencia');

        /* ESTO ES PARA EL SEGUNDO SISTEMA DE ALERTAS QUE ESTÁ ACTIVO ACTUALMENTE*/
        $notificacion = array(
            'message' => 'Gracias! Su mensaje se a enviado con exito.', 
            'alert-type' => 'success'
        );
       return view('home')->with($notificacion);
    }
}
