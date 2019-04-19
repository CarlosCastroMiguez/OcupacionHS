<div class="card border-primary mb-3">
    <div class="card-header">Menú</div>

    <div class="card-body">

        <div class="list-group">
            @if (auth()->check())
            <a href="{{ url('/home') }}" class="list-group-item list-group-item">
                Inicio
            </a>
            <a href="{{ url('/ver') }}" class="list-group-item list-group-item">
                Ver incidencias
            </a>
            <a href="{{ url('/report') }}" class="list-group-item list-group-item">
                Reportar incidencias
            </a>
            <a href="{{ url('/usuarios') }}" class="list-group-item list-group-item">
                Usuarios
            </a>
            <a href="{{ url('/proyectos') }}" class="list-group-item list-group-item">
                Proyectos
            </a>
            <a href="{{ url('/config') }}" class="list-group-item list-group-item">
                Configuración
            </a>
            
            @else
            <a href="{{ url('/') }}" class="list-group-item list-group-item">
                Bienvenido
            </a>
            <a href="{{ url('/') }}" class="list-group-item list-group-item">
                Instrucciones
            </a>
            <a href="{{ url('/') }}" class="list-group-item list-group-item">
                Créditos
            </a>
            @endif
        </div>
    </div>
</div>
