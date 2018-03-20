@extends('layouts.layout')

@section('title', "Usuario {$user->id}")

@section('content')

    <h1> {{ $title }}</h1>

    <ul>
        <p></p>Usuario: {{ $user->username }}
        <p></p>Edad:    {{ $user->age }}
    </ul>

    <h3>Pagos del usuario:</h3>

    @foreach($user->payments as $payment)
        <li>Importe: {{ $payment->importe }}  Fecha: {{ $payment->created_at }}</li>

    @endforeach

    <p>
        <a href="{{ route('user.index') }}">Regresar al listado</a>
    </p>
@endsection

@section('sidebar')
    <h1>Favoritos del usuario: {{ count($usersfav) }}</h1>

    @foreach($usersfav as $item)
        <li>{{ $item->username }}</li>
        @endforeach
    <hr>
    Elegir otros:
    <p></p>
    <form action="{{route('user.favorite', $user->id)}}" method="post">
        {!! csrf_field() !!}
        @foreach($usersNotFav as $user)
            <input type="checkbox" name="fav[]" value="{{ $user->id }}"> {{$user->username}} <br>
        @endforeach
            <input type="submit" value="Aceptar">
    </form>
@endsection