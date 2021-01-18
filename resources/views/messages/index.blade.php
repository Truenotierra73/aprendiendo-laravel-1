@extends('app')

@section('content')
    <section class="container">
        <h1>Mensajes</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Etiquetas</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Fecha de actualización</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr class="text-center">
                            <td>{{ $loop->index + 1 }}</td>
                            @if ($message->user_id)
                                <td>{{ $message->user->name }}</td>
                                <td>{{ $message->user->email }}</td>
                            @else
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                            @endif
                            <td>{{ $message->content }}</td>
                            <td>{{ $message->note->body ?? '' }}</td>
                            <td>{{ $message->tags->pluck('name')->implode(', ') }}</td>
                            <td>{{ $message->created_at }}</td>
                            <td>{{ $message->updated_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('messages.show', $message->id) }}">Ver</a>
                                <a class="btn btn-secondary btn-sm" href="{{ route('messages.edit', $message->id) }}">Editar</a>
                                <form id="delete-message" method="POST"
                                    action="{{ route('messages.destroy', $message->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <p>No hay mensajes para mostrar.</p>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $messages->links() }}
    </section>
@endsection
