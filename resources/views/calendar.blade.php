@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="fullcalendar/packages/core/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/daygrid/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/timegrid/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/list/main.css" />

<link rel="stylesheet" href="/css/fullcalendar-custom.css" />

<script src="/fullcalendar/packages/core/main.js"></script>
<script src="/fullcalendar/packages/core/locales/es.js"></script>
<script src="/fullcalendar/packages/interaction/main.js"></script>

<script src="/fullcalendar/packages/timegrid/main.js"></script>
<script src="/fullcalendar/packages/daygrid/main.js"></script>
<script src="/fullcalendar/packages/list/main.js"></script>

<script src="/fullcalendar/packages/resource-common/main.js"></script>
<script src="/fullcalendar/packages/resource-timegrid/main.js"></script>
<script src="/fullcalendar/packages/resource-daygrid/main.js"></script>

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('notification'))
<div class="alert alert-success">
    {{ session('notification') }}
</div>
@endif


<div class="card border-primary mb-3">
    <div class="card-header">Bienvenido - Sistema de gestión de la ocupación del Hospital Simulado de la UEM</div>

    <div class="card-body">

        <div id="calendar"></div>

    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalDropEvent">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header text-white bg-primary">
                <h4 class="modal-title ">Mover evento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <form action="/eventos" method="POST">
                {{ csrf_field() }}
                <div class="modal-body bg-light">

                    <input type="hidden" name="evento_id" id="evento_id" value=""></input>

                    <div class="form-group">
                        <label for="nombre"><b>Nombre del Evento</b></label>
                        <input type="text" class="form-control" name="nombre" id="evento_name" readonly value=" ">
                    </div>

                    <div class="form-group">
                        <label for="start_date"><b>Fecha de inicio</b></label>
                        <input type="datetime-local" class="form-control" name="start_date" placeholder="Introduce la fecha de inicio" id="evento_start" readonly value=""></input>
                    </div>

                    <div class="form-group">
                        <label for="end_date"><b>Fecha de fin</b></label>
                        <input type="datetime-local" class="form-control" name="end_date" placeholder="Introduce la fecha de inicio" id="evento_end" readonly value=""></input>
                    </div>

                    <input type="hidden" name="id_sala" id="id_sala" value=""></input>

                    <div class="form-group">
                        <label for="sala" id="titulo_sala"><b>Sala</b></label>
                        <input type="text" class="form-control" name="nombre" id="nombre_sala" readonly value=" ">
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
<script src="/fullcalendar/packages/core/main.js"></script>
<script src="/fullcalendar/packages/core/locales/es.js"></script>
<script src="/fullcalendar/packages/interaction/main.js"></script>

<script src="/fullcalendar/packages/timegrid/main.js"></script>
<script src="/fullcalendar/packages/daygrid/main.js"></script>
<script src="/fullcalendar/packages/list/main.js"></script>

<script src="/fullcalendar/packages/resource-common/main.js"></script>
<script src="/fullcalendar/packages/resource-timegrid/main.js"></script>
<script src="/fullcalendar/packages/resource-daygrid/main.js"></script>

<script src="/js/calendar.js"></script>
@endsection
