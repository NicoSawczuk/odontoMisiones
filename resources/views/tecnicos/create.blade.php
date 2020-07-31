@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("tecnicos.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Crear Técnico
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control  @error('nombres') is-invalid @enderror" id="nombres"
                            name="nombres" value="{{ old('nombres') }}" placeholder="Especifique sus nombres" required>
                        @error('nombres')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control  @error('apellidos') is-invalid @enderror" id="apellidos"
                            name="apellidos" value="{{ old('apellidos') }}" placeholder="Especifique sus apellidos"
                            required>
                        @error('apellidos')
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
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control  @error('fecha_nacimiento') is-invalid @enderror"
                            id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                            placeholder="Especifique sus fecha_nacimiento" required>
                        @error('fecha_nacimiento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="sexo" class="">Sexo</label>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="" selected disabled>--Seleccione--</option>
                            <option value="FEMENINO" @if("FEMENINO"==old('sexo')) selected @endif>Femenino</option>
                            <option value="MASCULINO" @if("MASCULINO"==old('sexo')) selected @endif>Masculino</option>
                            <option value="NO ACLARA" @if("NO ACLARA"==old('sexo')) selected @endif>No aclara</option>
                        </select>
                        @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="dni">DNI</label>
                        <input type="number" class="form-control  @error('dni') is-invalid @enderror" id="dni"
                            name="dni" value="{{ old('dni') }}" placeholder="Especifique su dni" required>
                        @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="dni">CUIL</label>
                        <input type="number" class="form-control  @error('cuil') is-invalid @enderror" id="cuil"
                            name="cuil" value="{{ old('cuil') }}" placeholder="Especifique su cuil" required>
                        @error('cuil')
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
                        <input type="text" class="form-control  @error('telefono') is-invalid @enderror" id="telefono"
                            name="telefono" value="{{ old('telefono') }}" placeholder="Especifique su telefono"
                            required>
                        @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" placeholder="Especifique su email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password"
                            name="password" value="{{ old('password') }}" placeholder="Especifique su contraseña" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group ">
                        <label for="nombre">Notas Particulares</label>
                        <textarea name="notas_particulares" id="notas_particulares" cols="30" rows="3"
                            class="form-control"
                            placeholder="Ingrese las notas particulares">{{ old('notas_particulares') }}</textarea>
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
@push('scripts')
<script type="text/javascript">
    document.getElementById("fecha_nacimiento").max = new Date().toISOString().split("T")[0];
</script>
@endpush