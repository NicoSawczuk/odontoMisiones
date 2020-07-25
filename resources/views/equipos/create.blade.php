@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("equipos.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Crear equipo
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control  @error('marca') is-invalid @enderror" id="marca"
                            name="marca" value="{{ old('marca') }}" placeholder="Especifique la marca" required>
                        @error('marca')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control  @error('modelo') is-invalid @enderror" id="modelo"
                            name="modelo" value="{{ old('modelo') }}" placeholder="Especifique el modelo" required>
                        @error('modelo')
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
                        <label for="fecha_garantia">Fecha de garantia</label>
                        <input type="date" class="form-control  @error('fecha_garantia') is-invalid @enderror"
                            id="fecha_garantia" name="fecha_garantia" value="{{ old('fecha_garantia') }}"
                            placeholder="Especifique la fecha de garantia" required>
                        @error('fecha_garantia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="numero_serie">Numero de serie</label>
                        <input type="number" class="form-control  @error('numero_serie') is-invalid @enderror"
                            id="numero_serie" name="numero_serie" value="{{ old('numero_serie') }}"
                            placeholder="Especifique el numero de serie" required>
                        @error('numero_serie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group ">
                        <label for="cliente" class="">Cliente</label>
                        <select name="cliente" id="cliente" class="form-control select2bs4" style="width: 100%;"
                            required>
                            <option value="" selected disabled>--Seleccione--</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombres}}, {{$cliente->apellidos}}
                                ({{$cliente->cuil}})</option>
                            @endforeach
                        </select>
                        @error('cliente')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="estado" class="">Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="" selected disabled>--Seleccione--</option>
                            <option value="NUEVO" @if("NUEVO"==old('estado')) selected @endif>NUEVO</option>
                            <option value="USADO" @if("USADO"==old('estado')) selected @endif>USADO</option>
                        </select>
                        @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <label for="notas_generales">Notas Generales</label>
                <textarea name="notas_generales" id="notas_generales" cols="30" rows="10" class="form-control"
                    placeholder="Ingrese las notas generales">{{ old('notas_generales') }}</textarea>
                @error('notas_generales')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="javascript:history.back()" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection

@push('scripts')
<!-- Select con buscador -->
<script src="{{asset('assets/admin-lte/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function(){
        //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    })
</script>
@endpush
