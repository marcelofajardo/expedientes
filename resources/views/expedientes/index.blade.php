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
            <h3>Expedientes <small> Listado de todos los Expedientes publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('expediente.create') }}" class="btn btn-primary"> Nuevo Expediente</a>
            <a href="{{ route('expediente.eliminated') }}" class="btn btn-warning"> Expedientes Eliminados</a>
            <br/>
        </div>
    </div>

    @include('expedientes._table')

@endsection
