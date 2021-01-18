@extends('app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 my-3 mx-auto">
                <form action="{{ route('messages.store') }}" method="post">
                    @if (auth()->check())
                        <h1>Enviar mensaje</h1>
                    @else
                        <h1>Contáctame</h1>
                    @endif
                    @include('messages._form', ['btnText' => 'Enviar', 'showFields' => auth()->guest()])
                </form>
            </div>
        </div>
    </section>
@endsection
