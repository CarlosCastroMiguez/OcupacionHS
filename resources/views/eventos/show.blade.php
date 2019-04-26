@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="card border-primary mb-3">
    <div class="card-header">Detalles del evento</div>

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

        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre_short }}</td>
                    <td>{{ $evento->start_date }}</td>
                    <td>{{ $evento->end_date }}</td>
                </tr>
            </tbody>

        </table>

        <table class="table table-bordered table-striped table-hover ">

            <tbody>
                <tr>
                    <th>Alumnos</th>
                    <td>{{ $evento ->numAlumnos }}</td>

                </tr>
                <tr>
                    <th>Sala</th>
                    <td>{{ $evento ->sala->tipo }}</td>

                </tr>
                <tr>
                    <th>Profesor</th>
                    <td>{{ $evento ->profesor->nombre }}</td>

                </tr>
                <tr>
                    <th>Asignatura</th>
                    <td>{{ $evento ->asignatura->nombre }}</td>

                </tr>
                <tr>
                    <th>Simulador</th>
                    <td>{{ $evento ->nombre_simulador }}</td>

                </tr>
            </tbody>

        </table>

        <a href="/eventos" class="btn btn-info"> Atrás </a>

        @if(auth()->user()->is_admin)
        <a href="/eventos/{{ $evento-> id }}" class="btn btn-info" title="Editar">
            <i class="fas fa-edit"></i>
        </a>
        <a href="/eventos/{{ $evento-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
            <i class="fas fa-trash"></i>
        </a>

        @endif

    </div>

</div>
@endsection
