<nav class="navbar navbar-expand-lg navbar-lanastina">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('home')); ?>" aria-label="Ir a la página principal">
            <img src="<?php echo e(url('img/logo.png')); ?>" alt="Lanastina Logo" class="brand-logo">
            <span class="brand-name">Lanastina</span>
        </a>
        
        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav"
                aria-controls="navbarNav" 
                aria-expanded="false" 
                aria-label="Alternar menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" 
                       href="<?php echo e(route('home')); ?>"
                       aria-current="<?php echo e(request()->routeIs('home') ? 'page' : 'false'); ?>">
                        Tienda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('blog') ? 'active' : ''); ?>" 
                       href="<?php echo e(route('blog')); ?>"
                       aria-current="<?php echo e(request()->routeIs('blog') ? 'page' : 'false'); ?>">
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('cart') ? 'active' : ''); ?>" 
                       href="<?php echo e(route('cart')); ?>"
                       aria-label="Ver carrito de compras"
                       aria-current="<?php echo e(request()->routeIs('cart') ? 'page' : 'false'); ?>">
                        <span aria-hidden="true">🛒</span> 
                        <span>Carrito</span>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <button class="theme-toggle" 
                            id="themeToggle" 
                            aria-label="Cambiar entre modo claro y oscuro"
                            aria-pressed="false">
                        <span id="themeIcon" aria-hidden="true">🌙</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php /**PATH C:\Users\valei\Downloads\laragon-portable\www\Lanastina\resources\views/components/navbar.blade.php ENDPATH**/ ?>