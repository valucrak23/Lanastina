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
     <?php $__env->slot('title', null, []); ?> Panel de Administración <?php $__env->endSlot(); ?>

    <section class="container my-5">
        <header class="mb-4">
            <h1>Panel de Administración</h1>
            <p class="text-muted">Bienvenido, <?php echo e(auth()->user()->name); ?></p>
        </header>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios Registrados</h5>
                        <h2 class="display-4"><?php echo e($usersCount); ?></h2>
                        <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-sm btn-outline-primary">
                            Ver todos los usuarios
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Posts del Blog</h5>
                        <h2 class="display-4"><?php echo e($postsCount); ?></h2>
                        <a href="<?php echo e(route('admin.blog.index')); ?>" class="btn btn-sm btn-outline-primary">
                            Gestionar posts
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Posts Recientes</h5>
                    </div>
                    <div class="card-body">
                        <?php if($recentPosts->count() > 0): ?>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><?php echo e($post->title); ?></div>
                                            <small class="text-muted"><?php echo e($post->created_at->format('d/m/Y')); ?></small>
                                        </div>
                                        <a href="<?php echo e(route('admin.blog.edit', $post->post_id)); ?>" class="btn btn-sm btn-outline-secondary">
                                            Editar
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted mb-0">No hay posts aún.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Usuarios Recientes</h5>
                    </div>
                    <div class="card-body">
                        <?php if($recentUsers->count() > 0): ?>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $recentUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><?php echo e($user->name); ?></div>
                                            <small class="text-muted"><?php echo e($user->email); ?> - <?php echo e($user->role); ?></small>
                                        </div>
                                        <a href="<?php echo e(route('admin.users.show', $user->id)); ?>" class="btn btn-sm btn-outline-secondary">
                                            Ver
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted mb-0">No hay usuarios aún.</p>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>