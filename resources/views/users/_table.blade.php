<table class="table table-striped table-hover" id="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>E-mail</th>
        <th>Username</th>
        
        
        <th style="width: 17%">Opciones</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>E-mail</th>
        <th>Username</th>
        
    </tr>
    </tfoot>
    <tbody>

    @foreach($users as $user)
        <tr>
            <td> {{ $user->nombre }} </td>
            <td> {{ $user->email }} </td>
            <td> {{ $user->username }} </td>
            
            <td>
                @if($action == 'index')
                    <a href="{{ route('user.show', $user) }}" class="btn btn-info btn-xs">Ver</a>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-xs">Editar</a>
                    <a href="{{ route('user.delete', $user)}}" class="btn btn-danger btn-xs pull-rigth" onclick="return confirm('Está seguro que desea eliminar este ítem?')"
    class="btn btn-danger">Eliminar</a>
                @else
                    <a href="{{ route('user.restore', $user) }}" class="btn btn-danger btn-xs">Republicar</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>