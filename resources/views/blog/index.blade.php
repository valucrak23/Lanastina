<x-layout>
    <x-slot:title>Blog</x-slot:title>

    <!-- Hero Section -->
    <section class="hero-section hero-blog">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">📚 Aprende y Crea 📚</div>
            <h1 class="hero-title">Blog de Crochet</h1>
            <p class="hero-subtitle">Consejos, tutoriales y novedades del mundo del tejido</p>
            <div class="hero-decorations">
                <span class="hero-icon">📝</span>
                <span class="hero-icon">✨</span>
                <span class="hero-icon">🎓</span>
            </div>
        </div>
    </section>

    <!-- Listado de Posts -->
    <section class="blog-posts-section">
        <div class="container">
            <div class="blog-posts-grid">
                @forelse($posts as $post)
                    <article class="blog-card-accordion">
                        <div class="blog-card-header-accordion" onclick="toggleBlogAccordion({{ $post->post_id }})">
                            @if($post->image)
                                <div class="blog-card-image-small">
                                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                </div>
                            @endif
                            <div class="blog-card-header-content">
                                <h2 class="blog-card-title">{{ $post->title }}</h2>
                                <p class="blog-card-subtitle">{{ $post->subtitle }}</p>
                                <div class="blog-card-meta">
                                    <span class="blog-author">Por {{ $post->user->name ?? $post->author }}</span>
                                    <span class="blog-date">{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada' }}</span>
                                    <span class="blog-category-badge">{{ $post->category }}</span>
                                </div>
                            </div>
                            <button class="blog-accordion-toggle" id="toggle-{{ $post->post_id }}">
                                <span class="toggle-icon">▼</span>
                            </button>
                        </div>
                        
                        <div class="blog-card-body-accordion" id="content-{{ $post->post_id }}">
                            <div class="blog-card-expanded-content">
                                @if($post->image)
                                    <div class="blog-expanded-image mb-4">
                                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded">
                                    </div>
                                @endif
                                <div class="blog-full-content">
                                    <p class="blog-content-text">{{ $post->content }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                <div class="empty-state text-center py-5">
                    <div class="empty-icon mb-3">📝✨</div>
                    <h3 class="mb-3">¡Estamos tejiendo nuevas historias!</h3>
                    <p class="empty-message">
                        Pronto compartiremos tutoriales, consejos y novedades sobre el maravilloso mundo del crochet.
                        Mantente atenta para no perderte nuestros artículos.
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layout>

<script>
    function toggleBlogAccordion(postId) {
        const content = document.getElementById('content-' + postId);
        const toggle = document.getElementById('toggle-' + postId);
        const icon = toggle.querySelector('.toggle-icon');
        
        if (content.classList.contains('expanded')) {
            content.classList.remove('expanded');
            icon.textContent = '▼';
        } else {
            content.classList.add('expanded');
            icon.textContent = '▲';
        }
    }
</script>

