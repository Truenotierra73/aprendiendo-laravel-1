@extends('app')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 my-3 mx-auto">
            <form action="{{ route('users.store') }}" method="post">
                <h1>Nuevo usuario</h1>
                @include('users._form', ['btnText' => 'Crear'])
                <a class="btn btn-danger" href="{{ route('users.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
</section>
@endsection