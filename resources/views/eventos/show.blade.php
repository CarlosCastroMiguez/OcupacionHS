@extends('layouts.app')

@section('content')

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
                    <td>{{ $evento->nombre }}</td>
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
                    <td>{{ $evento ->id_sala }}</td>

                </tr>
                <tr>
                    <th>Profesor</th>
                    <td>{{ $evento ->id_profesor }}</td>

                </tr>
                <tr>
                    <th>Asignatura</th>
                    <td>{{ $evento ->id_asignatura }}</td>

                </tr>
                <tr>
                    <th>Simulador</th>
                    <td>{{ $evento ->id_simulador ?: 'Sin simulador' }}</td>

                </tr>
            </tbody>

        </table>


    </div>
</div>
@endsection
