@extends('layouts.layout')

@section('title', "Pago {$payment->id}")

@section('content')

    <h1> {{ $title }}</h1>

    <ul>
        <p></p>Pago: {{ $payment->id }}
        <p></p>Importe:    {{ $payment->importe }}
        <p></p>Fecha:    {{ $payment->created_at }}
    </ul>
    @foreach($payment->users as $user)
        Pertenece al Usuario: <a href="{{ route('user.show', $user->id) }}"><strong>{{ $user->username }}</strong></a>
    @endforeach

    <hr>
    <p><p></p>
        <a href="{{ route('payment.index') }}">Regresar al listado</a>
    </p>
@endsection
