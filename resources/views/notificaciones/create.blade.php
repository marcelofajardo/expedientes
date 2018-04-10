@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Nueva Notificación
                <small> Ingresar una nueva Notificación al Sistema.</small>
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

        {!! Form::open(['route' => 'notificacion.store']) !!}

        @include('notificaciones._form')

        {!! Form::close() !!}

    </div>

@endsection

@push('scripts')

<script src="{{ asset('js/admin.js') }}"></script>

@endpush