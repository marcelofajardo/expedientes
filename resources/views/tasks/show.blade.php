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
        <a href="{{ route('task.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>



    <div class="panel panel-success col-sm-6 col-sm-offset-3">
        <div class="panel-heading">
            @if ($task->user->username)
            <h3 class="text-left"><strong>Usuario: {{ $task->user->username }}</strong></h3>
            @endif
            <h3 class="panel-title  text-center"> <strong>Fecha: {{ $task->created_at->format('d-m-Y') }}</strong></h3>
        </div>
        <div class="panel-body">
            <h4 class="text-left"><strong>Nombre: </strong>{{ $task->nombre }}</h4>
            <h4 class="text-left"><strong>Descripción:</strong> {{ $task->descripcion }}</h4>
            <br />
            <br />
            
        </div>
    </div>
@endsection