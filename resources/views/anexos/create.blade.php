@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('public/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Nuevo Anexo <small> ingresar un nuevo ítem al Sistema.</small>
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
        {!! Form::open(['route' => ['anexo.store'], 'enctype' => 'multipart/form-data']) !!}

        @include('anexos._form')

        {!! Form::close() !!}

    </div>
@endsection

@push('scripts')
<script>

    $('#table').DataTable({
        "sDom": '<"top"l>rt<"bottom"ip><"clear">',
        processing: true,
        language: {
            "url": '{{ asset('js/Spanish.json') }}'
        },
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                input.setAttribute("class", "col-md-12");
                $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
            })
        }
    });
</script>

@endpush
