@extends('layouts.layout')

@section('title', "{$title}")

@section('content')

    <h1> {{ $title }}</h1>

    <form action="" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" id="usuario" aria-describedby="usuarioHelp" placeholder="Enter usuario">

        </div>
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" class="form-control" id="edad" aria-describedby="edadHelp" placeholder="Enter edad">
            <small id="emailHelp" class="form-text text-muted">inserte el dato real de su edad.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Aceptar</button>
        <button type="reset" class="btn btn-danger">Limpiar</button>

    </form>
@endsection
