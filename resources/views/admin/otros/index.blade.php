@extends('layouts.app')

@section('content')

{{-- Link para los estilos de los iconos --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<div class="row">

    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="card-header">Agregar Simulador</div>
            <div class="card-body">

                @if(session('notification1'))
                <div class="alert alert-success">
                    {{ session('notification1') }}
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
            <div class="card-header">Administrar Simuladores</div>
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
                            <th>
                                <button href="/simuladores/editar" class="btn btn-info" title="Editar" data-simulador="{{ $simulador->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="/simuladores/{{ $simulador-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </th>

                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="card-header">Agregar tipo de Sala</div>
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

                <form action="/tiposala" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nombre">Nombre del tipo de Sala</label>
                        <input name="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Agregar Tipo de Sala</button>
                    </div>

                </form>

            </div>
        </div>
        <div class="card border-primary mb-3">
            <div class="card-header">Administrar tipo de sala</div>
            <div class="card-body">

                <table class="table table-bordered table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr class="warning">
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    @foreach($tipos_sala as $tipo_sala)
                    <tbody>
                        <tr>
                            <td>{{ $tipo_sala->id }}</td>
                            <td>{{ $tipo_sala->nombre }}</td>
                            <th>
                                <button href="/tiposala/editar" class="btn btn-info" title="Editar" data-tiposala="{{ $tipo_sala->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="/tiposala/{{ $tipo_sala-> id }}/eliminar" class="btn btn-danger" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </th>

                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditSimulador">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header text-white bg-primary" >
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditTipoSala">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-primary">
                <h4 class="modal-title">Editar tipo de Sala</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <form action="/tiposala/editar" method="POST">
                {{ csrf_field() }}
                <div class="modal-body bg-light">

                    <input type="hidden" name="tiposala_id" id="tiposala_id" value=" "></input>
                    <div class="form-group">
                        <label for="nombre"><b> Nombre del tipo de Sala</b></label>
                        <input type="text" class="form-control" name="nombre" id="tiposala_name" value=" ">
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
<script src="/js/admin/otros/edit.js"></script>
@endsection
