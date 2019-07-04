@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/importar.css" />

<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Editar Profesor</u></b></div>
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
                <label for="nombre">Nombre del profesor</label>
                <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre', $profesor->nombre) }}"></input>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido del profesor</label>
                <input name="apellido" name="apellido" class="form-control" value="{{ old('apellido', $profesor->apellido) }}"></input>
            </div>

            <div class="form-group">
                <label for="departamento">Departamento</label>
                <input name="departamento" name="departamento" class="form-control" value="{{ old('departamento', $profesor->departamento) }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Actualizar Profesor</button>
                <a href="/profesores" class="btn btn-info"> Atrás </a>

            </div>

        </form>

    </div>
</div>
@endsection

