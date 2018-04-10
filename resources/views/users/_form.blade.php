<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'minlength' =>'4', 'maxlength' =>'100']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('documento', 'D.N.I.') !!}
        {!! Form::text('documento', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('username', 'Username') !!}
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('rol_id', 'Rol') !!}
        {!! Form::select('rol_id', $roles, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
         'id' => 'select_roles']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('uep_id', 'UEP') !!}
        {!! Form::select('uep_id', $ueps, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
         'id' => 'select_ueps']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('password', 'Password') !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('password', 'Password') !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-md-4 col-sm-12">
        {!! Form::label('estado', 'Estado') !!}
        {!! Form::text('estado', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="row">
    <div class="form-group col-md-6 col-sm-12">
        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    </div>
</div>