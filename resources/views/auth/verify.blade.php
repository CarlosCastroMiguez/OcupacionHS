@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/importar.css" />

<div class="card border-primary mb-3">
    <div class="card-header">{{ __('Verifica tu dirección E-Mail') }}</div>

    <div class="card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
        </div>
        @endif

        {{ __('Antes de continuar, consulte su correo electrónico, tendrá un enlace de verificación.') }}
        {{ __('Si no has recibido un E-Mail') }}, <a href="{{ route('verification.resend') }}">{{ __('haz click aquí para solicitar un reenvio') }}</a>.
    </div>
</div>

@endsection
