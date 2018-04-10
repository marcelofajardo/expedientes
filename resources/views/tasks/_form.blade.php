<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'100']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('descripcion', 'Descripción') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'100']) !!}
    </div>
    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('user_id', 'Usuario Destino') !!}
        {!! Form::select('user_id', $usuarios, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
         'id' => 'select_usuarios']) !!}
    </div>

    <input type="checkbox" data-toggle="toggle" data-on="SI" data-off="NO" name="activa" id="activa" >


</div>
<div class="row">
    <div class="form-group col-md-6 col-sm-12">
        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    </div>
</div>
