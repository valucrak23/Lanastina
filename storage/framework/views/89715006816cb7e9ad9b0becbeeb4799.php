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
            <?php echo e($slot); ?>

        </main>

        <!-- Contenedor de notificaciones -->
        <div id="notifications-container"></div>

        <!-- Modal de confirmación -->
        <div id="confirm-modal" class="confirm-modal">
            <div class="confirm-modal-content">
                <h3 class="confirm-modal-title">Confirmar</h3>
                <p class="confirm-modal-message" id="confirm-modal-message"></p>
                <div class="confirm-modal-buttons">
                    <button class="confirm-btn confirm-btn-accept" id="confirm-btn-accept">Aceptar</button>
                    <button class="confirm-btn confirm-btn-cancel" id="confirm-btn-cancel">Cancelar</button>
                </div>
            </div>
        </div>

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


        // Sistema de notificaciones
        function showNotification(message, type = 'info') {
            const container = document.getElementById('notifications-container');
            if (!container) return;
            
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            
            // Convertir saltos de línea a <br>
            const messageWithBreaks = String(message).replace(/\n/g, '<br>');
            
            const messageSpan = document.createElement('span');
            messageSpan.className = 'notification-message';
            messageSpan.innerHTML = messageWithBreaks;
            
            const closeButton = document.createElement('button');
            closeButton.className = 'notification-close';
            closeButton.textContent = '×';
            closeButton.onclick = function() {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.remove();
                    }
                }, 300);
            };
            
            const content = document.createElement('div');
            content.className = 'notification-content';
            content.appendChild(messageSpan);
            content.appendChild(closeButton);
            
            notification.appendChild(content);
            container.appendChild(notification);
            
            // Animación de entrada
            requestAnimationFrame(() => {
                notification.classList.add('show');
            });
            
            // Auto-eliminar después de 5 segundos
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.classList.remove('show');
                    setTimeout(() => {
                        if (notification.parentElement) {
                            notification.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }
        
        // Hacer la función disponible globalmente
        window.showNotification = showNotification;

        // Sistema de confirmación personalizado
        function confirmAction(message, callback) {
            const modal = document.getElementById('confirm-modal');
            const messageEl = document.getElementById('confirm-modal-message');
            const acceptBtn = document.getElementById('confirm-btn-accept');
            const cancelBtn = document.getElementById('confirm-btn-cancel');
            
            messageEl.textContent = message;
            modal.classList.add('show');
            
            const handleAccept = () => {
                modal.classList.remove('show');
                acceptBtn.removeEventListener('click', handleAccept);
                cancelBtn.removeEventListener('click', handleCancel);
                if (callback) callback(true);
            };
            
            const handleCancel = () => {
                modal.classList.remove('show');
                acceptBtn.removeEventListener('click', handleAccept);
                cancelBtn.removeEventListener('click', handleCancel);
                if (callback) callback(false);
            };
            
            acceptBtn.addEventListener('click', handleAccept);
            cancelBtn.addEventListener('click', handleCancel);
        }
        
        window.confirmAction = confirmAction;

        // Mostrar notificaciones desde sesión (solo una vez al cargar)
        (function() {
            let notificationsShown = false;
            
            function showSessionNotifications() {
                if (notificationsShown) return;
                notificationsShown = true;
                
                <?php if(session()->has('success')): ?>
                    setTimeout(function() {
                        showNotification(<?php echo json_encode(session('success')); ?>, 'success');
                    }, 300);
                <?php endif; ?>

                <?php if(session()->has('error')): ?>
                    setTimeout(function() {
                        showNotification(<?php echo json_encode(session('error')); ?>, 'error');
                    }, 300);
                <?php endif; ?>

                <?php if(session()->has('info')): ?>
                    setTimeout(function() {
                        showNotification(<?php echo json_encode(session('info')); ?>, 'info');
                    }, 300);
                <?php endif; ?>

                <?php if(session()->has('feedback.message')): ?>
                    setTimeout(function() {
                        showNotification(<?php echo json_encode(session()->get('feedback.message')); ?>, 'success');
                    }, 300);
                <?php endif; ?>
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', showSessionNotifications);
            } else {
                showSessionNotifications();
            }
        })();
    </script>
</body>

</html>

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/components/layout.blade.php ENDPATH**/ ?>