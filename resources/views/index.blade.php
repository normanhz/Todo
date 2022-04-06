@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 >Listado de que haceres!</h1>
        <a href="{{ route('todolist.create') }}" class="btn btn-primary">Crear actividad</a>

        @if(Session::has('mensaje'))
        <div class="alert alert-info my-5">
            {{Session::get('mensaje')}}
        </div>
        @endif

        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($todo as $detail)
                <tr>
                    <td>{{$detail->name}}</td>
                    <td>
                        <a href="{{ route('todolist.edit', $detail) }}" class="btn btn-warning">editar</a>
                        <form action="{{ route('todolist.destroy', $detail) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar esta actividad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <td colspan="3">No hay Registros</td>
            @endforelse
           
        </tbody>
    </table>
    @if ($todo->count())
    {{$todo->links()}}
    @endif
    </div>
@endsection