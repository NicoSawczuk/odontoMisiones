@extends('admin-lte.index')

@section('content')

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-teal card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <span style="font-size: 10em; color: #A3A0A3;">
                        <i class="fas fa-tasks"></i>
                    </span>
                </div>

                <h3 class="profile-username text-center">{{ $incidencia->tipoIncidencia->nombre }} para
                    {{ $incidencia->cliente->nombres }} {{ $incidencia->cliente->apellidos }}</h3>



                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Estado</b> 
                        <a class="float-right"><span class="badge badge-pill"
                                style="background-color: {{$incidencia->estado->color}}; color: white;">{{ $incidencia->estado->nombre }}</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <b>Técnico</b> 
                        <a class="float-right"><span
                                class="badge badge-pill bg-light">{{ $incidencia->tecnico->nombres }}
                                {{ $incidencia->tecnico->apellidos }}</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Tipo de incidencia</b> 
                        <a class="float-right">
                            <span class="badge badge-pill">{{ $incidencia->tipoIncidencia->nombre }}</span>
                        </a>
                    </li>
                </ul>

                <p>BOTONES</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#detalleIncidencia" data-toggle="tab">Detalle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#partes" data-toggle="tab">Partes</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="detalleIncidencia">

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">INCIDENCIA</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Fecha comienzo</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->fecha_comienzo_incidencia }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Fecha de fin</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->fecha_fin_incidencia }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Presupuesto</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->presupuesto }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Precio de trabajo</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->precio_trabajo }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Diagnóstico general</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->diagnostico_general }}Kg</dd>
                        </dl>

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">TECNICO</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Nombres</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->tecnico->sexo }}</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Apellidos</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->tecnico->altura }}m</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">CUIL</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->tecnico->cuil }}Kg</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->tecnico->telefono }}Kg</dd>
                        </dl>

                        <div class="text-muted" style="font-family: 'Open Sans', serif;">CLIENTE</div>
                        <hr style="margin-bottom: 1%; margin-top: 0%">
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->cliente->telefono }}Kg</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->cliente->telefono }}Kg</dd>
                        </dl>
                        <dl class="row" style="margin-left: 1%">
                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-8 text-muted">{{ $incidencia->cliente->telefono }}Kg</dd>
                        </dl>


                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="partes">
                        @if($cliente->partes()->count() != 0)

                        <div class="table-responsive">
                            <table id="datatable" class="table table-head-fixed text-nowrap table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Numero de serie</th>
                                        <th>Precio sugerido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incidencia->partes as $parte)
                                    <tr>
                                        <td class="text-left">
                                            {{$parte->marca}}
                                        </td>
                                        <td>
                                            {{$parte->modelo}}
                                        </td>
                                        <td class="text-right">
                                            {{$parte->numeros_serie}}
                                        </td>
                                        <td class="text-right">
                                            <span
                                                class="badge badge-pill badge-light">${{$parte->precio_sugerido}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="callout" style="border-left-color: #3c8dbc;">
                            <h5>Partes</h5>

                            <p>La incidencia aún no tiene partes asociadas</p>
                        </div>
                        @endif
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->



@endsection

@push('scripts')

@endpush