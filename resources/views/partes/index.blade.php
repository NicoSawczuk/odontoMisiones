@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Partes
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('partes.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Numero de Serie</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Proveedores</th>
                    <th scope="col">Disponible</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partes as $parte)
                <tr>
                    <td>{{$parte->id}}</td>
                    <td>{{$parte->marca}}</td>
                    <td>{{$parte->modelo}}</td>
                    <td>{{$parte->numeros_serie}}</td>
                    <td>{{$parte->estado}}</td>
                    <td>{{$parte->precio_sugerido}}</td>
                    <td>
                        @foreach ($parte->proveedores as $p)
                            <span class="badge badge-pill">
                                {{$p->empresa}}
                            </span>
                        @endforeach
                    </td>
                    <td>
                        @if($parte->disponibilidad == 1)
                            SI
                        @else
                            NO
                        @endif
                    </td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" href="{{ route('partes.edit', $parte->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$parte->id}}>Borrar</a>
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

    url2="{{route('partes.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush
