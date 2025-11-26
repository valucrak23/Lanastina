<x-layout>
    <x-slot:title>Editar Post</x-slot:title>

    <section class="container my-5">
        <header class="mb-4">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary mb-3">
                ← Volver a Posts
            </a>
            <h1>Editar Post del Blog</h1>
        </header>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.blog.update', $post->post_id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $post->title) }}" 
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
                               value="{{ old('subtitle', $post->subtitle) }}" 
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
                                  required>{{ old('content', $post->content) }}</textarea>
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
                               value="{{ old('category', $post->category) }}" 
                               required 
                               maxlength="100">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo 100 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen</label>
                        @if($post->image)
                            <div class="mb-2">
                                <p class="mb-1">Imagen actual:</p>
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" style="max-width: 200px; max-height: 200px; object-fit: cover;" class="img-thumbnail">
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

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Fecha de Publicación</label>
                        <input type="datetime-local" 
                               class="form-control @error('published_at') is-invalid @enderror" 
                               id="published_at" 
                               name="published_at" 
                               value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Actualizar Post
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

