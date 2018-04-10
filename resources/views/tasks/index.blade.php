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
            <h3>Tareas
                <small> Listado de todas las Tareas publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('task.create') }}" class="btn btn-primary"> Nueva Tarea</a>
            <a href="{{ route('task.eliminated') }}" class="btn btn-warning"> Tareas Eliminadas</a>
            <br/>
        </div>
    </div>

    @include('tasks._table')

@endsection





