<div class="row">
    <div class="form-group col-md-2 col-sm-12">
        {!! Form::label('fecha', 'Fecha') !!}
        {!! Form::text('fecha', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group col-md-2 col-sm-12">
        {!! Form::label('caratula', 'Caratula') !!}
        {!! Form::text('caratula', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group col-md-6 col-sm-12">
       {!! Form::label('tipo_expediente_id', 'Tipo de Expediente') !!}
        {!! Form::select('tipo_expediente_id', $tipoExpedientes, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
        'id' => 'select_tipo_expediente']) !!}
   </div>

  <div class="form-group col-md-6 col-sm-12">
<hr />
      <input type="file" class="form-control" name="files[]" multiple />
<hr />
  </div>

</div>
<div class="row">
  <hr />
    <div class="form-group col-md-6 col-sm-12">
        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    </div>
</div>


@push('scripts')

<script>

var picker = new Pikaday({ field: document.getElementById('fecha') });
$( document ).ready(function() {
    var calendario = new Pikaday(
    {
      field: document.getElementById('fecha'),
    });

});
</script>
@endpush
