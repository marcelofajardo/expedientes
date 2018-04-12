<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Fecha</th>
        <th>Carátula</th>
        <th>Tipo Expediente</th>

        <th style="width: 17%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
      <th>Fecha</th>
      <th>Carátula</th>
      <th>Tipo Expediente</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($expedientes as $ex)
        <tr>
            <td> {{ $ex->fecha->format('d/m/Y H:i:s') }} </td>
            <td> {{ $ex->caratula }} </td>
            @if ($ex->tipoexpediente)
            <td> {{ $ex->tipoexpediente->nombre }} </td>
            @else
            <td></td>
            @endif
            <td>
                @if($action == 'index')
                    <a href="{{ route('expediente.show', $ex) }}" class="btn btn-primary btn-xs pull-rigth">Visualizar</a>
                    <a href="{{ route('expediente.edit', $ex) }}" class="btn btn-warning btn-xs">Editar</a>
                    <a href="{{ route('expediente.delete', $ex)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('expediente.restore', $ex) }}" class="btn btn-danger btn-xs">Restaurar</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
