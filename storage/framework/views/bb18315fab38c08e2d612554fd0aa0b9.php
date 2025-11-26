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
     <?php $__env->slot('title', null, []); ?> Gestión de Patrones <?php $__env->endSlot(); ?>

    <section class="container my-5">
        <header class="admin-page-header mb-4">
            <div class="d-flex align-items-center mb-3">
                <div class="admin-page-icon me-3">🧶</div>
                <div>
                    <h1 class="mb-1">Gestión de Patrones</h1>
                    <p class="text-muted mb-0">Administra los patrones de crochet</p>
                </div>
            </div>
            <div class="admin-page-actions">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-outline-secondary me-2">
                    ← Dashboard
                </a>
                <a href="<?php echo e(route('admin.patterns.create')); ?>" class="btn btn-primary">
                    ✨ Nuevo Patrón
                </a>
            </div>
        </header>

        <div class="admin-table-card">
            <div class="admin-table-header">
                <h5 class="mb-0">Listado de Patrones (<?php echo e($patterns->count()); ?>)</h5>
            </div>
            <div class="admin-table-body">
                <?php if($patterns->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Dificultad</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $patterns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pattern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><span class="admin-table-id">#<?php echo e($pattern->pattern_id); ?></span></td>
                                        <td>
                                            <?php if($pattern->image): ?>
                                                <?php if(str_starts_with($pattern->image, 'pattern_images/')): ?>
                                                    <img src="<?php echo e(Storage::url($pattern->image)); ?>" alt="<?php echo e($pattern->name); ?>" class="admin-table-img">
                                                <?php else: ?>
                                                    <img src="<?php echo e(url($pattern->image)); ?>" alt="<?php echo e($pattern->name); ?>" class="admin-table-img">
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="admin-table-no-img">📷</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><strong><?php echo e($pattern->name); ?></strong></td>
                                        <td><span class="admin-badge admin-badge-category"><?php echo e($pattern->category); ?></span></td>
                                        <td>
                                            <span class="admin-badge admin-badge-difficulty admin-badge-<?php echo e(strtolower($pattern->difficulty)); ?>">
                                                <?php echo e($pattern->difficulty); ?>

                                            </span>
                                        </td>
                                        <td><strong class="admin-price">$<?php echo e(number_format($pattern->price, 2)); ?></strong></td>
                                        <td>
                                            <div class="admin-action-buttons">
                                                <a href="<?php echo e(route('admin.patterns.show', $pattern->pattern_id)); ?>" class="admin-action-btn admin-action-view" title="Ver">
                                                    👁️
                                                </a>
                                                <a href="<?php echo e(route('admin.patterns.edit', $pattern->pattern_id)); ?>" class="admin-action-btn admin-action-edit" title="Editar">
                                                    ✏️
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.patterns.destroy', $pattern->pattern_id)); ?>" class="d-inline delete-pattern-form">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="button" class="admin-action-btn admin-action-delete" onclick="handleDeletePattern(this)" title="Eliminar">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="admin-pagination">
                        <?php echo e($patterns->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="admin-empty-state-large">
                        <div class="admin-empty-icon-large">🧶</div>
                        <h4>No hay patrones aún</h4>
                        <p class="text-muted">Comienza creando tu primer patrón</p>
                        <a href="<?php echo e(route('admin.patterns.create')); ?>" class="btn btn-primary">
                            ✨ Crear el primero
                        </a>
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
    function handleDeletePattern(button) {
        confirmAction('¿Estás seguro de que deseas eliminar este patrón?', function(confirmed) {
            if (confirmed) {
                button.closest('.delete-pattern-form').submit();
            }
        });
    }
</script>

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/admin/patterns/index.blade.php ENDPATH**/ ?>