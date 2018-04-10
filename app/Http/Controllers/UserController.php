<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use App\Uep;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users, 'action'=>'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Rol::all()->pluck('nombre', 'id');
        $ueps  = Uep::all()->pluck('nombre', 'id');
        return view('users.edit', [
            'user'=>$user,
            'roles' => $roles,
            'ueps' =>$ueps,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $userRequest, User $user)
    {
        $user->fill($userRequest->all())->update();
        Session::flash('message-success', 'Usuario actualizado satisfactoriamente.');
        return redirect()->route('user.index');
    }

    public function eliminated()
    {
        $usersEliminados = User::onlyTrashed()->get();
        return view('users.eliminated', ['users' => $usersEliminados, 'action' => 'restore']);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('slug', '=', $id)->first();
        $user->restore();
        Session::flash('message-success', 'Usuario restaurado satisfactoriamente.');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message-danger', 'Usuario eliminado satisfactoriamente.');
        return redirect()->route('user.index');
    }


}
