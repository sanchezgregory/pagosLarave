@extends('layouts.layout')

@section('title', "Pagos")

@section('content')

    <h1> {{ $title }}</h1>

    <ul>
        @forelse ($payments as $payment)

            <li> {{ $payment->importe }} - ({{ $payment->created_at }})
                <a href='{{ route('payment.show', $payment->id) }}'>Ver</a>
                <a href="{{ route('payment.edit', $payment->id) }}">Editar</a>
            </li>
        @empty
            <li> No hay pagos registrados</li>
        @endforelse
    </ul>

@endsection
