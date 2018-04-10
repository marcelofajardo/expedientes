<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Nombre</th>

        <th style="width: 17%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Nombre</th>

    </tr>
    </tfoot>
    <tbody>
    @foreach($tiposExpedientes as $te)
        <tr>
            <td> {{ $te->nombre }} </td>

            <td>
                @if($action == 'index')
                    <a href="{{ route('tipoexpediente.edit', $te) }}" class="btn btn-warning btn-xs">Editar</a>
                    <a href="{{ route('tipoexpediente.delete', $te)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('tipoexpediente.restore', $te) }}" class="btn btn-danger btn-xs">Restaurar</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
