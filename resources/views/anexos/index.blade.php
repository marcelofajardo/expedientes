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
            <h3>Anexos <small> Listado de todos los Anexos publicados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('anexo.create') }}" class="btn btn-primary"> Nuevo Anexo</a>
            <a href="{{ route('anexo.eliminated') }}" class="btn btn-warning">Anexos Eliminados</a>
            <br/>
        </div>
    </div>

    @include('anexos._table')

@endsection
