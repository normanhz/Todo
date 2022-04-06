@extends('theme.base')

@section('content')
<div class="container py-5 text-center">
        @if (isset($todolist))
        <h1 >Modificar actividad</h1>
        @else
            <h1 >Crear actividad</h1>
        @endif


        @if (isset($todolist))
            <form action="{{ route('todolist.update',$todolist) }}" method="post">
            @method('PUT')
        @else
            <form action="{{ route('todolist.store') }}" method="post">
        @endif
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente" value="{{old('name') ?? @$todolist->name}}">
            @error('name')
                <p class="form-text text-danger">{{$message}}</p>
            @enderror
        </div>

    

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" cols="30" rows="4"  class="form-control">{{old('description') ?? @$todolist->description}}</textarea >
            @error('description')
                <p class="form-text text-danger">{{$message}}</p>
            @enderror
        </div>

        @if (isset($todolist))
        <button type="submit" class="btn btn-info">Editar actividad</button>
        @else
        <button type="submit" class="btn btn-info">Guardar actividad</button>
        @endif

        
    </form>
</div>
@endsection