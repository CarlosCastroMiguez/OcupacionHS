@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Editar Evento</div>
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
            {{csrf_field() }}

            <div class="form-group">
                <label for="nombre">Nombre del evento</label>
                <input type="text" class="form-control" name="nombre" placeholder="Introduce el nombre" value="{{ old('nombre', $evento->nombre) }}"></input>
            </div>
            <div class="form-group">
                <label for="numAlumnos">Número de alumnos</label>
                <input type="text" class="form-control" name="numAlumnos" placeholder="Introduce el numero de alumnos" value="{{ old('numAlumnos', $evento->numAlumnos) }}"></input>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Fecha de inicio</label>
                        <input type="datetime-local" class="form-control" name="start_date" placeholder="Introduce la fecha de inicio" value="{{ old('start_date', $evento->fecha_inicio) }}"></input>
                    </div>

                    <div class="form-group">
                        <label for="sala">Sala</label>
                        <select name="sala" class="form-control">
                            <option value="{{ $evento->sala->id }}">{{ $evento->tipo_sala }}</option>
                            @foreach($salas as $sala)
                            <option value="{{ $sala -> id }}"> {{$sala->tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="profesor">Profesor</label>
                        <select name="profesor" class="form-control">
                            <option value="{{ $evento->id_profesor }}">{{ $evento->profesor->nombre }}</option>
                            @foreach($profesores as $profesor)
                            <option value="{{ $profesor->id }}"> {{$profesor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="simulador">Simulador</label>
                        <select name="simulador" class="form-control">
                            <option value="{{ $evento->id_simulador }}">{{ $evento->nombre_simulador }}</option>
                            <option value=" ">Sin simulador</option>
                            @foreach($simuladores as $simulador)
                            <option value="{{ $simulador -> id }}"> {{$simulador->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_date">Fecha de fin</label>
                        <input type="datetime-local" class="form-control" name="end_date" placeholder="Introduce la fecha de inicio" value="{{ old('end_date', $evento->fecha_final) }}"></input>
                    </div>
                    
                    <div class="form-group">
                        <label for="grado"><b>Grado</b></label>
                        <input type="text" class="form-control" name="grado" readonly value="{{ old('grado', $evento->asignatura->grado) }} ">
                    </div>
                    
                    <div class="form-group">
                        <label for="asignatura"><b>Asignatura</b></label>
                        <input type="text" class="form-control" name="asignatura" readonly value="{{ old('asignatura', $evento->asignatura->nombre) }} ">
                    </div>
                    
                    <div class="form-group">
                        <label for="grupo"><b>Grupo</b></label>
                        <input type="text" class="form-control" name="grupo" readonly value="{{ old('grupo', $evento->asignatura->grupo) }} ">
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <label for="actor">Descripción del actor<em> - Introducir en caso de requerir sus servicios</em></label>
                <textarea name="actor" class="form-control" placeholder="Introducir en caso de requerir sus servicios">{{ old('actor', $evento->actor) }}</textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Actualizar Evento</button>
                <a href="/calendario" class="btn btn-info"> Atrás </a>

            </div>
        </form>

    </div>
</div>
@endsection

