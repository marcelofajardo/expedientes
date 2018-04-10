@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Visualización
            </h3>
            <br/>
        </div>
        <div class="pull-right">
        <a href="{{ route('user.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>



    <div class="panel panel-success col-sm-6 col-sm-offset-3">
        <div class="panel-heading">
            @if ($user->uep->nombre)
            <h3 class="text-left"><strong>UEP: {{ $user->uep->nombre }}</strong></h3>
            @endif
            <h3 class="panel-title  text-center"> <strong>Nombre: {{ $user->nombre }}</strong></h3>
        </div>
        <div class="panel-body">
            <h4 class="text-left"><strong>Username: </strong>{{ $user->username }}</h4>
            <h4 class="text-left"><strong>DNI:</strong> {{ $user->documento }}</h4>
            <h4 class="text-left"><strong>E-mail:</strong> {{ $user->email }}</h4>
            @if ($user->rol->nombre)
            <h4 class="text-left"><strong>Rol:</strong> {{ $user->rol->nombre }}</h4>
            @endif
            
            <h4 class="text-left"><strong>Estado:</strong> {{ $user->estado }}</h4>
            <h4 class="text-left"><strong>Último Acceso:</strong> {{ $user->last_login->format('d-m-Y') }}</h4>
            <h4 class="text-left"><strong>Fecha de Creación:</strong> {{ $user->created_at->format('d-m-Y') }}</h4>
           
            <br />
            <br />
            
        </div>
    </div>
@endsection