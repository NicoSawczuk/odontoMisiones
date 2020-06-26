@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("partes.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Crear Parte
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control  @error('marca') is-invalid @enderror" id="marca"
                            name="marca" value="{{ old('marca') }}" placeholder="Especifique su marca" required>
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
                            name="modelo" value="{{ old('modelo') }}" placeholder="Especifique sus modelo"
                            required>
                        @error('modelo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="fecha_garantia">Fecha de Garantia</label>
                        <input type="date" class="form-control  @error('fecha_garantia') is-invalid @enderror"
                            id="fecha_garantia" name="fecha_garantia" value="{{ old('fecha_garantia') }}"
                            placeholder="Especifique su fecha de garantia" required>
                        @error('fecha_garantia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group ">
                        <label for="numeros_serie">Numeros de Serie</label>
                        <input type="text" class="form-control  @error('numeros_serie') is-invalid @enderror" id="numeros_serie"
                            name="numeros_serie" value="{{ old('numeros_serie') }}" placeholder="Especifique los numeros de serie" required>
                        @error('numeros_serie')
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
                            <option value="NUEVO" @if("NUEVO" == old('estado')) selected
                                @endif>NUEVO</option>
                            <option value="USADO"  @if("USADO" == old('estado')) selected
                            @endif>USADO</option>
                            <option value="REFACCIONADO"  @if("REFACCIONADO" == old('estado')) selected
                            @endif>REFACCIONADO</option>
                        </select>
                        @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group ">
                        <label for="precio_sugerido">Precio Sugerido</label>
                        <input type="number" class="form-control  @error('precio_sugerido') is-invalid @enderror" id="precio_sugerido"
                            name="precio_sugerido" value="{{ old('precio_sugerido') }}" placeholder="Especifique el precio sugerido"
                            required>
                        @error('precio_sugerido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="disponibilidad" class="">Disponible</label>
                        <select name="disponibilidad" id="disponibilidad" class="form-control" required>
                            <option value="" selected disabled>--Seleccione--</option>
                            <option value="1" @if("1" == old('disponibilidad')) selected
                                @endif>SI</option>
                            <option value="0"  @if("0" == old('disponibilidad')) selected
                            @endif>NO</option>
                        </select>
                        @error('disponibilidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group ">
                        <label for="comprobante_asociado">Comprobante Asociado</label>
                        <input type="text" class="form-control  @error('comprobante_asociado') is-invalid @enderror" id="comprobante_asociado"
                            name="comprobante_asociado" value="{{ old('comprobante_asociado') }}" placeholder="Especifique su comprobante"
                            required>
                        @error('comprobante_asociado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="form-group ">
                <label for="nombre">Notas Generales</label>
                <textarea name="notas_generales" id="notas_generales" cols="30" rows="10" class="form-control"
                    placeholder="Ingrese las notas particulares">{{ old('notas_generales') }}</textarea>
            </div>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="" class="btn btn-dark"><i class="fa fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection
