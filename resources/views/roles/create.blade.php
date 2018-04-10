@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo Rol
                <small> ingresar un nuevo Rol al Sistema.</small>
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

        {!! Form::open(['route' => 'rol.store']) !!}

        @include('roles._form')

        {!! Form::close() !!}

    </div>

@endsection

@push('scripts')

<script src="{{ asset('public/js/admin.js') }}"></script>

@endpush