@extends('layouts.layout')

@section('title', "Usuarios")

@section('content')

    <h1> {{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
            <li> {{ $user->username }} - ({{ $user->age }})
                <a href='{{ route('user.show', $user->id) }}'>Ver</a>
                <a href="{{ route('user.edit', $user->id) }}">Editar</a>
                Pagos del usuario:
                <ul>
                    @foreach($user->payments as $payment)
                        <li>Importe: {{ $payment->importe }} | Fecha: {{ $payment->created_at }}</li>
                    @endforeach
                </ul>
            </li>
            <hr>
        @empty
            <li> No hay usuarios registrados</li>
        @endforelse
    </ul>

@endsection

@section('sidebar')

    {{--@parent --}} {{-- // muestra el contenido de la section primaria o padre--}}

    <h2>Barra lateral personalizada</h2>

@endsection