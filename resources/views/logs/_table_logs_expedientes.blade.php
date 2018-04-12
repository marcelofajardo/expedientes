<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Campo</th>
        <th>Valor Anterior</th>
        <th>Valor Nuevo</th>
        <th>Usuario</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
      <th>Fecha</th>
      <th>Campo</th>
      <th>Valor Anterior</th>
      <th>Valor Nuevo</th>
      <th>Usuario</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td> {{ $log->created_at }} </td>
            <td> {{ $log->campo }} </td>
            <td> {{ $log->valor_anterior }} </td>
            <td> {{ $log->valor_nuevo }} </td>
            <td> {{ $log->username }} </td>
        </tr>
    @endforeach
    </tbody>
</table>
