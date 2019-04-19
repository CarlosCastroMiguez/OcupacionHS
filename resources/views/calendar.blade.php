@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="fullcalendar/packages/core/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/daygrid/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/timegrid/main.css" />
<link rel="stylesheet" href="fullcalendar/packages/list/main.css" />


<script src="/fullcalendar/packages/core/main.js"></script>
<script src="/fullcalendar/packages/core/locales/es.js"></script>

<script src="/fullcalendar/packages/timegrid/main.js"></script>
<script src="/fullcalendar/packages/daygrid/main.js"></script>
<script src="/fullcalendar/packages/list/main.js"></script>

<script src="/fullcalendar/packages/resource-common/main.js"></script>
<script src="/fullcalendar/packages/resource-timegrid/main.js"></script>
<script src="/fullcalendar/packages/resource-daygrid/main.js"></script>

<div class="card border-primary mb-3">
    <div class="card-header">Bienvenido - Sistema de gestión de la ocupación del Hospital Simulado de la UEM</div>

    <div class="card-body">

        <div id="calendar"></div>

    </div>
</div>

@endsection

@section('scripts')
    <script src="/js/calendar.js"></script>
@endsection

