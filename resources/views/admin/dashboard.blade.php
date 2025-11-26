<x-layout>
    <x-slot:title>Panel de Administración</x-slot:title>

    <section class="container my-5">
        <header class="mb-5">
            <div class="d-flex align-items-center mb-3">
                <div class="admin-header-icon me-3">👑</div>
                <div>
                    <h1 class="mb-1">Panel de Administración</h1>
                    <p class="text-muted mb-0">Bienvenido, <strong>{{ auth()->user()->name }}</strong></p>
                </div>
            </div>
        </header>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="admin-stat-card admin-stat-card-users">
                    <div class="admin-stat-icon">👥</div>
                    <div class="admin-stat-content">
                        <h5 class="admin-stat-label">Usuarios Registrados</h5>
                        <h2 class="admin-stat-number">{{ $usersCount }}</h2>
                        <a href="{{ route('admin.users') }}" class="admin-stat-link">
                            Ver todos <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-stat-card admin-stat-card-blog">
                    <div class="admin-stat-icon">📝</div>
                    <div class="admin-stat-content">
                        <h5 class="admin-stat-label">Posts del Blog</h5>
                        <h2 class="admin-stat-number">{{ $postsCount }}</h2>
                        <a href="{{ route('admin.blog.index') }}" class="admin-stat-link">
                            Gestionar posts <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-stat-card admin-stat-card-patterns">
                    <div class="admin-stat-icon">🧶</div>
                    <div class="admin-stat-content">
                        <h5 class="admin-stat-label">Patrones</h5>
                        <h2 class="admin-stat-number">{{ $patternsCount }}</h2>
                        <a href="{{ route('admin.patterns.index') }}" class="admin-stat-link">
                            Gestionar patrones <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="admin-recent-card">
                    <div class="admin-recent-header">
                        <h5 class="mb-0">📝 Posts Recientes</h5>
                        <a href="{{ route('admin.blog.index') }}" class="admin-recent-link">Ver todos</a>
                    </div>
                    <div class="admin-recent-body">
                        @if($recentPosts->count() > 0)
                            <div class="admin-recent-list">
                                @foreach($recentPosts as $post)
                                    <div class="admin-recent-item">
                                        <div class="admin-recent-item-content">
                                            <div class="admin-recent-item-title">{{ $post->title }}</div>
                                            <small class="admin-recent-item-date">{{ $post->created_at->format('d/m/Y') }}</small>
                                        </div>
                                        <a href="{{ route('admin.blog.edit', $post->post_id) }}" class="admin-recent-item-btn">
                                            ✏️ Editar
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="admin-empty-state">
                                <span class="admin-empty-icon">📝</span>
                                <p class="mb-0">No hay posts aún.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="admin-recent-card">
                    <div class="admin-recent-header">
                        <h5 class="mb-0">👥 Usuarios Recientes</h5>
                        <a href="{{ route('admin.users') }}" class="admin-recent-link">Ver todos</a>
                    </div>
                    <div class="admin-recent-body">
                        @if($recentUsers->count() > 0)
                            <div class="admin-recent-list">
                                @foreach($recentUsers as $user)
                                    <div class="admin-recent-item">
                                        <div class="admin-recent-item-content">
                                            <div class="admin-recent-item-title">{{ $user->name }}</div>
                                            <small class="admin-recent-item-date">{{ $user->email }} • {{ $user->role }}</small>
                                        </div>
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="admin-recent-item-btn">
                                            👁️ Ver
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="admin-empty-state">
                                <span class="admin-empty-icon">👥</span>
                                <p class="mb-0">No hay usuarios aún.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

