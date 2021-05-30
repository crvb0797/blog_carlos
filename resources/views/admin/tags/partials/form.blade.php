<div class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta...']) !!}                  
    {{-- Error de validación --}}
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug')!!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Se generara el slug de la etiqueta...','readonly']) !!}
    {{-- Error de validación --}}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('color', 'Color')!!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

    {{-- Error de validación --}}
    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div> 