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
        <header class="mb-5">
            <div class="d-flex align-items-center mb-3">
                <div class="admin-header-icon me-3">👑</div>
                <div>
                    <h1 class="mb-1">Panel de Administración</h1>
                    <p class="text-muted mb-0">Bienvenido, <strong><?php echo e(auth()->user()->name); ?></strong></p>
                </div>
            </div>
        </header>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="admin-stat-card admin-stat-card-users">
                    <div class="admin-stat-icon">👥</div>
                    <div class="admin-stat-content">
                        <h5 class="admin-stat-label">Usuarios Registrados</h5>
                        <h2 class="admin-stat-number"><?php echo e($usersCount); ?></h2>
                        <a href="<?php echo e(route('admin.users')); ?>" class="admin-stat-link">
                            Ver todos <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-stat-card admin-stat-card-blog">
                    <div class="admin-stat-icon">📝</div>
                    <div class="admin-stat-content">
                        <h5 class="admin-stat-label">Posts del Blog</h5>
                        <h2 class="admin-stat-number"><?php echo e($postsCount); ?></h2>
                        <a href="<?php echo e(route('admin.blog.index')); ?>" class="admin-stat-link">
                            Gestionar posts <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-stat-card admin-stat-card-patterns">
                    <div class="admin-stat-icon">🧶</div>
                    <div class="admin-stat-content">
                        <h5 class="admin-stat-label">Patrones</h5>
                        <h2 class="admin-stat-number"><?php echo e($patternsCount); ?></h2>
                        <a href="<?php echo e(route('admin.patterns.index')); ?>" class="admin-stat-link">
                            Gestionar patrones <span>→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="admin-recent-card">
                    <div class="admin-recent-header">
                        <h5 class="mb-0">📝 Posts Recientes</h5>
                        <a href="<?php echo e(route('admin.blog.index')); ?>" class="admin-recent-link">Ver todos</a>
                    </div>
                    <div class="admin-recent-body">
                        <?php if($recentPosts->count() > 0): ?>
                            <div class="admin-recent-list">
                                <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="admin-recent-item">
                                        <div class="admin-recent-item-content">
                                            <div class="admin-recent-item-title"><?php echo e($post->title); ?></div>
                                            <small class="admin-recent-item-date"><?php echo e($post->created_at->format('d/m/Y')); ?></small>
                                        </div>
                                        <a href="<?php echo e(route('admin.blog.edit', $post->post_id)); ?>" class="admin-recent-item-btn">
                                            ✏️ Editar
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <div class="admin-empty-state">
                                <span class="admin-empty-icon">📝</span>
                                <p class="mb-0">No hay posts aún.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="admin-recent-card">
                    <div class="admin-recent-header">
                        <h5 class="mb-0">👥 Usuarios Recientes</h5>
                        <a href="<?php echo e(route('admin.users')); ?>" class="admin-recent-link">Ver todos</a>
                    </div>
                    <div class="admin-recent-body">
                        <?php if($recentUsers->count() > 0): ?>
                            <div class="admin-recent-list">
                                <?php $__currentLoopData = $recentUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="admin-recent-item">
                                        <div class="admin-recent-item-content">
                                            <div class="admin-recent-item-title"><?php echo e($user->name); ?></div>
                                            <small class="admin-recent-item-date"><?php echo e($user->email); ?> • <?php echo e($user->role); ?></small>
                                        </div>
                                        <a href="<?php echo e(route('admin.users.show', $user->id)); ?>" class="admin-recent-item-btn">
                                            👁️ Ver
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <div class="admin-empty-state">
                                <span class="admin-empty-icon">👥</span>
                                <p class="mb-0">No hay usuarios aún.</p>
                            </div>
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