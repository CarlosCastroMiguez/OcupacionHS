@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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

<div class="card border-primary mb-3">
    <div class="card-header">Lista de eventos</div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-6 text-left">
                Ordenar ID:
                <a href="{{route('eventos.index', ['id_sala' => request('id_sala') , 'id_asignatura' => request('id_asignatura') , 'sort' => 'asc']) }}"> Ascendiente </a> |
                <a href="{{route('eventos.index', ['id_sala' => request('id_sala') , 'id_asignatura' => request('id_asignatura') , 'sort' => 'desc']) }}"> Descendiente </a>

            </div>
            <div class="col-md-6 text-right">
                Filtrar :
                <a href="/eventos"> Todos </a> |
                <a href="/eventos/?id_sala=1"> Hospital </a> |
                <a href="/eventos/?id_sala=2"> TT </a> |
                <a href="/eventos/?id_sala=3"> C1 </a> |
                <a href="/eventos/?id_sala=4"> C2 </a> |
                <a href="/eventos/?id_sala=5"> C3 </a> |
                <a href="/eventos/?id_sala=6"> C4 </a> |
                <a href="/eventos/?id_sala=7"> SC1 </a> |
                <a href="/eventos/?id_sala=8"> SC2 </a>
                <a href="/eventos/?id_sala=9"> SC3 </a> |
                <a href="/eventos/?id_sala=10"> SC4 </a> |
                <a href="/eventos/?id_sala=11"> Apoyo </a> |
                <a href="/eventos/?id_sala=12"> Q048 </a> |
                <a href="/eventos/?id_sala=13"> FC </a> |
                <a href="/eventos/?id_sala=14"> FH </a> |
                <a href="/eventos/?id_sala=15"> Ambulancia </a>
                <br>
                <br>


            </div>
        </div>

        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Asignatura</th>
                    <th>Sala</th>
                    <th>Fecha de inicio</th>
                    <th>Alumnos</th>
                    @if(auth()->user()->is_admin)
                    <th>Opciones</th>
                    @endif
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
                    <td>{{ $evento->nombre_short }}</td>
                    <td>{{ $evento->asignatura->grado}}</td>
                    <td>{{ $evento->sala_short }}</td>
                    <td>{{ $evento->start_date }}</td>
                    <td>{{ $evento->numAlumnos }}</td>
                    @if(auth()->user()->is_admin)
                    <td>
                        <a href="/eventos/{{ $evento-> id }}" class="btn btn-info" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/eventos/{{ $evento-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
        {{$eventos->links()}}
    </div>
</div>

@endsection
