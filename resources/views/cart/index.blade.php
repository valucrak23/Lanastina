<x-layout>
    <x-slot:title>Carrito de Compras</x-slot:title>

    <!-- Hero Section -->
    <section class="hero-section hero-cart">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="hero-badge">🛒 Tu Carrito 🛒</div>
            <h1 class="hero-title">Tus Patrones Seleccionados</h1>
            <p class="hero-subtitle">Estás a un paso de comenzar tus proyectos</p>
            <div class="hero-decorations">
                <span class="hero-icon">💜</span>
                <span class="hero-icon">✨</span>
                <span class="hero-icon">🧶</span>
            </div>
        </div>
    </section>

    <!-- Carrito -->
    <section class="cart-section">
        <div class="container">
            @if(count($cart) > 0)
                <div class="row g-4">
                    <!-- Lista de productos -->
                    <div class="col-lg-8">
                        <div class="cart-header mb-4 d-flex justify-content-between align-items-center">
                            <h3>Productos en tu carrito ({{ count($cart) }})</h3>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline" id="clear-cart-form">
                                @csrf
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="handleClearCart()">
                                    Vaciar Carrito
                                </button>
                            </form>
                        </div>
                        
                        @foreach($cart as $id => $item)
                            <div class="cart-item mb-3">
                                <div class="cart-item-image">
                                    <img src="{{ url($item['image']) }}" alt="{{ $item['name'] }}" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                                <div class="cart-item-info">
                                    <h4 class="cart-item-title">{{ $item['name'] }}</h4>
                                    <p class="cart-item-category">{{ $item['category'] }} • {{ $item['difficulty'] }}</p>
                                    <p class="cart-item-desc">{{ Str::limit($item['description'], 100) }}</p>
                                </div>
                                <div class="cart-item-price">
                                    <p class="price-label">Precio</p>
                                    <p class="price-amount">${{ number_format($item['price'], 2) }}</p>
                                </div>
                                <div class="cart-item-actions">
                                    <button type="button" class="btn-remove" onclick="handleRemoveItem(this, {{ $id }})">🗑️</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Resumen del pedido -->
                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h4 class="summary-title">Resumen del Pedido</h4>
                            
                            <div class="summary-items">
                                <div class="summary-row">
                                    <span>Subtotal ({{ count($cart) }} {{ count($cart) == 1 ? 'item' : 'items' }})</span>
                                    <span>${{ number_format($total, 2) }}</span>
                                </div>
                                <div class="summary-row">
                                    <span>Descuento</span>
                                    <span class="discount">-$0.00</span>
                                </div>
                                <hr>
                                <div class="summary-row summary-total">
                                    <strong>Total</strong>
                                    <strong class="total-amount">${{ number_format($total, 2) }}</strong>
                                </div>
                            </div>

                            <div class="summary-benefits">
                                <div class="benefit">✅ Descarga inmediata</div>
                                <div class="benefit">✅ Acceso de por vida</div>
                                <div class="benefit">✅ Soporte incluido</div>
                            </div>

                            <button class="btn-checkout" onclick="showNotification('¡Funcionalidad de pago no implementada!\\n\\nEsto es solo una demostración visual del carrito.', 'info')">
                                Finalizar Compra 💜
                            </button>

                            <a href="{{ route('home') }}" class="btn-continue">← Seguir comprando</a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Carrito vacío centrado -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="empty-state text-center py-5">
                            <div class="empty-icon mb-3">🛒</div>
                            <h3 class="mb-3">Tu carrito está vacío</h3>
                            <p class="empty-message">
                                Agrega patrones desde la tienda para comenzar tu compra.
                            </p>
                            <a href="{{ route('home') }}" class="btn-lanastina mt-3">Ir a la Tienda</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

</x-layout>

<script>
    function handleClearCart() {
        confirmAction('¿Estás seguro de vaciar el carrito?', function(confirmed) {
            if (confirmed) {
                fetch('/carrito/vaciar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                        updateCartCount(0);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Error al vaciar el carrito', 'error');
                });
            }
        });
    }

    function handleRemoveItem(button, itemId) {
        confirmAction('¿Eliminar este patrón del carrito?', function(confirmed) {
            if (confirmed) {
                const itemElement = button.closest('.cart-item');
                
                fetch(`/carrito/eliminar/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                        updateCartCount(data.cart_count || 0);
                        
                        // Remover el item del DOM
                        itemElement.style.transition = 'opacity 0.3s';
                        itemElement.style.opacity = '0';
                        setTimeout(() => {
                            itemElement.remove();
                            
                            // Actualizar total
                            const totalElement = document.querySelector('.total-amount');
                            if (totalElement) {
                                totalElement.textContent = '$' + parseFloat(data.total || 0).toFixed(2);
                            }
                            
                            // Actualizar subtotal
                            const subtotalElement = document.querySelector('.summary-row span:last-child');
                            if (subtotalElement && document.querySelector('.summary-row:first-child')) {
                                const subtotalRow = document.querySelector('.summary-row:first-child');
                                const count = data.cart_count || 0;
                                subtotalRow.querySelector('span:first-child').textContent = `Subtotal (${count} ${count === 1 ? 'item' : 'items'})`;
                                subtotalRow.querySelector('span:last-child').textContent = '$' + parseFloat(data.total || 0).toFixed(2);
                            }
                            
                            // Actualizar título del carrito
                            const cartTitle = document.querySelector('.cart-header h3');
                            if (cartTitle) {
                                cartTitle.textContent = `Productos en tu carrito (${data.cart_count || 0})`;
                            }
                            
                            // Si el carrito está vacío, recargar para mostrar el mensaje
                            if (data.cart_count === 0) {
                                setTimeout(() => {
                                    location.reload();
                                }, 500);
                            }
                        }, 300);
                    } else {
                        showNotification(data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Error al eliminar del carrito', 'error');
                });
            }
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

