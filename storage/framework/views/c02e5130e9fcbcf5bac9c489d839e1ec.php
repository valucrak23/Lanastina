<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Carrito de Compras <?php $__env->endSlot(); ?>

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

    <!-- Carrito con productos de ejemplo -->
    <section class="cart-section">
        <div class="container">
            <div class="row g-4">
                <!-- Lista de productos -->
                <div class="col-lg-8">
                    <div class="cart-header mb-4">
                        <h3>Productos en tu carrito (3)</h3>
                    </div>
                    
                    <!-- Item 1 -->
                    <div class="cart-item">
                        <div class="cart-item-image">
                            <img src="<?php echo e(url('img/conejito.png')); ?>" alt="Conejito">
                        </div>
                        <div class="cart-item-info">
                            <h4 class="cart-item-title">Amigurumi Conejito</h4>
                            <p class="cart-item-category">Amigurumi • Principiante</p>
                            <p class="cart-item-desc">Adorable patrón perfecto para principiantes</p>
                        </div>
                        <div class="cart-item-price">
                            <p class="price-label">Precio</p>
                            <p class="price-amount">$450.00</p>
                        </div>
                        <div class="cart-item-actions">
                            <button class="btn-remove" onclick="alert('Funcionalidad no implementada - Solo demo visual')">🗑️</button>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="cart-item">
                        <div class="cart-item-image">
                            <img src="<?php echo e(url('img/manta.png')); ?>" alt="Manta">
                        </div>
                        <div class="cart-item-info">
                            <h4 class="cart-item-title">Manta Granny Square</h4>
                            <p class="cart-item-category">Mantas • Intermedio</p>
                            <p class="cart-item-desc">Hermosa manta con técnica clásica</p>
                        </div>
                        <div class="cart-item-price">
                            <p class="price-label">Precio</p>
                            <p class="price-amount">$650.00</p>
                        </div>
                        <div class="cart-item-actions">
                            <button class="btn-remove" onclick="alert('Funcionalidad no implementada - Solo demo visual')">🗑️</button>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="cart-item">
                        <div class="cart-item-image">
                            <img src="<?php echo e(url('img/bolso.png')); ?>" alt="Bolso">
                        </div>
                        <div class="cart-item-info">
                            <h4 class="cart-item-title">Bolso Boho Chic</h4>
                            <p class="cart-item-category">Accesorios • Avanzado</p>
                            <p class="cart-item-desc">Moderno bolso estilo boho</p>
                        </div>
                        <div class="cart-item-price">
                            <p class="price-label">Precio</p>
                            <p class="price-amount">$950.00</p>
                        </div>
                        <div class="cart-item-actions">
                            <button class="btn-remove" onclick="alert('Funcionalidad no implementada - Solo demo visual')">🗑️</button>
                        </div>
                    </div>
                </div>
                
                <!-- Resumen del pedido -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h4 class="summary-title">Resumen del Pedido</h4>
                        
                        <div class="summary-items">
                            <div class="summary-row">
                                <span>Subtotal (3 items)</span>
                                <span>$2,050.00</span>
                            </div>
                            <div class="summary-row">
                                <span>Descuento</span>
                                <span class="discount">-$0.00</span>
                            </div>
                            <hr>
                            <div class="summary-row summary-total">
                                <strong>Total</strong>
                                <strong class="total-amount">$2,050.00</strong>
                            </div>
                        </div>

                        <div class="summary-benefits">
                            <div class="benefit">✅ Descarga inmediata</div>
                            <div class="benefit">✅ Acceso de por vida</div>
                            <div class="benefit">✅ Soporte incluido</div>
                        </div>

                        <button class="btn-checkout" onclick="alert('¡Funcionalidad de pago no implementada!\n\nEsto es solo una demostración visual del carrito.')">
                            Finalizar Compra 💜
                        </button>

                        <a href="<?php echo e(route('home')); ?>" class="btn-continue">← Seguir comprando</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>

<?php /**PATH C:\laragon\www\Lanastina\resources\views/cart/index.blade.php ENDPATH**/ ?>