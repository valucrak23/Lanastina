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
     <?php $__env->slot('title', null, []); ?> Tienda de Patrones <?php $__env->endSlot(); ?>

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
                <?php $__empty_1 = true; $__currentLoopData = $patterns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pattern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="pattern-card">
                            <div class="pattern-card-img">
                                <?php if($pattern->image): ?>
                                    <img src="<?php echo e(url($pattern->image)); ?>" alt="<?php echo e($pattern->name); ?>" class="pattern-img">
                                <?php else: ?>
                                    🧶
                                <?php endif; ?>
                            </div>
                            <div class="pattern-card-body">
                                <h3 class="pattern-card-title"><?php echo e($pattern->name); ?></h3>
                                
                                <div class="mb-2">
                                    <span class="badge-difficulty"><?php echo e($pattern->difficulty); ?></span>
                                    <span class="badge-difficulty"><?php echo e($pattern->category); ?></span>
                                </div>
                                
                                <p class="pattern-card-text">
                                    <?php echo e($pattern->description); ?>

                                </p>
                                
                                <div class="pattern-price">
                                    $<?php echo e(number_format($pattern->price, 2)); ?>

                                </div>
                                
                                <a href="<?php echo e(route('cart')); ?>" class="btn-lanastina w-100 text-center">
                                    Agregar al Carrito
                                </a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
                <?php endif; ?>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/home.blade.php ENDPATH**/ ?>