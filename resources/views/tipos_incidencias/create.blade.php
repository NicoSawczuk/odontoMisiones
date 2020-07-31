@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("tipos_incidencias.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Crear un nuevo tipo de incidencia
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control  @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre') }}" placeholder="Especifique el nombre" required>
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="monto_mano_obra">Monto de mano de obra</label>
                        <input type="number" class="form-control  @error('monto_mano_obra') is-invalid @enderror" id="monto_mano_obra"
                            name="monto_mano_obra" value="{{ old('monto_mano_obra') }}" placeholder="Especifique sus monto  de mano obra"
                            required>
                        @error('monto_mano_obra')
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
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control  @error('descripcion') is-invalid @enderror" id="descripcion"
                            name="descripcion" value="{{ old('descripcion') }}" placeholder="Especifique el descripcion" required>
                        @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
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
