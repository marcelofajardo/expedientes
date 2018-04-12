<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Expediente</th>
        <th>Campo</th>
        <th>Valor Anterior</th>
        <th>Valor Nuevo</th>
        <th>Usuario</th>


        <th style="width: 17%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
      <th>Fecha</th>
      <th>Expediente</th>
      <th>Campo</th>
      <th>Valor Anterior</th>
      <th>Valor Nuevo</th>
      <th>Usuario</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($logs as $log)
        <tr>
            <td> {{ $log->created_at->format('d/m/Y H:i:s') }} </td>
            @if ($log->expediente)
            <td> {{ $log->expediente->caratula }} </td>
            @else
            <td></td>
            @endif
            <td> {{ $log->campo }} </td>
            <td> {{ $log->valor_anterior }} </td>
            <td> {{ $log->valor_nuevo }} </td>
            <td> {{ $log->username }} </td>
            <td>
                @if($action == 'index')
                    
                    <a href="{{ route('log.delete', $log)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('log.restore', $log) }}" class="btn btn-danger btn-xs">Restaurar</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
