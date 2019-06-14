@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
    <div class="card-header"><b><u>Agregar Simulador</u></b></div>
    <div class="card-body">

        @if(session('notification'))
        <div class="alert alert-success">
            {{ session('notification') }}
        </div>
        @endif

        <form action="/simuladores" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="nombre">Nombre del Simulador</label>
                <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"></input>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Agregar Simulador</button>
            </div>

        </form>

    </div>
</div>
<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Administrar Simuladores</u></b></div>
    <div class="card-body">

        <table class="table table-bordered table-striped table-hover ">
            <thead class="thead-dark">
                <tr class="warning">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            @foreach($simuladores as $simulador)
            <tbody>
                <tr>
                    <td>{{ $simulador->id }}</td>
                    <td>{{ $simulador->nombre }}</td>
                    <td>
                        @if($simulador->trashed())
                        <a href="/simuladores/{{ $simulador-> id }}/restaurar" class="btn btn-success" title="Restaurar">
                            <i class="fas fa-sync"></i>
                        </a>
                        @else
                        <button href="/simuladores/editar" class="btn btn-info" title="Editar" data-simulador="{{ $simulador->id}}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="/simuladores/{{ $simulador-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                        @endif

                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
        {{$simuladores->links()}}

    </div>
</div>




<div class="modal fade" tabindex="-1" role="dialog" id="modalEditSimulador">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header text-white bg-primary">
                <h4 class="modal-title ">Editar Simulador</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <form action="/simuladores/editar" method="POST">
                {{ csrf_field() }}
                <div class="modal-body bg-light">

                    <input type="hidden" name="simulador_id" id="simulador_id" value=" "></input>
                    <div class="form-group">
                        <label for="nombre"> <b>Nombre del simulador </b></label>
                        <input type="text" class="form-control" name="nombre" id="simulador_name" value=" ">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('scripts')
<script src="/js/admin/simuladores/edit.js"></script>
@endsection
