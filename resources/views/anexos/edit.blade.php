@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Editar Anexo <small> modificar el ítem seleccionado.</small>
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
    <div>

        {!! Form::model($anexo, ['method' => 'PATCH', 'route' => ['anexo.update', $anexo], 'enctype' => 'multipart/form-data']) !!}

        @include('anexos._form')

        {!! Form::close() !!}

    </div>

@endsection
