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
            <div class="blog-posts-grid">
                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="blog-card-accordion">
                        <div class="blog-card-header-accordion" onclick="toggleBlogAccordion(<?php echo e($post->post_id); ?>)">
                            <?php if($post->image): ?>
                                <div class="blog-card-image-small">
                                    <img src="<?php echo e(Storage::url($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="img-fluid">
                                </div>
                            <?php endif; ?>
                            <div class="blog-card-header-content">
                                <h2 class="blog-card-title"><?php echo e($post->title); ?></h2>
                                <p class="blog-card-subtitle"><?php echo e($post->subtitle); ?></p>
                                <div class="blog-card-meta">
                                    <span class="blog-author">Por <?php echo e($post->user->name ?? $post->author); ?></span>
                                    <span class="blog-date"><?php echo e($post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada'); ?></span>
                                    <span class="blog-category-badge"><?php echo e($post->category); ?></span>
                                </div>
                            </div>
                            <button class="blog-accordion-toggle" id="toggle-<?php echo e($post->post_id); ?>">
                                <span class="toggle-icon">▼</span>
                            </button>
                        </div>
                        
                        <div class="blog-card-body-accordion" id="content-<?php echo e($post->post_id); ?>">
                            <div class="blog-card-expanded-content">
                                <?php if($post->image): ?>
                                    <div class="blog-expanded-image mb-4">
                                        <img src="<?php echo e(Storage::url($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="img-fluid rounded">
                                    </div>
                                <?php endif; ?>
                                <div class="blog-full-content">
                                    <p class="blog-content-text"><?php echo e($post->content); ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/blog/index.blade.php ENDPATH**/ ?>