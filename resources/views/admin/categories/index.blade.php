@extends('adminlte::page')

@section('title', 'Carlos Blog')

@section('content_header')
    <h1>Lista de categorías</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary">Crear categoría</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th class="colspan=2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a class="btn btn-warning btn-sm" href="{{ route('admin.categories.edit', $category) }}">editar</a>
                            </td>
                            <td width="10px">
                                <form class="formulario-eliminar" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')

    @if (session('eliminar')== 'ok')
        <script>
            Swal.fire(
            '¡Eliminada!',
            'La categoría se a eliminado con exíto.',
            'success')
        </script>
    @endif

   <script>
       $(".formulario-eliminar").submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Seguro desea eliminar la categoría?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar categoría!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
       })
   </script>
@stop
