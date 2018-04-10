@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Editar Rol
                <small> modificar el Rol seleccionado.</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('rol.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>
    <div>

        {!! Form::model($rol, ['method' => 'PATCH', 'route' => ['rol.update', $rol]]) !!}

        @include('roles._form')

        {!! Form::close() !!}

    </div>

@endsection
