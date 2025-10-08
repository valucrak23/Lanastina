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
            @forelse($posts as $post)
                <article class="blog-card blog-card-clickable" data-post-id="{{ $post->post_id }}">
                    <header class="blog-card-header">
                        <h2 class="blog-card-title">{{ $post->title }}</h2>
                        <p class="blog-card-subtitle">{{ $post->subtitle }}</p>
                        <div class="blog-card-meta">
                            Por {{ $post->author }} • {{ $post->published_at->format('d/m/Y') }}
                        </div>
                    </header>
                    
                    <div class="blog-card-body">
                        <div class="blog-card-content blog-card-preview">
                            {{ Str::limit($post->content, 200) }}
                        </div>
                        
                        <span class="blog-category">{{ $post->category }}</span>
                        
                        <button class="btn-read-more" onclick="openBlogModal({{ $post->post_id }})">
                            Leer más →
                        </button>
                    </div>
                    
                    <!-- Contenido completo (oculto) -->
                    <div class="blog-full-content" id="content-{{ $post->post_id }}" style="display: none;">
                        <h2>{{ $post->title }}</h2>
                        <p class="subtitle">{{ $post->subtitle }}</p>
                        <p class="meta">Por {{ $post->author }} • {{ $post->published_at->format('d/m/Y') }}</p>
                        <div class="content">{{ $post->content }}</div>
                        <span class="category">{{ $post->category }}</span>
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
    </section>

    <!-- Modal de Blog -->
    <div id="blogModal" class="blog-modal">
        <div class="blog-modal-content">
            <button class="blog-modal-close" onclick="closeBlogModal()">&times;</button>
            
            <div class="blog-modal-body" id="modalBody">
                <!-- Contenido dinámico -->
            </div>
            
            <!-- CTA Section -->
            <div class="blog-modal-cta">
                <div class="cta-content">
                    <div class="cta-icon">🎓✨</div>
                    <h3>¡Comienza tu viaje en el crochet!</h3>
                    <p class="cta-subtitle">Accede GRATIS a nuestros tutoriales iniciales</p>
                    
                    <div class="cta-benefits">
                        <div class="benefit-item">
                            <span class="benefit-icon">📹</span>
                            <span>Video tutoriales paso a paso</span>
                        </div>
                        <div class="benefit-item">
                            <span class="benefit-icon">📝</span>
                            <span>Guía PDF de puntos básicos</span>
                        </div>
                        <div class="benefit-item">
                            <span class="benefit-icon">🧶</span>
                            <span>Primer patrón gratuito</span>
                        </div>
                    </div>
                    
                    <form class="cta-form" onsubmit="event.preventDefault(); subscribeCTA();">
                        <input type="email" placeholder="Ingresa tu email" required class="cta-input">
                        <button type="submit" class="cta-button">Acceder a Tutoriales Gratis</button>
                    </form>
                    <p class="cta-note">✨ Únete a nuestra comunidad de tejedoras • Sin spam, solo inspiración</p>
                </div>
            </div>
        </div>
    </div>

</x-layout>

