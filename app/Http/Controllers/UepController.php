<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uep;

class UepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ueps = Uep::all();
        return view('uep.index', ['ueps' => $ueps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UepRequest $uepRequest)
    {
        $creado = Uep::create($uepRequest->all());

        if ($creado)
        {
            return redirect()->route('uep.index')->with('message', 'UEP ingresada correctamente !!!.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Uep $uep)
    {
        return view('uep.show', compact('uep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Uep $uep)
    {
        return view('uep.edit', compact('uep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UepRequest $uepRequest, Uep $uep)
    {
        $uep->fill($uepRequest->all())->update();

        return redirect()->route('uep.index')->with('message', 'UEP actualizado correctamenrte. !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uep $uep)
    {
        $uep->delete();
        Session::flash('message-danger', 'UEP eliminado satisfactoriamente.');
        return redirect()->route('uep.index');
    }
}
