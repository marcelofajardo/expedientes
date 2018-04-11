@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Nueva Clasificación de los Anexos <small> ingresar un nuevo ítem al Sistema.</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('clasificacion.index') }}" class="btn btn-default"> Volver</a>
            <br/>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>
    <div>

        {!! Form::open(['route' => 'clasificacion.store']) !!}

        @include('clasificacionAnexos._form')

        {!! Form::close() !!}

    </div>

@endsection

@push('scripts')

<script src="{{ asset('public/js/admin.js') }}"></script>

@endpush
