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
            <h3>Logs<small> Listado de todos los Logs publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('log.create') }}" class="btn btn-primary"> Nuevo Log</a>
            <a href="{{ route('log.eliminated') }}" class="btn btn-warning"> Logs Eliminados</a>
            <br/>
        </div>
    </div>

    @include('logs._table')

@endsection
