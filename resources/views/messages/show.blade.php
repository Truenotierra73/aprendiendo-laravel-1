@extends('app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $message->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $message->email }}</h6>
                        <p class="card-text">{{ $message->content }}</p>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('messages.index') }}">Atrás</a>
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('messages.edit', $message->id) }}">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
