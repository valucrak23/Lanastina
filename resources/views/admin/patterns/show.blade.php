<x-layout>
    <x-slot:title>Detalle del Patrón</x-slot:title>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <a href="{{ route('admin.patterns.index') }}" class="btn btn-outline-secondary mb-3">
                ← Volver a Patrones
            </a>
            <div class="d-flex align-items-center">
                <div class="admin-page-icon me-3">🧶</div>
                <div>
                    <h1 class="mb-1">Detalle del Patrón</h1>
                    <p class="text-muted mb-0">ID: #{{ $pattern->pattern_id }}</p>
                </div>
            </div>
        </header>

        <div class="admin-detail-card">
            <div class="admin-detail-header">
                <div>
                    <h2 class="admin-detail-title">{{ $pattern->name }}</h2>
                    <p class="admin-detail-subtitle">{{ $pattern->description }}</p>
                </div>
                <div class="admin-detail-actions">
                    <a href="{{ route('admin.patterns.edit', $pattern->pattern_id) }}" class="admin-action-btn-large admin-action-edit">
                        ✏️ Editar
                    </a>
                    <form method="POST" action="{{ route('admin.patterns.destroy', $pattern->pattern_id) }}" class="d-inline delete-pattern-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="admin-action-btn-large admin-action-delete" onclick="handleDeletePattern(this)">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>

            <div class="admin-detail-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="admin-image-box">
                            @if($pattern->image)
                                @if(str_starts_with($pattern->image, 'pattern_images/'))
                                    <img src="{{ Storage::url($pattern->image) }}" alt="{{ $pattern->name }}" class="img-fluid">
                                @else
                                    <img src="{{ url($pattern->image) }}" alt="{{ $pattern->name }}" class="img-fluid">
                                @endif
                            @else
                                <div class="admin-no-image">
                                    <span class="admin-no-image-icon">📷</span>
                                    <p class="mb-0">Sin imagen</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="admin-info-box">
                            <h5 class="admin-info-title">📋 Información del Patrón</h5>
                            <div class="admin-info-list">
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Categoría:</span>
                                    <span class="admin-badge admin-badge-category">{{ $pattern->category }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Dificultad:</span>
                                    <span class="admin-badge admin-badge-difficulty admin-badge-{{ strtolower($pattern->difficulty) }}">
                                        {{ $pattern->difficulty }}
                                    </span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Precio:</span>
                                    <span class="admin-price-large">${{ number_format($pattern->price, 2) }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Creado:</span>
                                    <span class="admin-info-value">{{ $pattern->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Actualizado:</span>
                                    <span class="admin-info-value">{{ $pattern->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-detail-footer">
                <a href="{{ route('admin.patterns.index') }}" class="btn btn-outline-secondary">
                    ← Volver a la Lista
                </a>
                <a href="{{ route('admin.patterns.edit', $pattern->pattern_id) }}" class="btn btn-primary">
                    ✏️ Editar Patrón
                </a>
            </div>
        </div>
    </section>
</x-layout>

<script>
    function handleDeletePattern(button) {
        confirmAction('¿Estás seguro de que deseas eliminar este patrón?', function(confirmed) {
            if (confirmed) {
                button.closest('.delete-pattern-form').submit();
            }
        });
    }
</script>

