@extends('layouts.app')

@section('content')

<div class="card border-primary mb-3">
    <div class="card-header"><b><u>Importar Eventos</u></b></div>
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
        
        <form method="POST" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="csv"class="form-control">
            <br>
            <button class="btn btn-success">Importar</button>
        </form>
    </div>
</div>

@endsection
