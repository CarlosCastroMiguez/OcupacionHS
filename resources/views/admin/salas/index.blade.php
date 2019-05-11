@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
            {{ csrf_field() }}

            <div class="form-group">
                <label for="tipo">Nombre de la sala</label>
                <input name="tipo" name="tipo" class="form-control" value="{{ old('tipo') }}"></input>
            </div>
            <div class="form-group">
                <label for="capacidad">Capacidad de la sala</label>
                <input name="capacidad" name="capacidad" class="form-control" value="{{ old('capacidad') }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Agregar Sala</button>
            </div>

        </form>

    </div>
</div>

<div class="card border-primary mb-3">
    <div class="card-header">Administrar Salas</div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            @foreach($salas as $sala)
            <tbody>
                <tr>
                    <td>{{ $sala->id }}</td>
                    <td>{{ $sala->tipo }}</td>
                    <td>{{ $sala->capacidad }}</td>

                    <td>
                        @if($sala->trashed())
                            <a href="/salas/{{ $sala-> id }}/restaurar" class="btn btn-success" title="Restaurar">
                                <i class="fas fa-sync"></i>
                            </a>
                        @else
                            <a href="/salas/{{ $sala-> id }}" class="btn btn-info" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/salas/{{ $sala-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif

                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
