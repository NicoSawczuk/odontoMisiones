@extends('admin-lte.index')

@section('content')
<form class="form-group " method="POST" action="{{route("incidencias.store")}}">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5>
                Crear Incidencia
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group ">
                        <label for="cliente" class=" col-form-label text-md-right">Clientes</label>
                        <label for="agregar_cliente">
                            <a role="button" type="button" href="{{route('clientes.create')}}" title="Nuevo Cliente"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>

                        <select class="seleccion form-control" name="cliente_id" id="cliente" required>
                            <option value="" disabled selected>--Seleccione un cliente--</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}" @if(old('cliente_id')==$cliente->id) selected
                                @endif>{{$cliente->apellidos . ' ' . $cliente->nombres}} - {{$cliente->cuil}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="equipo" class=" col-form-label text-md-right">Equipos</label>
                        <label for="agregar_equipo">
                            <a role="button" type="button" href="{{route('equipos.create')}}" title="Nuevo Equipo"><i
                                    class="fas fa-plus-circle fa-md"></i></a>
                        </label>
                        <select class="form-control" name="equipos_id[]"  id="equipo" multiple required disabled>

                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group ">
                        <label for="" class="col-form-label text-md-right">Fecha de Incidencia</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                {{-- <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span> --}}
                            </div>
                            <input type="date" name="fecha_comienzo_incidencia" class="form-control" required
                                value="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                                min="{{ Carbon\Carbon::now()->subDay()->format('Y-m-d') }}"
                                max="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group ">
                        <label for="">Tipo de Incidencia</label>
                        <select class="seleccion form-control" name="tipo_incidencia_id" id="tipo_incidencia" required>
                            <option value="" disabled selected>--Seleccione un tipo de incidencia--</option>
                            @foreach($tiposIncidencias as $tipoIncidencia)
                            <option value="{{$tipoIncidencia->id}}" @if(old('tipo_incidencia_id')==$tipoIncidencia->id)
                                selected
                                @endif>{{$tipoIncidencia->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group ">
                        <label for="">Entrega Inicial</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="text" name="monto" class="form-control" required value="{{old('monto')}}" id="presupuesto" disabled>
                            <input type="hidden" name="presupuesto" class="form-control" value="{{old('presupuesto')}}" id="presupuesto2">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ">
                        <label for="cliente" class="">Tecnico Encargado</label>
                        <select class="seleccion form-control" name="tecnico_id" id="tecnico" >
                            <option value="" disabled selected>--Seleccione un tecnico--</option>
                            @foreach($tecnicos as $tecnico)
                            <option value="{{$tecnico->id}}" @if(old('tecnico_id')==$tecnico->id) selected
                                @endif>{{$tecnico->apellidos . ' ' . $tecnico->nombres}} - {{$tecnico->cuil}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <label for="nombre">Diagnostico General</label>
                <textarea name="diagnostico_general" id="diagnostico_general" cols="30" rows="10" class="form-control"
                    placeholder="Ingrese un diagnostico general para el equipo" required>{{ old('diagnostico_general') }}</textarea>
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
<script>
    $(document).ready(function(){
        $('.seleccion').select2({
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        });
        $("#equipo").select2({
            placeholder: "Seleccione al menos un equipo"
        });
        $('#tipo_incidencia').change(function(){
            var id = $(this).val();
            var url = "{{ route('incidencia.obtenerMonto', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                 $('#presupuesto').val(data);
                 $('#presupuesto2').val(data);
            });
        });
        $('#cliente').change(function(){
            $('#equipo').removeAttr('disabled');
            var id = $(this).val();
            var url = "{{ route('clientes.obtenerEquipos', ":id") }}" ;
            url = url.replace(':id' , id) ;
            $.get(url, function(data){
                var html_select = '';
                console.log(data)
                for(var i = 0 ; i<data.length ; i++){
                     html_select += '<option value="'+data[i].id+'">'+data[i].marca+' ('+data[i].modelo+')</option>' ;
                }
                 $('#equipo').html(html_select);
            });
        });
    }) ;
</script>
@endpush
