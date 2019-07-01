@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/style.css" />
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
    <div class="card-header"> <b><u>Bienvenido - Sistema de gestión de la ocupación del Hospital Simulado de la UEM</u></b></div>

    <div class="card-body">

        <p>La <b>Facultad de Ciencias Biomédicas y de la Salud</b> para conseguir los objetivos de desarrollo de habilidades preclínicas dispone de diferentes espacios de modelos preclínicos, que son polivalentes en su uso, convirtiéndose, dependiendo del curso y las materias, en aulas de distintos tipos con las carácterisitcas para desarrollar ciertas metodologías, conocimientos y competencias.
        </p>
        <p>
            Con esta herramienta, los administradores del sitio web tendrán la capacidad de administrar de una forma sencilla y visual los distintos espacios disponibles en el Hospital Simulado de la <b>Universidad Europea de Madrid</b> así como gestionar y asignar a los profesores de forma rápida.
        </p>
        <p>
            Por otro lado, los usuarios podrán registrarse en la web y consultar la ocupación de los espacios de cara a solicitar reservas de aulas al departamento de administración del sitio.
        </p>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <!--/panel-header-->
                    <div class="list-group">
                       
                        <div class="list-group-item disabled divider"><i class="fas fa-info-circle"></i> Información</div>
                        
                        <a target="_blank" href="https://universidadeuropea.es/" class="list-group-item">
                            <i class="fas fa-university"></i>
                            <span class="text-primary">Nuestra Universidad</span>
                        </a>
                        <a target="_blank" href="https://biomedicasysalud.universidadeuropea.es/instalaciones/hospital-simulado" class="list-group-item">
                            <i class="fas fa-hospital"></i>
                            <span class="text-primary">Hospital Simulado UEM</span>
                        </a>
                        
                        <div class="list-group-item disabled divider"><i class="fas fa-link"></i> Enlaces de Interés</div>
                        
                        <a target="_blank" href="http://esp.uem.es/hsimulado/" class="list-group-item">
                            <i class="fas fa-boxes"></i>
                            <span class="text-primary">Gestor de Inventario HSUEM</span>
                        </a>

                        <div class="list-group-item disabled divider"><i class="fas fa-at"></i> Contacto</div>

                        <a href="mailto:ocupacionuem@gmail.com?Subject=[OcupacionHS]" class="list-group-item list-group-item-info">
                            <i class="fas fa-envelope"></i>
                            <span class="text-primary">Enviar email</span>
                        </a>
                    </div>
                    <!--/list-group-->
                    <div class="panel-footer"></div>
                </div>
                <!--/panel panel-primary-->
            </div>
            <!--/col-md-12-->

        </div>
        <!--/row-->


    </div>
</div>

@endsection
