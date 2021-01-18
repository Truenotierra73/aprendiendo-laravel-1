@extends('app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 my-3 mx-auto">
                <form action="{{ route('messages.update', $message->id) }}" method="post">
                    <h1>Editar</h1>
                    @method('PUT')
                    @include('messages._form', ['btnText' => 'Actualizar', 'showFields' => ! $message->user_id])
                    <a class="btn btn-danger" href="{{ route('messages.show', $message->id) }}">Cancelar</a>
                </form>
            </div>
        </div>
    </section>
@endsection