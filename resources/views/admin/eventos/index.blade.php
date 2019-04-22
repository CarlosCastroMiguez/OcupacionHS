@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="card border-primary mb-3">
    <div class="card-header">Lista de eventos</div>
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
                    <th>Alumnos</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Sala</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            @foreach($eventos as $evento)
            <tbody>
                <tr>
                    <td>
                        <a href="/ver/{{ $evento->id }}">
                            {{ $evento->id }}
                        </a>
                    </td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->numAlumnos }}</td>
                    <td>{{ $evento->start_date }}</td>
                    <td>{{ $evento->end_date }}</td>
                    <td>{{ $evento->id_sala }}</td>
                    <td>
                        <a href="/eventos/{{ $evento-> id }}" class="btn btn-info" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/eventos/{{ $evento-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

@endsection
