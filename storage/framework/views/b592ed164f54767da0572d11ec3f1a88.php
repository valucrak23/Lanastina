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
     <?php $__env->slot('title', null, []); ?> Detalle del Patrón <?php $__env->endSlot(); ?>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <a href="<?php echo e(route('admin.patterns.index')); ?>" class="btn btn-outline-secondary mb-3">
                ← Volver a Patrones
            </a>
            <div class="d-flex align-items-center">
                <div class="admin-page-icon me-3">🧶</div>
                <div>
                    <h1 class="mb-1">Detalle del Patrón</h1>
                    <p class="text-muted mb-0">ID: #<?php echo e($pattern->pattern_id); ?></p>
                </div>
            </div>
        </header>

        <div class="admin-detail-card">
            <div class="admin-detail-header">
                <div>
                    <h2 class="admin-detail-title"><?php echo e($pattern->name); ?></h2>
                    <p class="admin-detail-subtitle"><?php echo e($pattern->description); ?></p>
                </div>
                <div class="admin-detail-actions">
                    <a href="<?php echo e(route('admin.patterns.edit', $pattern->pattern_id)); ?>" class="admin-action-btn-large admin-action-edit">
                        ✏️ Editar
                    </a>
                    <form method="POST" action="<?php echo e(route('admin.patterns.destroy', $pattern->pattern_id)); ?>" class="d-inline delete-pattern-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" class="admin-action-btn-large admin-action-delete" onclick="handleDeletePattern(this)">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>

            <div class="admin-detail-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="admin-image-box">
                            <?php if($pattern->image): ?>
                                <?php if(str_starts_with($pattern->image, 'pattern_images/')): ?>
                                    <img src="<?php echo e(Storage::url($pattern->image)); ?>" alt="<?php echo e($pattern->name); ?>" class="img-fluid">
                                <?php else: ?>
                                    <img src="<?php echo e(url($pattern->image)); ?>" alt="<?php echo e($pattern->name); ?>" class="img-fluid">
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="admin-no-image">
                                    <span class="admin-no-image-icon">📷</span>
                                    <p class="mb-0">Sin imagen</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="admin-info-box">
                            <h5 class="admin-info-title">📋 Información del Patrón</h5>
                            <div class="admin-info-list">
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Categoría:</span>
                                    <span class="admin-badge admin-badge-category"><?php echo e($pattern->category); ?></span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Dificultad:</span>
                                    <span class="admin-badge admin-badge-difficulty admin-badge-<?php echo e(strtolower($pattern->difficulty)); ?>">
                                        <?php echo e($pattern->difficulty); ?>

                                    </span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Precio:</span>
                                    <span class="admin-price-large">$<?php echo e(number_format($pattern->price, 2)); ?></span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Creado:</span>
                                    <span class="admin-info-value"><?php echo e($pattern->created_at->format('d/m/Y H:i')); ?></span>
                                </div>
                                <div class="admin-info-item">
                                    <span class="admin-info-label">Actualizado:</span>
                                    <span class="admin-info-value"><?php echo e($pattern->updated_at->format('d/m/Y H:i')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-detail-footer">
                <a href="<?php echo e(route('admin.patterns.index')); ?>" class="btn btn-outline-secondary">
                    ← Volver a la Lista
                </a>
                <a href="<?php echo e(route('admin.patterns.edit', $pattern->pattern_id)); ?>" class="btn btn-primary">
                    ✏️ Editar Patrón
                </a>
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
    function handleDeletePattern(button) {
        confirmAction('¿Estás seguro de que deseas eliminar este patrón?', function(confirmed) {
            if (confirmed) {
                button.closest('.delete-pattern-form').submit();
            }
        });
    }
</script>

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/admin/patterns/show.blade.php ENDPATH**/ ?>