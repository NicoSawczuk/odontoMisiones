@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Incidencias
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('partes.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Tipo de Incidencia</th>
                    <th scope="col">Fecha de Comienzo</th>
                    <th scope="col">Fecha de Fin</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Equipo del Cliente</th>
                    <th scope="col">Tecnico Encargado</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                <tr>
                    <td>{{$incidencia->id}}</td>
                    <td></td>
                    <td>{{$incidencia->fecha_comienzo_incidencia}}</td>
                    <td>{{$incidencia->fecha_fin_incidencia}}</td>
                    <td>{{$incidencia->estado->nombre}}</td>
                    <td>{{$incidencia->cliente->nombres}} {{$incidencia->cliente->apellidos}}</td>
                    <td>
                        @foreach ($incidencia->equipos as $equipo)
                            {{$equipo->marca}} - {{$equipo->modelo}}
                        @endforeach
                    </td>
                    <td>{{$incidencia->tecnico->nombres}} {{$incidencia->tecnico->apellidos}}</td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" href="{{ route('incidencias.edit', $incidencia->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$incidencia->id}}>Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div id="confirmDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmacion</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">¿Esta seguro que desea borrarlo?</h4>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- Paso el id de la materia  aborrar en materia_delete--}}
                    <button type="submit" name="ok_delete" id="ok_delete" class="btn btn-danger">SI Borrar</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO Borrar</button>
            </div>
        </div>
    </div>
</div>


@endsection
@push('scripts')

{{-- Script para eliminar --}}
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('incidencias.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush
