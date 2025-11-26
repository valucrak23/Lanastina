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
     <?php $__env->slot('title', null, []); ?> Detalle de Usuario <?php $__env->endSlot(); ?>

    <section class="container my-5">
        <header class="mb-4">
            <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-outline-secondary mb-3">
                ← Volver a Usuarios
            </a>
            <h1>Detalle de Usuario</h1>
        </header>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Información del Usuario</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">ID:</dt>
                            <dd class="col-sm-9"><?php echo e($user->id); ?></dd>

                            <dt class="col-sm-3">Nombre:</dt>
                            <dd class="col-sm-9"><?php echo e($user->name); ?></dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9"><?php echo e($user->email); ?></dd>

                            <dt class="col-sm-3">Rol:</dt>
                            <dd class="col-sm-9">
                                <span class="badge bg-<?php echo e($user->role === 'admin' ? 'danger' : 'primary'); ?>">
                                    <?php echo e($user->role === 'admin' ? 'Administrador' : 'Usuario'); ?>

                                </span>
                            </dd>

                            <dt class="col-sm-3">Fecha de Registro:</dt>
                            <dd class="col-sm-9"><?php echo e($user->created_at->format('d/m/Y H:i:s')); ?></dd>

                            <dt class="col-sm-3">Última Actualización:</dt>
                            <dd class="col-sm-9"><?php echo e($user->updated_at->format('d/m/Y H:i:s')); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Posts del Blog Creados por este Usuario</h5>
                    </div>
                    <div class="card-body">
                        <?php if($posts->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Categoría</th>
                                            <th>Fecha de Publicación</th>
                                            <th>Fecha de Creación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($post->title); ?></td>
                                                <td><?php echo e($post->category); ?></td>
                                                <td><?php echo e($post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada'); ?></td>
                                                <td><?php echo e($post->created_at->format('d/m/Y H:i')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-0">Este usuario no ha creado ningún post aún.</p>
                        <?php endif; ?>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/admin/users/show.blade.php ENDPATH**/ ?>