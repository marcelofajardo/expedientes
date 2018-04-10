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
    @foreach($tasks as $task)
        <tr>
            <td> {{ $task->nombre }} </td>
            <td> {{ $task->user->username}} </td>
            <td> {{ $task->created_at->format('d-m-Y') }} </td>
           
            <td>
                @if($action == 'index')
                    <a href="{{ route('task.edit', $task) }}" class="btn btn-warning btn-xs">Editar</a>

                    <a href="{{ route('task.show', $task) }}" class="btn btn-primary btn-xs pull-rigth">Visualizar</a>

                    <a href="{{ route('task.delete', $task)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('task.restore', $task) }}" class="btn btn-danger btn-xs">Restaurar</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>