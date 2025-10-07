<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Lanastina' }} :: Lanastina</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('img/logo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ url('img/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ url('img/logo.png') }}">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-lanastina">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ url('img/logo.png') }}" alt="Lanastina Logo" class="brand-logo">
                    <span class="brand-name">Lanastina</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar menú de navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                               href="{{ route('home') }}">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}" 
                               href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <span>🛒</span> Carrito
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <button class="theme-toggle" id="themeToggle" aria-label="Cambiar tema">
                                <span id="themeIcon">🌙</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main-content">
            @if (session()->has('feedback.message'))
                <div class="container mt-3">
                    <div class="alert alert-success">
                        {!! session()->get('feedback.message') !!}
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>

        <footer class="footer-lanastina">
            <div class="container text-center">
                <p class="mb-0">Lanastina © 2025 - Patrones de Crochet con Amor</p>
            </div>
        </footer>
    </div>

    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    
    <script>
        // Sistema de tema (dark/light mode)
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const htmlElement = document.documentElement;
        
        // Cargar tema guardado o usar modo claro por defecto
        const currentTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-theme', currentTheme);
        updateThemeIcon(currentTheme);
        
        // Toggle al hacer click
        themeToggle.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });
        
        // Actualizar icono según el tema
        function updateThemeIcon(theme) {
            themeIcon.textContent = theme === 'light' ? '🌙' : '☀️';
        }

        // Sistema de Modal del Blog
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

        // Cerrar modal al hacer clic fuera
        window.onclick = function(event) {
            const modal = document.getElementById('blogModal');
            if (event.target === modal) {
                closeBlogModal();
            }
        }

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeBlogModal();
            }
        });

        // Función de suscripción al CTA
        function subscribeCTA() {
            const emailInput = document.querySelector('.cta-input');
            const email = emailInput.value;
            
            if (email) {
                // Aquí podrías agregar la lógica para enviar el email al backend
                // Por ahora, solo mostramos un mensaje de éxito
                
                alert('¡Gracias por suscribirte! 🎉\n\nRevisá tu email para acceder a los tutoriales gratuitos.\n\n' + email);
                emailInput.value = '';
                closeBlogModal();
            }
        }
    </script>
</body>

</html>

