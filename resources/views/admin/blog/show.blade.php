<x-layout>
    <x-slot:title>Ver Post</x-slot:title>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary mb-3">
                ← Volver a Posts
            </a>
            <div class="d-flex align-items-center">
                <div class="admin-page-icon me-3">📝</div>
                <div>
                    <h1 class="mb-1">Detalle del Post</h1>
                    <p class="text-muted mb-0">ID: #{{ $post->post_id }}</p>
                </div>
            </div>
        </header>

        <div class="admin-detail-card">
            <div class="admin-detail-header">
                <div>
                    <h2 class="admin-detail-title">{{ $post->title }}</h2>
                    <p class="admin-detail-subtitle">{{ $post->subtitle }}</p>
                </div>
                <div class="admin-detail-actions">
                    <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="admin-action-btn-large admin-action-edit">
                        ✏️ Editar
                    </a>
                    <form method="POST" action="{{ route('admin.blog.destroy', $post->post_id) }}" class="d-inline delete-post-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="admin-action-btn-large admin-action-delete" onclick="handleDeletePost(this)">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>

            @if($post->image)
                <div class="admin-detail-image">
                    @if(str_starts_with($post->image, 'blog_images/'))
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                    @else
                        <img src="{{ url($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                    @endif
                </div>
            @endif

            <div class="admin-detail-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="admin-info-box">
                            <h5 class="admin-info-title">📋 Información del Post</h5>
                            <div class="admin-info-list">
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Categoría:</span>
                                    <span class="admin-badge admin-badge-category">{{ $post->category }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Autor:</span>
                                    <span class="admin-info-value">{{ $post->user->name ?? $post->author }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Fecha de Publicación:</span>
                                    <span class="admin-info-value">{{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : 'No publicada' }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Creado:</span>
                                    <span class="admin-info-value">{{ $post->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Actualizado:</span>
                                    <span class="admin-info-value">{{ $post->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="admin-content-box">
                            <h5 class="admin-info-title">📄 Contenido</h5>
                            <div class="admin-content-text">
                                <p style="white-space: pre-wrap; margin: 0;">{{ $post->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-detail-footer">
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                    ← Volver a la Lista
                </a>
                <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="btn btn-primary">
                    ✏️ Editar Post
                </a>
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

