<x-layout>
    <x-slot:title>Ver Post</x-slot:title>

    <section class="container my-5">
        <header class="mb-4">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary mb-3">
                ← Volver a Posts
            </a>
            <h1>Detalle del Post</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-8">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="text-muted lead">{{ $post->subtitle }}</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="btn btn-primary">
                                Editar
                            </a>
                            <form method="POST" action="{{ route('admin.blog.destroy', $post->post_id) }}" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @if($post->image)
                    <div class="mb-4">
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                    </div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Información del Post</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">ID:</th>
                                <td>{{ $post->post_id }}</td>
                            </tr>
                            <tr>
                                <th>Categoría:</th>
                                <td>{{ $post->category }}</td>
                            </tr>
                            <tr>
                                <th>Autor:</th>
                                <td>{{ $post->user->name ?? $post->author }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de Publicación:</th>
                                <td>{{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : 'No publicada' }}</td>
                            </tr>
                            <tr>
                                <th>Creado:</th>
                                <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Última Actualización:</th>
                                <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Contenido</h5>
                    <div class="border p-3 bg-light rounded">
                        <p style="white-space: pre-wrap;">{{ $post->content }}</p>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                        Volver a la Lista
                    </a>
                    <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="btn btn-primary">
                        Editar Post
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>

