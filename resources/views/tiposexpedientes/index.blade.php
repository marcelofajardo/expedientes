@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}"/>
@endpush

@if(Session::has('flash_message'))
{{Session::get('flash_message')}}
@endif

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Tipos de Expedientes <small> Listado de todos los ítems publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('tipoexpediente.create') }}" class="btn btn-primary"> Nuevo Tipo de Expediente</a>
            <a href="{{ route('tipoexpediente.eliminated') }}" class="btn btn-warning"> Tipos de Expedientes Eliminados</a>
            <br/>
        </div>
    </div>

    @include('tiposexpedientes._table')

@endsection
