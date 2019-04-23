@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Editar Sala</div>
    <div class="card-body">

        @if(session('notification'))
        <div class="alert alert-success">
            {{ session('notification') }}
        </div>
        @endif

        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="tipo">Tipo de Sala</label>
                <select name="tipo" class="form-control">
                    <option value="{{ old('tipo', $sala->tipo) }}">{{ old('tipo', $sala->tipo) }}</option>
                    @foreach($tipos_sala as $tipo)
                    <option value="{{ $tipo -> nombre }}">{{ $tipo -> nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad de la sala</label>
                <input name="capacidad" name="capacidad" class="form-control" value="{{ old('capacidad' , $sala->capacidad) }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Actualizar Sala</button>
                <a href="/salas" class="btn btn-info"> Atrás </a>

            </div>

        </form>

    </div>
</div>
@endsection

