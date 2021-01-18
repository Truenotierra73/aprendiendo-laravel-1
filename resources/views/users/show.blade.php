@extends('app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($user->roles as $role)
                            <li class="list-group-item">{{ $role->alias }}</li>
                        @endforeach
                    </ul>
                    <div class="card-body">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('users.index') }}">Atrás</a>
                        <a class="btn btn-outline-secondary btn-sm"
                            href="{{ route('users.edit', $user->id) }}">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
