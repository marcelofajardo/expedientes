<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Archivo</th>
        <th>Descripción</th>
        <th>Usuario</th>
        <th>Fecha</th>

        <th style="width: 17%">Opciones</th>
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

            <td> {{ $anexo->file }} </td>
            <td> {{ $anexo->descripcion }} </td>
            <td> {{ $anexo->usuario }} </td>
            <td> {{ $anexo->created_at->format('d/m/Y H:i:s') }} </td>
            <td>
                @if($action == 'index')
                    <a href="{{ route('anexo.show', $anexo) }}" class="btn btn-primary btn-xs pull-rigth">Visualizar</a>
                    <a href="{{ route('anexo.edit', $anexo) }}" class="btn btn-warning btn-xs">Editar</a>
                    <a href="{{ route('anexo.delete', $anexo)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('anexo.restore', $anexo) }}" class="btn btn-danger btn-xs">Restaurar</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
