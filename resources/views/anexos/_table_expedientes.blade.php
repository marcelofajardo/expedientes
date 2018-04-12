<table class="table table-striped table-hover" id="table-anexos-expedientes">
    <thead>
    <tr>
        <th>Archivo</th>
        <th>Descripción</th>
        <th>Usuario</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
      <th>Archivo</th>
      <th>Descripción</th>
      <th>Usuario</th>
      <th>Fecha</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($anexos as $anexo)
        <tr>
            <td> <a href="{{ asset($anexo->url . '/' . $anexo->file) }}" class="btn btn-primary btn-xs pull-rigth" target="_blank">{{ $anexo->file }}</a> </td>
            <td> {{ $anexo->descripcion }} </td>
            <td> {{ $anexo->username }} </td>
            <td> {{ $anexo->created_at }} </td>

        </tr>
    @endforeach
    </tbody>
</table>
