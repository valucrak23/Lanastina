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
     <?php $__env->slot('title', null, []); ?> Gestión de Blog <?php $__env->endSlot(); ?>

    <section class="container my-5">
        <header class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h1>Gestión de Posts del Blog</h1>
                <p class="text-muted">Administra las entradas del blog</p>
            </div>
            <div>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-outline-secondary me-2">
                    Volver al Dashboard
                </a>
                <a href="<?php echo e(route('admin.blog.create')); ?>" class="btn btn-primary">
                    + Nuevo Post
                </a>
            </div>
        </header>

        <div class="card">
            <div class="card-body">
                <?php if($posts->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Categoría</th>
                                    <th>Autor</th>
                                    <th>Fecha de Publicación</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($post->post_id); ?></td>
                                        <td><?php echo e($post->title); ?></td>
                                        <td><?php echo e($post->category); ?></td>
                                        <td><?php echo e($post->user->name ?? $post->author); ?></td>
                                        <td><?php echo e($post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada'); ?></td>
                                        <td>
                                            <?php if($post->image): ?>
                                                <img src="<?php echo e(Storage::url($post->image)); ?>" alt="<?php echo e($post->title); ?>" style="max-width: 50px; max-height: 50px; object-fit: cover;">
                                            <?php else: ?>
                                                <span class="text-muted">Sin imagen</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('admin.blog.show', $post->post_id)); ?>" class="btn btn-sm btn-outline-info">
                                                    Ver
                                                </a>
                                                <a href="<?php echo e(route('admin.blog.edit', $post->post_id)); ?>" class="btn btn-sm btn-outline-primary">
                                                    Editar
                                                </a>
                                                <form method="POST" action="<?php echo e(route('admin.blog.destroy', $post->post_id)); ?>" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este post?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <?php echo e($posts->links()); ?>

                    </div>
                <?php else: ?>
                    <p class="text-muted text-center py-4">No hay posts del blog aún. 
                        <a href="<?php echo e(route('admin.blog.create')); ?>">Crear el primero</a>
                    </p>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>