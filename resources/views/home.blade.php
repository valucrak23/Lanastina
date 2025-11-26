<x-layout>
    <x-slot:title>Tienda de Patrones</x-slot:title>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">✨ Nuevos Patrones ✨</div>
            <h1 class="hero-title">Bienvenida a Lanastina</h1>
            <p class="hero-subtitle">Patrones de crochet únicos para crear piezas maravillosas</p>
            <div class="hero-decorations">
                <span class="hero-icon">🧶</span>
                <span class="hero-icon">🎨</span>
                <span class="hero-icon">💜</span>
            </div>
        </div>
    </section>

    <!-- Catálogo de Patrones -->
    <section class="patterns-section">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros Patrones</h2>
            
            <div class="row g-4">
                @forelse($patterns as $pattern)
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="pattern-card">
                            <div class="pattern-card-img">
                                @if($pattern->image)
                                    <img src="{{ url($pattern->image) }}" alt="{{ $pattern->name }}" class="pattern-img">
                                @else
                                    🧶
                                @endif
                            </div>
                            <div class="pattern-card-body">
                                <h3 class="pattern-card-title">{{ $pattern->name }}</h3>
                                
                                <div class="mb-2">
                                    <span class="badge-difficulty">{{ $pattern->difficulty }}</span>
                                    <span class="badge-difficulty">{{ $pattern->category }}</span>
                                </div>
                                
                                <p class="pattern-card-text">
                                    {{ $pattern->description }}
                                </p>
                                
                                <div class="pattern-price">
                                    ${{ number_format($pattern->price, 2) }}
                                </div>
                                
                                <button type="button" class="btn-lanastina w-100 text-center" onclick="addToCart({{ $pattern->pattern_id }}, this)">
                                    Agregar al Carrito
                                </button>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state text-center py-5">
                            <div class="empty-icon mb-3">🧶✨</div>
                            <h3 class="mb-3">¡Estamos preparando algo especial!</h3>
                            <p class="empty-message">
                                Pronto tendremos hermosos patrones de crochet para ti.<br>
                                Vuelve pronto para descubrir nuestras creaciones.
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Sección informativa -->
    <section class="info-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 text-center mb-4">
                    <div class="info-icon mb-3">📥</div>
                    <h4>Descarga Instantánea</h4>
                    <p>Recibe tu patrón en PDF al momento de la compra</p>
                </div>
                <div class="col-12 col-md-4 text-center mb-4">
                    <div class="info-icon mb-3">📝</div>
                    <h4>Instrucciones Detalladas</h4>
                    <p>Patrones con explicaciones paso a paso y diagramas</p>
                </div>
                <div class="col-12 col-md-4 text-center mb-4">
                    <div class="info-icon mb-3">💬</div>
                    <h4>Soporte Personalizado</h4>
                    <p>Te ayudamos si tienes dudas con tu proyecto</p>
                </div>
            </div>
        </div>
    </section>

</x-layout>

<script>
    function addToCart(patternId, button) {
        const originalText = button.textContent;
        button.disabled = true;
        button.textContent = 'Agregando...';
        
        fetch(`/carrito/agregar/${patternId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                updateCartCount(data.cart_count || 0);
            } else {
                showNotification(data.message, 'info');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Error al agregar al carrito', 'error');
        })
        .finally(() => {
            button.disabled = false;
            button.textContent = originalText;
        });
    }
    
    function updateCartCount(count) {
        const cartBadges = document.querySelectorAll('.cart-count');
        cartBadges.forEach(badge => {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'inline' : 'none';
        });
    }
</script>

