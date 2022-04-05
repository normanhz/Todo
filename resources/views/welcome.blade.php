@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 >Listado de que haceres!</h1>
        <a href="{{ route('todolist.create') }}" class="btn btn-primary">Crear actividad</a>
    
    
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>desripcion</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <td>actividad 1</td>
                <td>actividad 2</td>
                <td>editar - eliminar</td>
            </tbody>
        </table>
    </div>
@endsection