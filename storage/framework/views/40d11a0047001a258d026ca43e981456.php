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
                        <?php
                            $cartCount = count(session()->get('cart', []));
                        ?>
                        <?php if($cartCount > 0): ?>
                            <span class="cart-count badge bg-primary ms-1"><?php echo e($cartCount); ?></span>
                        <?php else: ?>
                            <span class="cart-count badge bg-primary ms-1" style="display: none;">0</span>
                        <?php endif; ?>
                    </a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(request()->routeIs('admin.*') ? 'active' : ''); ?>" 
                               href="<?php echo e(route('admin.dashboard')); ?>"
                               aria-current="<?php echo e(request()->routeIs('admin.*') ? 'page' : 'false'); ?>">
                                Panel Admin
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo e(auth()->user()->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('login') ? 'active' : ''); ?>" 
                           href="<?php echo e(route('login')); ?>"
                           aria-current="<?php echo e(request()->routeIs('login') ? 'page' : 'false'); ?>">
                            Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('register') ? 'active' : ''); ?>" 
                           href="<?php echo e(route('register')); ?>"
                           aria-current="<?php echo e(request()->routeIs('register') ? 'page' : 'false'); ?>">
                            Registrarse
                        </a>
                    </li>
                <?php endif; ?>
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

<?php /**PATH C:\laragon\www\PARCIAL2-Ijelchuk-Cruz\Lanastina\resources\views/components/navbar.blade.php ENDPATH**/ ?>