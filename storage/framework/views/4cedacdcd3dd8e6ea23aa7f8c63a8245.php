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
     <?php $__env->slot('title', null, []); ?> Ver Post <?php $__env->endSlot(); ?>

    <section class="container my-5">
        <header class="mb-4">
            <a href="<?php echo e(route('admin.blog.index')); ?>" class="btn btn-outline-secondary mb-3">
                ← Volver a Posts
            </a>
            <h1>Detalle del Post</h1>
        </header>

        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-8">
                        <h2 class="card-title"><?php echo e($post->title); ?></h2>
                        <p class="text-muted lead"><?php echo e($post->subtitle); ?></p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="btn-group" role="group">
                            <a href="<?php echo e(route('admin.blog.edit', $post->post_id)); ?>" class="btn btn-primary">
                                Editar
                            </a>
                            <form method="POST" action="<?php echo e(route('admin.blog.destroy', $post->post_id)); ?>" class="d-inline delete-post-form">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" class="btn btn-danger" onclick="handleDeletePost(this)">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php if($post->image): ?>
                    <div class="mb-4">
                        <img src="<?php echo e(Storage::url($post->image)); ?>" alt="<?php echo e($post->title); ?>" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                    </div>
                <?php endif; ?>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Información del Post</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">ID:</th>
                                <td><?php echo e($post->post_id); ?></td>
                            </tr>
                            <tr>
                                <th>Categoría:</th>
                                <td><?php echo e($post->category); ?></td>
                            </tr>
                            <tr>
                                <th>Autor:</th>
                                <td><?php echo e($post->user->name ?? $post->author); ?></td>
                            </tr>
                            <tr>
                                <th>Fecha de Publicación:</th>
                                <td><?php echo e($post->published_at ? $post->published_at->format('d/m/Y H:i') : 'No publicada'); ?></td>
                            </tr>
                            <tr>
                                <th>Creado:</th>
                                <td><?php echo e($post->created_at->format('d/m/Y H:i')); ?></td>
                            </tr>
                            <tr>
                                <th>Última Actualización:</th>
                                <td><?php echo e($post->updated_at->format('d/m/Y H:i')); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Contenido</h5>
                    <div class="border p-3 bg-light rounded">
                        <p style="white-space: pre-wrap;"><?php echo e($post->content); ?></p>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('admin.blog.index')); ?>" class="btn btn-outline-secondary">
                        Volver a la Lista
                    </a>
                    <a href="<?php echo e(route('admin.blog.edit', $post->post_id)); ?>" class="btn btn-primary">
                        Editar Post
                    </a>
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

<script>
    function handleDeletePost(button) {
        confirmAction('¿Estás seguro de que deseas eliminar este post?', function(confirmed) {
            if (confirmed) {
                button.closest('.delete-post-form').submit();
            }
        });
    }
</script>

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/admin/blog/show.blade.php ENDPATH**/ ?>