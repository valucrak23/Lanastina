<nav class="navbar navbar-expand-lg navbar-lanastina">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" aria-label="Ir a la página principal">
            <img src="{{ url('img/logo.png') }}" alt="Lanastina Logo" class="brand-logo">
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
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                       href="{{ route('home') }}"
                       aria-current="{{ request()->routeIs('home') ? 'page' : 'false' }}">
                        Tienda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" 
                       href="{{ route('blog') }}"
                       aria-current="{{ request()->routeIs('blog') ? 'page' : 'false' }}">
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cart') ? 'active' : '' }}" 
                       href="{{ route('cart') }}"
                       aria-label="Ver carrito de compras"
                       aria-current="{{ request()->routeIs('cart') ? 'page' : 'false' }}">
                        <span aria-hidden="true">🛒</span> 
                        <span>Carrito</span>
                        @php
                            $cartCount = count(session()->get('cart', []));
                        @endphp
                        @if($cartCount > 0)
                            <span class="cart-count badge bg-primary ms-1">{{ $cartCount }}</span>
                        @else
                            <span class="cart-count badge bg-primary ms-1" style="display: none;">0</span>
                        @endif
                    </a>
                </li>
                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}"
                               aria-current="{{ request()->routeIs('admin.*') ? 'page' : 'false' }}">
                                Panel Admin
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" 
                           href="{{ route('login') }}"
                           aria-current="{{ request()->routeIs('login') ? 'page' : 'false' }}">
                            Iniciar Sesión
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" 
                           href="{{ route('register') }}"
                           aria-current="{{ request()->routeIs('register') ? 'page' : 'false' }}">
                            Registrarse
                        </a>
                    </li>
                @endauth
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

