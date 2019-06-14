@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Agregar Asignatura</u></b></div>
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

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="nombre">Nombre de la asignatura</label>
                        <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"></input>
                    </div>

                    <div class="form-group">
                        <label for="grado">Grado</label>
                        <select name="grado" class="form-control">
                            <option value="{{ old('grado')}} ">{{ old('grado', 'Seleccione grado') }}</option>
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

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input name="codigo" name="codigo" class="form-control" value="{{ old('codigo') }}"></input>
                    </div>

                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <select name="curso" class="form-control">
                            <option value="{{ old('curso')}} ">{{ old('curso' , 'Seleccione curso') }}</option>
                            <option value="0">Otros</option>
                            <option value="1">1º</option>
                            <option value="2">2º</option>
                            <option value="3">3º</option>
                            <option value="4">4º</option>
                            <option value="5">5º</option>
                            <option value="6">6º</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="grupo">Grupo</label>
                <input name="grupo" name="grupo" class="form-control" value="{{ old('grupo') }}"></input>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Agregar Asignatura</button>
            </div>

        </form>

    </div>
</div>
<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Administrar Asignaturas</u></b></div>
    <div class="card-body">

        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Grado</th>
                    <th>Curso</th>
                    <th>Grupo</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            @foreach($asignaturas as $asignatura)
            <tbody>
                <tr>
                    <td>{{ $asignatura->id }}</td>
                    <td>{{ $asignatura->nombre }}</td>
                    <td>{{ $asignatura->codigo }}</td>
                    <td>{{ $asignatura->grado }}</td>
                    <td>{{ $asignatura->curso }}</td>
                    <td>{{ $asignatura->grupo }}</td>

                    <td>
                        @if($asignatura->trashed())
                        <a href="/asignaturas/{{ $asignatura-> id }}/restaurar" class="btn btn-success" title="Restaurar">
                            <i class="fas fa-sync"></i>
                        </a>
                        @else
                        <a href="/asignaturas/{{ $asignatura-> id }}" class="btn btn-info" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/asignaturas/{{ $asignatura-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endif

                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
        {{$asignaturas->links()}}
    </div>
</div>
@endsection
