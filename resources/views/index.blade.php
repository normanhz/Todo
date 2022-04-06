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
                <th>
                    <button type="button" class="btn btn-success" id="btncheckAll" >Marcar todos</button>
                </th>
                <th>Nombre</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse ($todo as $detail)
                <tr>
                    <td>
                        <input type="checkbox" class="early_access" id="early_access" name="early_access"/>
                    </td>
                    <td class="activityName">{{$detail->name}}</td>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('.early_access:checkbox').bind('change', function(e) {
        const input = $(this).parent().next('td');
      if ($(this).is(':checked')) {
          $(input).addClass('done');
        // alert('Checked');
      }
      else {
        $(input).removeClass('done');
        // alert('Unchecked');
      }
    })

    $('#btncheckAll').click(() =>
        {
            $('.activityName').addClass('done');
            $('.early_access').prop("checked", true);
        }
    )

  });



</script>