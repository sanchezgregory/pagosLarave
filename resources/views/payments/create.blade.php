@extends('layouts.layout')

@section('title', "{$title}")

@section('content')

    <h1> {{ $title }}</h1>

    <form action="{{ route('payment.store') }}" method="post">
        {!! csrf_field() !!}

        <div class="form-group">

            <select class="selectpicker" name="username" data-show-subtext="true" data-live-search="true">
                <option value="">Busque un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="usuario">Importe:</label>
            <input type="number" class="form-control" value="{{ old('importe') }}" name = "importe" aria-describedby="importeHelp" placeholder="Enter importe">
        </div>
        <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="reset" class="btn btn-danger">Limpiar</button>

    </form>
@endsection
