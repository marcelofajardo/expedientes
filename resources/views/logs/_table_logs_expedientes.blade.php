<?php
use App\TipoExpediente;
?>
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
      @if ($log->campo != 'slug')
        <tr>
            <td> {{ $log->created_at }} </td>
            @if($log->campo == 'tipo_expediente_id')
              <td>Tipo de Expediente</td>
              <td>
                <?php
                $tipo = TipoExpediente::find($log->valor_anterior);
                echo $tipo['nombre'];
                ?>

              </td>
              <td>
                <?php
                $tipo = TipoExpediente::find($log->valor_nuevo);
                echo $tipo['nombre'];
                ?>
              </td>
            @else
              <td> {{ $log->campo }} </td>
              <td> {{ $log->valor_anterior }} </td>
              <td> {{ $log->valor_nuevo }} </td>
            @endif
            <td> {{ $log->username }} </td>
        </tr>
      @endif
    @endforeach
    </tbody>
</table>
