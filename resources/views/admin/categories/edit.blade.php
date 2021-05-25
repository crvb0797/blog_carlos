@extends('adminlte::page')

@section('title', 'Carlos Blog')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    {{-- MENSAJE DE SESIÓN --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    {{-- /MENSAJE DE SESIÓN --}}

    <div class="card">
        <div class="card-body">
            {!! Form::model($categoria, ['route' => ['admin.categories.update', $categoria], 'method' => 'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}

                    {{-- Error de validación --}}
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Generar slug de la categoría', 'readonly']) !!}

                    {{-- Error de validación --}}
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {!! Form::submit('Editar categoría', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3.0/jquery.stringtoslug.min.js') }}"></script>
    <script>
    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
    </script>
@stop