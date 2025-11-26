<x-layout>
    <x-slot:title>Crear Nuevo Post</x-slot:title>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary mb-3">
                ← Volver a Posts
            </a>
            <div class="d-flex align-items-center">
                <div class="admin-page-icon me-3">✨</div>
                <div>
                    <h1 class="mb-1">Crear Nuevo Post del Blog</h1>
                    <p class="text-muted mb-0">Completa el formulario para crear un nuevo post</p>
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

                <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
                               required 
                               maxlength="200">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 200 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtítulo <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('subtitle') is-invalid @enderror" 
                               id="subtitle" 
                               name="subtitle" 
                               value="{{ old('subtitle') }}" 
                               required 
                               maxlength="255">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 255 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Contenido <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" 
                                  name="content" 
                                  rows="10" 
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoría <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('category') is-invalid @enderror" 
                               id="category" 
                               name="category" 
                               value="{{ old('category') }}" 
                               required 
                               maxlength="100">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 100 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen</label>
                        <input type="file" 
                               class="form-control @error('image') is-invalid @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/jpeg,image/png,image/jpg,image/gif">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Formatos permitidos: JPEG, PNG, JPG, GIF. Tamaño máximo: 2MB</small>
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Fecha de Publicación</label>
                        <input type="datetime-local" 
                               class="form-control @error('published_at') is-invalid @enderror" 
                               id="published_at" 
                               name="published_at" 
                               value="{{ old('published_at') }}">
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Si se deja vacío, se usará la fecha actual</small>
                    </div>

                    <div class="admin-form-footer">
                        <button type="submit" class="btn btn-primary">
                            ✨ Crear Post
                        </button>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout>

