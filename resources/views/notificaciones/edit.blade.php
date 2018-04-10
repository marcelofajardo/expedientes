@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Editar Notificación
                <small> modificar la Notificación seleccionada.</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('notificacion.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>
    <div>
        {!! Form::model($notificacion, ['method' => 'PATCH', 'route' => ['notificacion.update', $notificacion]]) !!}

        @include('notificaciones._form')

        {!! Form::close() !!}
    </div>
@endsection