<x-layout>
    <x-slot:title>Gestión de Blog</x-slot:title>

    <section class="container my-5">
        <header class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1>Gestión de Posts del Blog</h1>
                <p class="text-muted">Administra las entradas del blog</p>
            </div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
                    Volver al Dashboard
                </a>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                    + Nuevo Post
                </a>
            </div>
        </header>

        <div class="card">
            <div class="card-body">
                @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Categoría</th>
                                    <th>Autor</th>
                                    <th>Fecha de Publicación</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->post_id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category }}</td>
                                        <td>{{ $post->user->name ?? $post->author }}</td>
                                        <td>{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada' }}</td>
                                        <td>
                                            @if($post->image)
                                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" style="max-width: 50px; max-height: 50px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">Sin imagen</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.blog.show', $post->post_id) }}" class="btn btn-sm btn-outline-info">
                                                    Ver
                                                </a>
                                                <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="btn btn-sm btn-outline-primary">
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('admin.blog.destroy', $post->post_id) }}" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links() }}
                    </div>
                @else
                    <p class="text-muted text-center py-4">No hay posts del blog aún. 
                        <a href="{{ route('admin.blog.create') }}">Crear el primero</a>
                    </p>
                @endif
            </div>
        </div>
    </section>
</x-layout>

