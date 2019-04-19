@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        
        <p>Hola, {{ $name }}, has iniciado sesión hoy  {{ date('d-m-Y') }}</p>

    </div>
</div>

@endsection
