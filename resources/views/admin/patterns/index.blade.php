<x-layout>
    <x-slot:title>Gestión de Patrones</x-slot:title>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="admin-page-icon me-3">🧶</div>
                <div>
                    <h1 class="mb-1">Gestión de Patrones</h1>
                    <p class="text-muted mb-0">Administra los patrones de crochet</p>
                </div>
            </div>
            <div class="admin-page-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">
                    ← Dashboard
                </a>
                <a href="{{ route('admin.patterns.create') }}" class="btn btn-primary">
                    ✨ Nuevo Patrón
                </a>
            </div>
        </header>

        <div class="admin-table-card">
            <div class="admin-table-header">
                <h5 class="mb-0">Listado de Patrones ({{ $patterns->count() }})</h5>
            </div>
            <div class="admin-table-body">
                @if($patterns->count() > 0)
                    <div class="table-responsive">
                        <table class="table admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Dificultad</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patterns as $pattern)
                                    <tr>
                                        <td><span class="admin-table-id">#{{ $pattern->pattern_id }}</span></td>
                                        <td>
                                            @if($pattern->image)
                                                @if(str_starts_with($pattern->image, 'pattern_images/'))
                                                    <img src="{{ Storage::url($pattern->image) }}" alt="{{ $pattern->name }}" class="admin-table-img">
                                                @else
                                                    <img src="{{ url($pattern->image) }}" alt="{{ $pattern->name }}" class="admin-table-img">
                                                @endif
                                            @else
                                                <span class="admin-table-no-img">📷</span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $pattern->name }}</strong></td>
                                        <td><span class="admin-badge admin-badge-category">{{ $pattern->category }}</span></td>
                                        <td>
                                            <span class="admin-badge admin-badge-difficulty admin-badge-{{ strtolower($pattern->difficulty) }}">
                                                {{ $pattern->difficulty }}
                                            </span>
                                        </td>
                                        <td><strong class="admin-price">${{ number_format($pattern->price, 2) }}</strong></td>
                                        <td>
                                            <div class="admin-action-buttons">
                                                <a href="{{ route('admin.patterns.show', $pattern->pattern_id) }}" class="admin-action-btn admin-action-view" title="Ver">
                                                    👁️
                                                </a>
                                                <a href="{{ route('admin.patterns.edit', $pattern->pattern_id) }}" class="admin-action-btn admin-action-edit" title="Editar">
                                                    ✏️
                                                </a>
                                                <form method="POST" action="{{ route('admin.patterns.destroy', $pattern->pattern_id) }}" class="d-inline delete-pattern-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="admin-action-btn admin-action-delete" onclick="handleDeletePattern(this)" title="Eliminar">
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
                        {{ $patterns->links() }}
                    </div>
                @else
                    <div class="admin-empty-state-large">
                        <div class="admin-empty-icon-large">🧶</div>
                        <h4>No hay patrones aún</h4>
                        <p class="text-muted">Comienza creando tu primer patrón</p>
                        <a href="{{ route('admin.patterns.create') }}" class="btn btn-primary">
                            ✨ Crear el primero
                        </a>
                    </div>
                @endif
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

