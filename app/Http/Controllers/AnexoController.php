<?php

namespace App\Http\Controllers;

use App\Anexo;
use App\Expediente;
use App\ClasificacionAnexo;
use App\Http\Requests\AnexoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AnexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anexos = Anexo::all();
        return view('anexos.index', ['anexos' => $anexos, 'action'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasificacionAnexo = ClasificacionAnexo::all()->pluck('nombre', 'id');
        $expedientes = Expediente::all()->pluck('caratula', 'id');
        return view('anexos.create', [
          'clasificacionAnexo'=> $clasificacionAnexo,
          'expedientes' => $expedientes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnexoRequest $anexoRequest)
    {
        $data = $anexoRequest->all();
        //dd($data);
        if($data['files'])
      //  dd($data['files']);
        {
            $allowedfileExtension=['pdf','jpg','png','docx','JPG','PDF','PNG','DOCX'];
            $files = $data['files'];
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);

                if($check)
                {
                    //dd($data);
                    $destinationPath = 'uploads/';
                    $file->move($destinationPath, $filename);
                    $new_anexo = new Anexo();
                    $new_anexo->user_id = Auth::user()->id;
                    $new_anexo->expediente_id = $data['expediente_id'];
                    $new_anexo->clasificacion_id =$data['clasificacion_id'];
                    $new_anexo->username = Auth::user()->username;
                    $new_anexo->descripcion = $data['descripcion'];
                    $new_anexo->file = $filename;
                    $new_anexo->url = 'uploads';
                    $new_anexo->slug = str_slug($data['descripcion']) . '-'. rand(5,10);
                    $creada = $new_anexo->save();
                    //dd($creada);

                    /*
                    foreach ($request->files as $file)
                    {
                        $filename = $photo->store('photos');
                        ItemDetail::create([
                              'item_id' => $items->id,
                              'filename' => $filename
                        ]);
                      }*/
                  }

              }
          }

          if ($creada)
          {
             // $this->enviar($despachoRequest->archivo);
              Session::flash('message-success', 'Anexo guardado satisfactoriamente.');
              return redirect()->route('anexo.index');
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anexo $anexo)
    {
        return view('anexos.show', compact('anexo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anexo $anexo)
    {
        $clasificacionAnexo = ClasificacionAnexo::all()->pluck('nombre', 'id');
        $expedientes = Expediente::all()->pluck('caratula', 'id');
        return view('anexos.edit', [
          'anexo' => $anexo,
          'clasificacionAnexo' => $clasificacionAnexo,
          'expedientes' => $expedientes,

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
    public function update(AnexoRequest $anexoRequest, Anexo $anexo)
    {
        $anexo->fill($anexoRequest->all())->update();
        Session::flash('message-success', 'Anexo actualizado satisfactoriamente.');
        return redirect()->route('anexo.index');
    }

    public function eliminated()
    {
        $anexosEliminados = Anexo::onlyTrashed()->get();
        return view('anexos.eliminated', ['anexos' => $anexosEliminados, 'action' => 'restore']);
    }

    public function restore($id)
    {
        $anexo = Anexo::withTrashed()->where('slug', '=', $id)->first();
        $anexo->restore();
        Session::flash('message-success', 'Anexos restaurado satisfactoriamente.');
        return redirect()->route('anexo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anexo $anexo)
    {
        $anexo->delete();
        Session::flash('message-danger', 'Anexo eliminado satisfactoriamente.');
        return redirect()->route('anexo.index');
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
