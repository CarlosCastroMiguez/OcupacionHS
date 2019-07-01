@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link rel="stylesheet" href="/css/importar.css" />

@if(session('notification'))
<div class="alert alert-success">
    {{ session('notification') }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Importar Eventos</u></b></div>
    <div class="card-body">

        <form method="POST" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="csv" class="form-control">
            <br>
            <button class="btn btn-success"><i class="fas fa-upload"></i> Importar Archivo</button>

        </form>

    </div>
</div>

<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Exportar Eventos</u></b></div>
    <div class="card-body">

        <a href="/exportar" class="btn btn-info" align="left"><i class="fas fa-download"></i> Exportar CSV</a>

    </div>
</div>

@endsection
