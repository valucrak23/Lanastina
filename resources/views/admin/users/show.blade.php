<x-layout>
    <x-slot:title>Detalle de Usuario</x-slot:title>

    <section class="container my-5">
        <header class="mb-4">
            <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary mb-3">
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
                            <dd class="col-sm-9">{{ $user->id }}</dd>

                            <dt class="col-sm-3">Nombre:</dt>
                            <dd class="col-sm-9">{{ $user->name }}</dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9">{{ $user->email }}</dd>

                            <dt class="col-sm-3">Rol:</dt>
                            <dd class="col-sm-9">
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                    {{ $user->role === 'admin' ? 'Administrador' : 'Usuario' }}
                                </span>
                            </dd>

                            <dt class="col-sm-3">Fecha de Registro:</dt>
                            <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y H:i:s') }}</dd>

                            <dt class="col-sm-3">Última Actualización:</dt>
                            <dd class="col-sm-9">{{ $user->updated_at->format('d/m/Y H:i:s') }}</dd>
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
                        @if($posts->count() > 0)
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
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category }}</td>
                                                <td>{{ $post->published_at ? $post->published_at->format('d/m/Y') : 'No publicada' }}</td>
                                                <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted mb-0">Este usuario no ha creado ningún post aún.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

