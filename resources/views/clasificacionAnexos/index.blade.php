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
            <h3>Clasificación de los Anexos <small> Listado de todos los ítems publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('clasificacion.create') }}" class="btn btn-primary"> Nueva Clasificación</a>
            <a href="{{ route('clasificacion.eliminated') }}" class="btn btn-warning">Clasificaciones Eliminadas</a>
            <br/>
        </div>
    </div>

    @include('clasificacionAnexos._table')

@endsection
