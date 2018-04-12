@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Visualización de Expedientes
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



    <div class="panel panel-success col-sm-12">
        <div class="panel-heading">
            <h3 class="panel-title  text-center">Carátula: <strong>{{ $expediente->caratula }}</strong></h3>
        </div>
        <div class="panel-body">
          <div class="row">
              <div class="col-md-6">
                <h4 class="">Tipo de Expediente: <strong>{{ $expediente->tipoExpediente->nombre }}</strong></h4>
                <h4 class="">Usuario: <strong>{{ $expediente->usuario }}</strong></h4>
              </div>
              <div class="col-md-6">
                <h4 class="">Nombre del Usuario: <strong>{{ $expediente->nombre_usuario }}</strong></h4>
                <h4 class="">Fecha: <strong>{{ $expediente->fecha->format('d-m-Y') }}</strong></h4>
              </div>
          </div>
          <hr />
          <div id="tabs">
              <ul>
                <li><a href="#tabs-1">Nunc tincidunt</a></li>
                <li><a href="#tabs-2">Proin dolor</a></li>
                <li><a href="#tabs-3">Aenean lacinia</a></li>
              </ul>
              <div id="tabs-1">
                <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
              </div>
              <div id="tabs-2">
                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
              </div>
              <div id="tabs-3">
                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
              </div>
            </div>



            @if($logs)
                <h3>Listado de Logs</h3>
                @foreach($logs as $log)
                  {{ $log->username}}
                @endforeach

            @endif

            @if($anexos)
                <h3>Listado de anexos</h3>
                @foreach($anexos as $anexo)
                  <a href="{{ asset($anexo->url . '/' . $anexo->file) }}" target="_blank"><img src="{{ asset($anexo->url . '/' . $anexo->file) }}" width="100" /></a>
                @endforeach

            @endif
        </div>
    </div>
@endsection
