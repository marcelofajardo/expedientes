@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Editar Expediente <small> modificar el ítem seleccionado.</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('expediente.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>
    <div>

        {!! Form::model($expediente, ['method' => 'PATCH', 'route' => ['expediente.update', $expediente]]) !!}

        @include('expedientes._form')

        {!! Form::close() !!}

    </div>

@endsection
