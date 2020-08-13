@extends('admin-lte.index')

@section('content')

<div class="card">
    <div class="card-header">Provincias
        @if (Auth::user()->hasRole('admin'))
        <a class="btn btn-primary btn-sm float-right text-white" href="#" data-toggle="modal"
            data-target="#exampleModal">Nuevo</a>
        @endif
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Pais</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provincias as $provincia)
                <tr>
                    <td>{{$provincia->id}}</td>
                    <td>{{$provincia->provincia}}</td>
                    <td>{{$provincia->pais->pais}}</td>
                    <td class="text-right">
                        @if (Auth::user()->hasRole('admin'))
                        <a class="btn btn-light btn-sm" href="#"
                            onclick="modalModificacion('{{$provincia->provincia}}')">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$provincia->id}}>Borrar</a>
                        @endif
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Provincia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group ">
                            <label for="provincia">Nombre de la Provincia</label>
                            <input type="text" class="form-control  @error('provincia') is-invalid @enderror"
                                id="provincia" name="provincia" value="{{ old('provincia') }}"
                                placeholder="Especifique la provincia" required>
                            @error('provincia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group ">
                            <label for="pais" class="">Pais</label>
                            <select name="pais" id="pais" class="form-control select2bs4" style="width: 100%;" required>
                                <option value="" selected disabled>--Seleccione--</option>
                            </select>
                            @error('pais')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>
                    Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Confirmar</button>
            </div>
        </div>
    </div>
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
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="provincia">Nombre de la Provincia</label>
                                <input type="text" class="form-control  @error('provincia') is-invalid @enderror"
                                    id="provincia" value="{{old('provincia')}}" name="provincia" value="{{ old('provincia') }}"
                                    placeholder="Especifique la provincia" required>
                                @error('provincia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label for="pais" class="">Pais</label>
                                <select name="pais" id="pais" class="form-control select2bs4" style="width: 100%;"
                                    required>
                                    <option value="" selected disabled>--Seleccione--</option>
                                </select>
                                @error('pais')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
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

@endsection
@push('scripts')
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

    url2="#";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush
