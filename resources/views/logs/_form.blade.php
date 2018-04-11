<div class="row">
    <div class="form-group col-md-3 col-sm-12">
        {!! Form::label('campo', 'Campo') !!}
        {!! Form::text('campo', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group col-md-3 col-sm-12">
       {!! Form::label('expediente_id', 'Expediente') !!}
        {!! Form::select('expediente_id', $expedientes, null, ['placeholder'=>'Seleccione', 'class' => 'form-control',
        'id' => 'select_expediente']) !!}
   </div>

    <div class="form-group col-md-3 col-sm-12">
        {!! Form::label('valor_anterior', 'Valor Anterior') !!}
        {!! Form::text('valor_anterior', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group col-md-3 col-sm-12">
        {!! Form::label('valor_nuevo', 'Valor Nuevo') !!}
        {!! Form::text('valor_nuevo', null, ['class' => 'form-control', 'required']) !!}
    </div>

</div>
<div class="row">
    <div class="form-group col-md-6 col-sm-12">
        {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    </div>
</div>

@push('scripts')

<script>


$( document ).ready(function() {
    $("#select_expediente").select2({
        maximumSelectionLength: 1,
        tags: false,
        placeholder: "Seleccione",
        allowClear: false,
        multiple: false
    });
});
</script>
@endpush
