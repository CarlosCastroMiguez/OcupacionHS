<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Menú</u></b></div>

    <div class="card-body">

        <div class="list-group">

            @if (auth()->check())
            <a href="{{ url('/') }}" class="list-group-item @if(request()->is('/*')) active @endif">
                Inicio
            </a>
            <a href="{{ url('/calendario') }}" class="list-group-item @if(request()->is('calendario*')) active @endif">
                Calendario
            </a>
            <a href="{{ url('/eventos') }}" class="list-group-item @if(request()->is('eventos*')) active @endif @if(request()->is('ver*')) active @endif">
                Lista eventos
            </a>

                @if (auth()->user()->is_admin)
                <a href="{{ url('/crearevento') }}" class="list-group-item @if(request()->is('crearevento*')) active @endif">
                    Crear Evento
                </a>

                <a href="{{ url('/importar') }}" class="list-group-item @if(request()->is('importar*')) active @endif">
                    Importar Eventos
                </a>

                <ul class="list-group-item list-group-flush @if(request()->is('salas')) active @endif @if(request()->is('profesores*')) active @endif @if(request()->is('asignaturas*')) active @endif @if(request()->is('simuladores*')) active @endif">
                    <a class="nav-item dropdown">
                        <a class="nav-link- dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/salas">Salas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/profesores">Profesores</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/asignaturas">Asignaturas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/simuladores">Simuladores</a>
                        </div>
                    </a>

                </ul>
                @endif

            @else
            <a href="{{ url('/') }}" class="list-group-item @if(request()->is('/')) active @endif">
                Inicio
            </a>
            @endif
        </div>
    </div>
</div>
