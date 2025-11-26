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
     <?php $__env->slot('title', null, []); ?> Blog <?php $__env->endSlot(); ?>

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
            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4">
                        <article class="blog-card blog-card-clickable" data-post-id="<?php echo e($post->post_id); ?>">
                            <?php if($post->image): ?>
                                <div class="blog-card-image">
                                    <img src="<?php echo e(Storage::url($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="img-fluid" style="max-height: 200px; width: 100%; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                    
                    <header class="blog-card-header">
                        <h2 class="blog-card-title"><?php echo e($post->title); ?></h2>
                        <p class="blog-card-subtitle"><?php echo e($post->subtitle); ?></p>
                        <div class="blog-card-meta">
                            Por <?php echo e($post->user->name ?? $post->author); ?> • <?php echo e($post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada'); ?>

                        </div>
                    </header>
                    
                    <div class="blog-card-body">
                        <div class="blog-card-content blog-card-preview">
                            <?php echo e(Str::limit($post->content, 200)); ?>

                        </div>
                        
                        <span class="blog-category"><?php echo e($post->category); ?></span>
                        
                        <button class="btn-read-more" onclick="openBlogModal(<?php echo e($post->post_id); ?>)">
                            Leer más →
                        </button>
                    </div>
                    
                    <!-- Contenido completo (oculto) -->
                    <div class="blog-full-content" id="content-<?php echo e($post->post_id); ?>" style="display: none;">
                        <?php if($post->image): ?>
                            <div class="blog-full-image mb-4">
                                <img src="<?php echo e(Storage::url($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="img-fluid rounded">
                            </div>
                        <?php endif; ?>
                        <h2><?php echo e($post->title); ?></h2>
                        <p class="subtitle"><?php echo e($post->subtitle); ?></p>
                        <p class="meta">Por <?php echo e($post->user->name ?? $post->author); ?> • <?php echo e($post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada'); ?></p>
                        <div class="content"><?php echo e($post->content); ?></div>
                        <span class="category"><?php echo e($post->category); ?></span>
                    </div>
                </article>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty-state text-center py-5">
                    <div class="empty-icon mb-3">📝✨</div>
                    <h3 class="mb-3">¡Estamos tejiendo nuevas historias!</h3>
                    <p class="empty-message">
                        Pronto compartiremos tutoriales, consejos y novedades sobre el maravilloso mundo del crochet.
                        Mantente atenta para no perderte nuestros artículos.
                    </p>
                </div>
                <?php endif; ?>
            </div>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/blog/index.blade.php ENDPATH**/ ?>