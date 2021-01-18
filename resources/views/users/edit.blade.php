@extends('app')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 my-3 mx-auto">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                <h1>Editar</h1>
                @method('PUT')
                @include('users._form', ['btnText' => 'Actualizar'])
                <a class="btn btn-danger" href="{{ route('users.show', $user->id) }}">Cancelar</a>
            </form>
        </div>
    </div>
</section>
@endsection