<x-layout>
    <x-slot:title>Editar Patrón</x-slot:title>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <a href="{{ route('admin.patterns.index') }}" class="btn btn-outline-secondary mb-3">
                ← Volver a Patrones
            </a>
            <div class="d-flex align-items-center">
                <div class="admin-page-icon me-3">✏️</div>
                <div>
                    <h1 class="mb-1">Editar Patrón</h1>
                    <p class="text-muted mb-0">ID: #{{ $pattern->pattern_id }}</p>
                </div>
            </div>
        </header>

        <div class="admin-form-card">
            <div class="admin-form-body">
                @if ($errors->any())
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            @foreach ($errors->all() as $error)
                                showNotification('{{ $error }}', 'error');
                            @endforeach
                        });
                    </script>
                @endif

                <form method="POST" action="{{ route('admin.patterns.update', $pattern->pattern_id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $pattern->name) }}" 
                               required 
                               maxlength="150">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 150 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="5" 
                                  required>{{ old('description', $pattern->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Precio <span class="text-danger">*</span></label>
                            <input type="number" 
                                   step="0.01" 
                                   min="0"
                                   class="form-control @error('price') is-invalid @enderror" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price', $pattern->price) }}" 
                                   required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="difficulty" class="form-label">Dificultad <span class="text-danger">*</span></label>
                            <select class="form-select @error('difficulty') is-invalid @enderror" 
                                    id="difficulty" 
                                    name="difficulty" 
                                    required>
                                <option value="">Seleccionar...</option>
                                <option value="Principiante" {{ old('difficulty', $pattern->difficulty) == 'Principiante' ? 'selected' : '' }}>Principiante</option>
                                <option value="Intermedio" {{ old('difficulty', $pattern->difficulty) == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                                <option value="Avanzado" {{ old('difficulty', $pattern->difficulty) == 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
                            </select>
                            @error('difficulty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoría <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('category') is-invalid @enderror" 
                               id="category" 
                               name="category" 
                               value="{{ old('category', $pattern->category) }}" 
                               required 
                               maxlength="100">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 100 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen</label>
                        @if($pattern->image)
                            <div class="mb-2">
                                <p class="mb-1">Imagen actual:</p>
                                @if(str_starts_with($pattern->image, 'pattern_images/'))
                                    <img src="{{ Storage::url($pattern->image) }}" alt="{{ $pattern->name }}" style="max-width: 200px; max-height: 200px; object-fit: cover;" class="img-thumbnail">
                                @else
                                    <img src="{{ url($pattern->image) }}" alt="{{ $pattern->name }}" style="max-width: 200px; max-height: 200px; object-fit: cover;" class="img-thumbnail">
                                @endif
                            </div>
                        @endif
                        <input type="file" 
                               class="form-control @error('image') is-invalid @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/jpeg,image/png,image/jpg,image/gif">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Formatos permitidos: JPEG, PNG, JPG, GIF. Tamaño máximo: 2MB. Dejar vacío para mantener la imagen actual.</small>
                    </div>

                    <div class="admin-form-footer">
                        <button type="submit" class="btn btn-primary">
                            💾 Actualizar Patrón
                        </button>
                        <a href="{{ route('admin.patterns.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>

