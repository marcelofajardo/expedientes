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
            <h3>NOTIFICACIONES
                <small> Listado de todos las Notificaciones publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('notificacion.create') }}" class="btn btn-primary"> Nuevo Notificación</a>
            <a href="{{ route('notificacion.eliminated') }}" class="btn btn-warning"> Notificaciones Eliminadas</a>
            <br/>
        </div>
    </div>

    @include('notificaciones._table')

@endsection





