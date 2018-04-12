<div class="row">

    <div class="form-group col-md-6 col-sm-12">
       {!! Form::label('expediente_id', 'Expediente') !!}
        {!! Form::select('expediente_id', $expedientes, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
        'id' => 'select_expediente']) !!}
   </div>

   <div class="form-group col-md-6 col-sm-12">
      {!! Form::label('clasificacion_id', 'Clasificación') !!}
       {!! Form::select('clasificacion_id', $clasificacionAnexo, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
       'id' => 'select_clasificacion_anexo']) !!}
  </div>
  <div class="form-group col-md-6 col-sm-12">
      {!! Form::label('descripcion', 'Descripcion') !!}
      {!! Form::text('descripcion', null, ['class' => 'form-control', 'required']) !!}
  </div>
  <div class="form-group col-md-12 col-sm-12">
      <hr />
      <input type="file" class="form-control" name="files[]" multiple />
      <hr />
  </div>
</div>
<div class="row">
    <div class="form-group col-md-6 col-sm-12">
        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    </div>
</div>
