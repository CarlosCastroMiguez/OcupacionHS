@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Agregar Sala</div>
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
                <input type="text" class="form-control" name="nombre" placeholder="Introduce el nombre" value="{{ old('nombre') }}" required></input>
            </div>
            <div class="form-group">
                <label for="numAlumnos">Número de alumnos</label>
                <input type="text" class="form-control" name="numAlumnos" placeholder="Introduce el numero de alumnos" value="{{ old('numAlumnos') }}" required></input>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Fecha de inicio</label>
                        <input type="datetime-local" class="form-control" name="start_date" placeholder="Introduce la fecha de inicio" value="{{ old('start_date') }}" required></input>
                    </div>

                    <div class="form-group">
                        <label for="sala">Sala</label>
                        <select name="sala" class="form-control">
                            @foreach($salas as $sala)
                            <option value="{{ $sala -> id }}"> {{$sala->tipo}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="grado">Grado</label>
                        <select name="grado" class="form-control" id="select-grado">
                            <option value="Fisioterapia">Fisioterapia</option>
                            <option value="Enfermeria">Enfermería</option>
                            <option value="Farmacia">Farmacia</option>
                            <option value="Medicina">Medicina</option>
                            <option value="Odontologia">Odontología</option>
                            <option value="Biotecnologia">Biotecnología</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="asignatura">Asignatura</label>
                        <select name="asignatura" class="form-control" id="select-asignatura">
                            <option value=""> Seleccione asignatura</option>
                        </select>
                    </div>
                    


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_date">Fecha de fin</label>
                        <input type="datetime-local" class="form-control" name="end_date" placeholder="Introduce la fecha de fin" value="{{ old('end_date') }}" required></input>
                    </div>

                    <div class="form-group">
                        <label for="grupo">Grupo</label>
                        <select name="grupo" class="form-control" id="select-grupo">
                            <option value=""> Seleccione grupo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="profesor">Profesor</label>
                        <select name="profesor" class="form-control">
                            @foreach($profesores as $profesor)
                            <option value="{{ $profesor -> id }}"> {{$profesor->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="simulador">Simulador</label>
                        <select name="simulador" class="form-control">
                            <option value=" ">Sin simulador</option>
                            @foreach($simuladores as $simulador)
                            <option value="{{ $simulador -> id }}"> {{$simulador->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar Evento</button>
                <a href="/calendario" class="btn btn-info"> Atrás </a>

            </div>
        </form>

    </div>
</div>
@endsection

@section('scripts')
    <script src="/js/admin/evento/crear.js"></script>
@endsection
