<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title ?? 'Lanastina'); ?> :: Lanastina</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(url('img/logo.png')); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(url('img/logo.png')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(url('img/logo.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
</head>

<body>
    <div id="app">
        <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>

        <main class="main-content">
            <?php if(session()->has('feedback.message')): ?>
                <div class="container mt-3">
                    <div class="alert alert-success">
                        <?php echo session()->get('feedback.message'); ?>

                    </div>
                </div>
            <?php endif; ?>

            <?php echo e($slot); ?>

        </main>

        <footer class="footer-lanastina">
            <div class="container text-center">
                <p class="mb-0">Lanastina © 2025 - Patrones de Crochet con Amor</p>
            </div>
        </footer>
    </div>

    <script src="<?php echo e(url('js/bootstrap.bundle.min.js')); ?>"></script>
    
    <script>
        // tema claro/oscuro
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const htmlElement = document.documentElement;
        
        // carga el tema guardado
        const currentTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-theme', currentTheme);
        updateThemeIcon(currentTheme);
        
        // cambia el tema
        themeToggle.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });
        
        function updateThemeIcon(theme) {
            themeIcon.textContent = theme === 'light' ? '🌙' : '☀️';
        }

        // modal del blog 
        function openBlogModal(postId) {
            const modal = document.getElementById('blogModal');
            const modalBody = document.getElementById('modalBody');
            const contentElement = document.getElementById('content-' + postId);
            
            if (contentElement && modal && modalBody) {
                modalBody.innerHTML = contentElement.innerHTML;
                modal.classList.add('show');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeBlogModal() {
            const modal = document.getElementById('blogModal');
            if (modal) {
                modal.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        }

        // cierra al hacer click afuera
        window.onclick = function(event) {
            const modal = document.getElementById('blogModal');
            if (event.target === modal) {
                closeBlogModal();
            }
        }

        // cierra con escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeBlogModal();
            }
        });

        // suscripcion
        function subscribeCTA() {
            const emailInput = document.querySelector('.cta-input');
            const email = emailInput.value;
            
            if (email) {
                alert('¡Gracias por suscribirte! 🎉\n\nRevisá tu email para acceder a los tutoriales gratuitos.\n\n' + email);
                emailInput.value = '';
                closeBlogModal();
            }
        }
    </script>
</body>

</html>

<?php /**PATH C:\laragon\www\Lanastina\resources\views/components/layout.blade.php ENDPATH**/ ?>