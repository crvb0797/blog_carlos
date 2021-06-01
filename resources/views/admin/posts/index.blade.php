@extends('adminlte::page')

@section('title', 'Carlos Blog')

@section('content_header')

    {{-- BOTON PARA CREAR UN NUEVO POST --}}
        <a class="btn btn-secondary  float-right" href="{{ route('admin.posts.create') }}">Nuevo post</a>
    {{-- /BOTON PARA CREAR UN NUEVO POST --}}

    <h1>Listado de post</h1>
@stop
    
@section('content')
   @livewire('admin.posts-index')
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