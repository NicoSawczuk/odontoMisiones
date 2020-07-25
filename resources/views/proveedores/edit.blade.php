@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("proveedores.update",$proveedor->id)}}">
    @method('PUT')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Editar proveedor
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="empresa">Empresa</label>
                        <input type="text" class="form-control  @error('empresa') is-invalid @enderror" id="empresa"
                            name="empresa" value="{{ $proveedor->empresa ?? old('empresa') }}" placeholder="Especifique el nombre de su empresa" required>
                        @error('empresa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="direccion_postal">Direccion postal</label>
                        <input type="text" class="form-control  @error('direccion_postal') is-invalid @enderror" id="direccion_postal"
                            name="direccion_postal" value="{{ $proveedor->direccion_postal ?? old('direccion_postal') }}" placeholder="Especifique sus direccion postal"
                            required>
                        @error('direccion_postal')
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
                        <label for="telefono">Telefono</label>
                        <input type="" class="form-control  @error('telefono') is-invalid @enderror"
                            id="telefono" name="telefono" value="{{ $proveedor->telefono ?? old('telefono') }}"
                            placeholder="Especifique sus telefono" required>
                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="email">email</label>
                        <input type="" class="form-control  @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ $proveedor->email ?? old('email') }}"
                            placeholder="Especifique sus email" required>
                        @error('email')
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
                        <label for="nombre_persona_contacto">Nombre persona contacto</label>
                        <input type="nombre_persona_contacto" class="form-control  @error('nombre_persona_contacto') is-invalid @enderror" id="nombre_persona_contacto"
                            name="nombre_persona_contacto" value="{{ $proveedor->nombre_persona_contacto ?? old('nombre_persona_contacto') }}" placeholder="Especifique su nombre_persona_contacto" required>
                        @error('nombre_persona_contacto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="apellido_persona_contacto">apellido persona contacto</label>
                        <input type="apellido_persona_contacto" class="form-control  @error('apellido_persona_contacto') is-invalid @enderror" id="apellido_persona_contacto"
                            name="apellido_persona_contacto" value="{{ $proveedor->apellido_persona_contacto ?? old('apellido_persona_contacto') }}" placeholder="Especifique su apellido_persona_contacto" required>
                        @error('apellido_persona_contacto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="form-group ">
                <label for="nombre">Notas generales</label>
                <textarea name="notas_generales" id="notas_generales" cols="30" rows="10" class="form-control"
                    placeholder="Ingrese las notas generales">{{ $proveedor->notas_generales ?? old('notas_generales') }}</textarea>
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
@endpush
