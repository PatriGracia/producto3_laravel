@extends('layouts.plantilla')

@section('title', 'Eventos')

@section('css')
    <!-- Scripts CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">

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
            <div class="col-8 offset-md-1">
                <div id="Calendario_Ponente" style="margin-bottom:1em; height:500px; border: 1px solid #000; overflow: auto; padding: 1em; margin-top: 70px">
                    <h5>Calendario de Eventos:</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listaActos as $listaActo)
			                    <tr  style='background-color:white'>
                                    <td>{{ $listaActo->Titulo }}</td>
                                    <td>{{ $listaActo->Fecha }}</td>
                                    <td>{{ $listaActo->Hora }}</td>
                                    <td><form action="{{route('acto.showEvent')}}" method="POST">
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light">Ver evento</button>
                                    </form>
                                    </td>
                                    <td>
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#miModal">Editar
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                              </svg>
                                        </button>
                                    </td>
                                    <td>
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#miModal">Eliminar
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                
                            @endforeach
                            @foreach($listaActosInscritos as $listaActosInscrito)
			                    <tr  style='background-color:#56CBF7'>
                                    <td>{{ $listaActosInscrito->Titulo }}</td>
                                    <td>{{ $listaActosInscrito->Fecha }}</td>
                                    <td>{{ $listaActosInscrito->Hora }}</td>
                                    <td><form action="{{route('acto.showEvent')}}" method="POST">
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light">Ver evento</button>
                                    </form>
                                    </td>
                                    <td>
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#miModal">Editar
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                              </svg>
                                        </button>
                                    </td>
                                    <td>
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#miModal">Eliminar
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($listaActosPonentes as $listaActosPonente)
			                    <tr  style='background-color:#F79D56'>
                                    <td>{{ $listaActosPonente->Titulo }}</td>
                                    <td>{{ $listaActosPonente->Fecha }}</td>
                                    <td>{{ $listaActosPonente->Hora }}</td>
                                    <td><form action="{{route('acto.showEvent')}}" method="POST">
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light">Ver evento</button>
                                    </form>
                                    </td>
                                    <td>
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#miModal">Editar
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                              </svg>
                                        </button>
                                    </td>
                                    <td>
                                        @csrf
                                        <input name="id_acto" type="hidden" value="{{$listaActo->Id_acto}}">
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#miModal">Eliminar
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                        @csrf 
                        <button type="submit" name="" class="btn btn-success" data-toggle="modal" data-target="#nuevoActo" style="margin-left: 1000px">Nuevo Acto
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                                <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </button>
                    
                </div>
            </div>
            
    </div>

    <form action="{{route('admin')}}" method="GET">
        @csrf 
       <button type="submit" name="acto.index" class="btn btn-light" style="margin-left: 200px">Volver</button>
    </form>

    <div class="modal" id="miModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Título del Modal</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Contenido del Modal</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="nuevoActo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Acto</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Titulo del evento: </label>
                            <input type="text" id="Titulo" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="">Tipo de Acto (Ponencia, Seminario, Debate, Otro) :</label>
                            <select id="Id_tipo_acto" class="form-control">
                                @php
                                    $tipos = App\Http\Controllers\ActoController::getTipo_acto();
                                   
                                @endphp
                                @foreach ($tipos as $tipo)
                                    <option value={{$tipo->Id_tipo_acto}}>{{$tipo->Descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Fecha:</label>
                            <div class="input-group" data-autoclose="true">
                                <input type="date" id="Fecha" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6" id="TituloHoraInicio">
                            <label for="">Hora de inicio:</label>
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" id="HoraInicio" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Breve descripcion:</label>
                            <div class="input-group" data-autoclose="true">
                                <input type="text" id="Descripcion_corta" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Descripcion larga:</label>
                            <div class="input-group" data-autoclose="true">
                                <textarea id="Descripcion_larga" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Numero de asistentes:</label>
                            <div class="input-group" data-autoclose="true">
                                <input type="number" id="Num_asistentes" min="0" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="BotonAgregar" class="btn btn-sucess">Agregar</button>
                  <!--  <button type="button" id="BotonModificar" class="btn btn-sucess">Modificar</button>
                    <button type="button" id="BotonBorrar" class="btn btn-sucess">Borrar</button> -->
                    <button type="button" class="btn btn-sucess" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


@endsection