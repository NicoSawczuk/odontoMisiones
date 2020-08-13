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
@endpush