@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Visualización de Anexo
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('anexo.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>



    <div class="panel panel-success col-sm-6 col-sm-offset-3">
        <div class="panel-heading">
            <h3 class="panel-title  text-center">Expediente: <strong>{{ $anexo->expediente->caratula }}</strong></h3>
        </div>
        <div class="panel-body">
            <h4 class="">Clasificación: <strong>{{ $anexo->clasificacion->nombre }}</strong></h4>
            <h4 class="">Username: <strong>{{ $anexo->username }}</strong></h4>
            <h4 class="">Fecha: <strong>{{ $anexo->created_at->format('d-m-Y') }}</strong></h4>
            <h4 class="">Archivo: <strong>{{ $anexo->file }}</strong></h4>
            <hr />

            <p class="text-center">
              <a href="{{ asset($anexo->url . '/' . $anexo->file) }}" target="_blank"><img src="{{ asset($anexo->url . '/' . $anexo->file) }}" width="100" /></a>
            </p>
        </div>

    </div>
@endsection
