<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Fecha</th>
       
        <th style="width: 17%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Fecha</th>
        
    </tr>
    </tfoot>
    <tbody>
    @foreach($notificaciones as $notificacion)
        <tr>
            <td> {{ $notificacion->nombre }} </td>
            <td> {{ $notificacion->user->username}} </td>
            <td> {{ $notificacion->created_at->format('d-m-Y') }} </td>
           
            <td>
                @if($action == 'index')
                    <a href="{{ route('notificacion.edit', $notificacion) }}" class="btn btn-info btn-xs pull-rigth">Editar</a>
                    <a href="{{ route('notificacion.show', $notificacion) }}" class="btn btn-primary btn-xs pull-rigth">Visualizar</a>

                    <a href="{{ route('notificacion.delete', $notificacion)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('notificacion.restore', $notificacion) }}"
                       class="btn btn-success btn-xs pull-rigth">Restaurar</a>
                @endif
                  
            </td>
        </tr>
    @endforeach
    </tbody>
</table>