<div class="card">
    <div class="card-header">
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre del post a buscar...">
        </div>
    </div>
    
    @if ($posts->count())
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
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td width='10px'>
                                    <a class="btn btn-warning btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                                </td>
                                <td width='10px'>
                                    <form class="formulario-eliminar" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
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

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningun registro..</strong>
        </div>
    @endif

</div>
