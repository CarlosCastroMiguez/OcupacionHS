@extends('layouts.app')

@section('content')

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
    <div class="card-header">Dashboard</div>

    <div class="card-body">

        <p>Hola, {{ $name }}, has iniciado sesión hoy {{ date('d-m-Y H:m:s') }}</p>

    </div>
</div>

@endsection
