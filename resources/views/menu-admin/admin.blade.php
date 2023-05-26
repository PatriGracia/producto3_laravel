@extends('layouts.plantilla')

@section('title', 'Administrador')

@section('css')
    <!-- Scripts CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
    <link rel="stylesheet" href="{{ asset('css/menu-usuario.css')}}">

@endsection

@section('content')
<div class="col-auto d-flex">
    <h1 style="color:rgb(136, 136, 183);">¡Bienvenido/a @auth
        {{Auth::user()->Username}}
    @endauth! </h1>
</div>
<div class="col-auto d-flex">
    <a href="{{route('perfil.index')}}">
        <button class="btn btn-primary perfil"> Perfil </button> 
    </a> 
    <a href="{{route('logout')}}">
        <button class="btn btn-primary log-out" id="logoutButton">Log Out</button>
    </a>
</div>
</div>
</div>
    <div class="row">
        <div class="col-md-12">
            <h2>Administración de eventos</h2>
            <p>Aquí puedes gestionar los eventos, ponentes, tipos de eventos y asistentes.</p>
            <div class="menu-admin">
            
                <a href="{{route('acto.index')}}" class="btn btn-primary boton-admin">Gestionar eventos</a>
                <a href="" class="btn btn-primary boton-admin">Gestionar ponentes</a>
                <a href="tipos_eventos.php" class="btn btn-primary boton-admin">Gestionar tipos de eventos</a>
            </div>
        </div>
    </div>
</div>

@endsection