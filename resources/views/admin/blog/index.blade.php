<x-layout>
    <x-slot:title>Gestión de Blog</x-slot:title>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="admin-page-icon me-3">📝</div>
                <div>
                    <h1 class="mb-1">Gestión de Posts del Blog</h1>
                    <p class="text-muted mb-0">Administra las entradas del blog</p>
                </div>
            </div>
            <div class="admin-page-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
                    ← Dashboard
                </a>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                    ✨ Nuevo Post
                </a>
            </div>
        </header>

        <div class="admin-table-card">
            <div class="admin-table-header">
                <h5 class="mb-0">Listado de Posts ({{ $posts->count() }})</h5>
            </div>
            <div class="admin-table-body">
                @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Título</th>
                                    <th>Categoría</th>
                                    <th>Autor</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><span class="admin-table-id">#{{ $post->post_id }}</span></td>
                                        <td>
                                            @if($post->image)
                                                @if(str_starts_with($post->image, 'blog_images/'))
                                                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="admin-table-img">
                                                @else
                                                    <img src="{{ url($post->image) }}" alt="{{ $post->title }}" class="admin-table-img">
                                                @endif
                                            @else
                                                <span class="admin-table-no-img">📷</span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $post->title }}</strong></td>
                                        <td><span class="admin-badge admin-badge-category">{{ $post->category }}</span></td>
                                        <td>{{ $post->user->name ?? $post->author }}</td>
                                        <td><small class="text-muted">{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada' }}</small></td>
                                        <td>
                                            <div class="admin-action-buttons">
                                                <a href="{{ route('admin.blog.show', $post->post_id) }}" class="admin-action-btn admin-action-view" title="Ver">
                                                    👁️
                                                </a>
                                                <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="admin-action-btn admin-action-edit" title="Editar">
                                                    ✏️
                                                </a>
                                                <form method="POST" action="{{ route('admin.blog.destroy', $post->post_id) }}" class="d-inline delete-post-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="admin-action-btn admin-action-delete" onclick="handleDeletePost(this)" title="Eliminar">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="admin-pagination">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="admin-empty-state-large">
                        <div class="admin-empty-icon-large">📝</div>
                        <h4>No hay posts del blog aún</h4>
                        <p class="text-muted">Comienza creando tu primer post</p>
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                            ✨ Crear el primero
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-layout>

<script>
    function handleDeletePost(button) {
        confirmAction('¿Estás seguro de que deseas eliminar este post?', function(confirmed) {
            if (confirmed) {
                button.closest('.delete-post-form').submit();
            }
        });
    }
</script>

