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
            <h3>ROLES
                <small> Listado de todos los Roles publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('rol.create') }}" class="btn btn-primary"> Nuevo Rol</a>
            <a href="{{ route('rol.eliminated') }}" class="btn btn-warning"> Roles Eliminados</a>
            <br/>
        </div>
    </div>

    @include('roles._table')

@endsection





