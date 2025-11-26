<x-layout>
    <x-slot:title>Panel de Administración</x-slot:title>

    <section class="container my-5">
        <header class="mb-4">
            <h1>Panel de Administración</h1>
            <p class="text-muted">Bienvenido, {{ auth()->user()->name }}</p>
        </header>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios Registrados</h5>
                        <h2 class="display-4">{{ $usersCount }}</h2>
                        <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary">
                            Ver todos los usuarios
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Posts del Blog</h5>
                        <h2 class="display-4">{{ $postsCount }}</h2>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-outline-primary">
                            Gestionar posts
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Posts Recientes</h5>
                    </div>
                    <div class="card-body">
                        @if($recentPosts->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($recentPosts as $post)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $post->title }}</div>
                                            <small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small>
                                        </div>
                                        <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="btn btn-sm btn-outline-secondary">
                                            Editar
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted mb-0">No hay posts aún.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Usuarios Recientes</h5>
                    </div>
                    <div class="card-body">
                        @if($recentUsers->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($recentUsers as $user)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">{{ $user->name }}</div>
                                            <small class="text-muted">{{ $user->email }} - {{ $user->role }}</small>
                                        </div>
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-secondary">
                                            Ver
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted mb-0">No hay usuarios aún.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

