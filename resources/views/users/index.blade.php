@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}"/>
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>USUARIOS
                <small> Listado de todos los Usurios registrados hasta la fecha</small>
            </h3>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('user.create') }}" class="btn btn-primary"> Nuevo Usuario</a>
            <a href="{{ route('user.eliminated') }}" class="btn btn-warning"> Usuarios Eliminados</a>
            <br/>
        </div>
    </div>

    @include('users._table')

@endsection

@push('scripts')
<script src="{{ asset('public/js/admin.js') }}"></script>

<script>
    $('#user-table').DataTable({
        "sDom": '<"top"l>rt<"bottom"ip><"clear">',
        processing: true,
        language: {
            "url": '{{ asset('public/js/Spanish.json') }}'
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