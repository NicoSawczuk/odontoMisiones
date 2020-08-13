@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">
        Paises
        @if (Auth::user()->hasRole('admin'))
        <a class="btn btn-primary btn-sm float-right text-white" href="#" onclick="modalAlta()">Nuevo</a>
        @endif
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-head-fixed text-nowrap dataTable dtr-inline table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paises as $pais)
                <tr>
                    <td>{{ $pais->pais }}</td>
                    <td class="text-right" style="">
                        @if (Auth::user()->hasRole('admin'))
                        <a class="btn btn-light btn-sm" href="#" onclick="modalModificacion('{{$pais->pais}}')">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$pais->id}}>Borrar</a>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- MODAL ALTA PAIS --}}
    <div class="modal fade" id="modal-default-alta">
        <div class="modal-dialog">
            <form method="POST" action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Nuevo País</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <label for="pais">Nombre del País</label>
                        <input type="text" class="form-control  @error('pais') is-invalid @enderror" id="pais"
                            name="pais" value="{{ old('pais') }}" placeholder="Especifique el nombre" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                            Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Confirmar</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- MODAL MODIFICACION PAIS --}}
    <div class="modal fade" id="modal-default-modificacion">
        <div class="modal-dialog">
            <form method="POST" action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <label for="pais">Nombre del País</label>
                        <input type="text" class="form-control  @error('pais') is-invalid @enderror" id="paisM"
                            name="pais" value="{{ old('pais') }}" placeholder="Especifique el nombre" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                            Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Confirmar</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
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
<script>
    function modalAlta(){
    $('#modal-default-alta').modal({
        show: true
    });
  }
</script>

<script>
    function modalModificacion(nombre){
    $('#modal-default-modificacion').modal({
        show: true
    });
    $('#modal-title').html('Editar '+nombre);
    $('#paisM').val(nombre);
  }
</script>

{{-- Script para eliminar --}}
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('equipos.destroy',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush