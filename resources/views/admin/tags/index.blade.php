@extends('adminlte::page')

@section('title', 'Carlos Blog')

@section('content_header')
    <h1>Listado de etiquetas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary">Crear etiqueta</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px"><a class="btn btn-warning btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a></td>
                            <td width="10px">
                                <form class="formulario-eliminar" action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

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
    'La etiqueta se a eliminado con exíto.',
    'success')
</script>
@endif

<script>
$(".formulario-eliminar").submit(function(e){
    e.preventDefault();

    Swal.fire({
    title: '¿Seguro desea eliminar la etiqueta?',
    text: "¡No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar etiqueta!',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
        this.submit();
    }
    })
})
</script>
@stop