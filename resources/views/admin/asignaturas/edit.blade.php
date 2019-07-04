@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/importar.css" />

<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Editar Asignatura</u></b></div>
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
                <label for="nombre">Nombre de la asignatura</label>
                <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre', $asignatura->nombre) }}"></input>
            </div>

            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input name="codigo" name="codigo" class="form-control" value="{{ old('codigo', $asignatura->codigo) }}"></input>
            </div>


            <div class="form-group">
                <label for="grado">Grado</label>
                <select name="grado" class="form-control">
                    <option value="{{ old('grado', $asignatura->grado) }}">{{ old('grado', $asignatura->grado) }}</option>
                    <option value="Otros">Otros</option>
                    <option value="Fisioterapia">Fisioterapia</option>
                    <option value="Enfermeria">Enfermería</option>
                    <option value="Farmacia">Farmacia</option>
                    <option value="Medicina">Medicina</option>
                    <option value="Odontologia">Odontología</option>
                    <option value="Psicologia">Psicologia</option>
                    <option value="Ciclos Formativos">Ciclos Formativos</option>
                </select>
            </div>

            <div class="form-group">
                <label for="curso">Curso</label>
                <select name="curso" class="form-control">
                    <option value="{{ old('curso', $asignatura->curso) }}">{{ old('curso', $asignatura->curso) }}º</option>
                    <option value="0">Otros</option>
                    <option value="1">1º</option>
                    <option value="2">2º</option>
                    <option value="3">3º</option>
                    <option value="4">4º</option>
                    <option value="5">5º</option>
                    <option value="6">6º</option>
                </select>
            </div>

            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" name="grupo" class="form-control" value="{{ old('grupo', $asignatura->grupo) }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Actualizar Asignatura</button>
                <a href="/asignaturas" class="btn btn-info"> Atrás </a>
            </div>
            

        </form>

    </div>
</div>
@endsection

