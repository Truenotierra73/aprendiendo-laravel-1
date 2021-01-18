@extends('app')

@section('content')
    <section class="container">
        <div class="d-flex flex-row align-items-center">
            <span class="d-felx justify-content-between mr-auto">
                <h1>Usuarios</h1>
            </span>
            <span class="d-felx justify-content-between">
                <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">Crear usuario</a>
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Role</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Fecha de actualización</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="text-center">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->roles->pluck('alias')->implode(' - ') }}</td>
                            {{-- @foreach ($user->roles as $userRole)
                                <td>{{ $userRole->alias }}</td>
                            @endforeach --}}
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', $user->id) }}">Ver</a>
                                <a class="btn btn-secondary btn-sm" href="{{ route('users.edit', $user->id) }}">Editar</a>
                                <form id="delete-user" method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <p>No hay usuarios para mostrar.</p>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
