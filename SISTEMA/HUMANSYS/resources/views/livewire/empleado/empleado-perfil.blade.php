
    <div class="page-wrapper">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@foreach($empleados as $empleado)
    @foreach($direcciones as $direccion)
            @foreach ($cargos as $cargo)
                @foreach ($areas as $area)
                    @foreach ($departamentos as $deptos)
                            <!-- Page Content -->
                            {{-- <h1>Departamento: {{$deptos->nombre}} Area:{{$area->nombre}}  con cargo:{{$cargo->nombre}}</h1> --}}
                                <div class="content container-fluid">

                                    <!-- Page Header -->
                                    <div class="page-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="page-title">Perfil de Empleado <i class="far fa-user-circle"></i></h3>
                                                <ul class="breadcrumb">
                                                    <li class="breadcrumb-item"><a>Dashboard</a></li>
                                                    <li class="breadcrumb-item active">Información</li>
                                                </ul>
                                            </div>
                                            <div class="col-auto float-right ml-auto">
                                                <a class="btn btn-success" style="color: #ffffff;" data-toggle="modal" data-target="#referencia_modal">Añadir referencia <i class="fas fa-user-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Page Header -->

                                        <div class="card mb-0 ">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="profile-view">
                                                            <div class="profile-img-wrap">
                                                                <div class="profile-img">
                                                                    <a href="#" class="avatar"><img alt="" src="../../assets/img/user.jpg"></a>
                                                                </div>
                                                            </div>

                                                            {{-- ------------------------div de informacion basica----------------------------------------- --}}
                                                            <div class="profile-basic">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <div class="profile-info-left">
                                                                            <h3 class="user-name m-t-0 mb-0">{{$empleado->primer_nombre}} {{$empleado->primer_apellido}}</h3><br>
                                                                            <h5 class="text-muted">Departamento: {{$deptos->nombre}}</h5>
                                                                            <h5 class="text-muted">Area de Trabajo: {{$area->nombre}}</h5>
                                                                            <h5 class="text-muted">Cargo: {{$cargo->nombre}}</h5>
                                                                            <h5 class="text-muted">Empleado ID: {{$empleado->id}}</h5>
                                                                            <div class="small doj text-muted"><i class="far fa-id-card"></i>  Identidad: {{$empleado->identidad}}</div> <br>
                                                                            @if ($cargo->tipo_empleado_id == 1)
                                                                                @if ($empleado->estatus_id == 1)
                                                                                    <button type="button" if class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="Condición de empleado: TRABAJADOR">
                                                                                        ACTIVO
                                                                                    </button>
                                                                                @else
                                                                                    <button type="button" if class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Condición de empleado: TRABAJADOR">
                                                                                        INACTIVO
                                                                                    </button>
                                                                                @endif
                                                                            @else
                                                                                @if ($empleado->estatus_id == 1)
                                                                                    <button type="button" if class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="Condición de empleado: PATRONO">
                                                                                        ACTIVO
                                                                                    </button>
                                                                                @else
                                                                                    <button type="button" if class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Condición de empleado: PATRONO">
                                                                                        INACTIVO
                                                                                    </button>
                                                                                @endif
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <ul class="personal-info">
                                                                            <li>
                                                                                <div class="title">Telefono principal:</div>
                                                                                <div class="text"><a><i class="fas fa-phone-square-alt"></i> {{$empleado->telefono_1}}</a></div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Correo Personal:</div>
                                                                                <div class="text"><a><i class="fas fa-envelope-open-text"></i> {{$empleado->email}}</a></div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Nacimiento:</div>
                                                                                <div class="text"><i class="fas fa-calendar-alt"></i> {{$empleado->fecha_nacimiento}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Dirección:</div>
                                                                                <div class="text"><i class="fas fa-directions"></i> {{$direccion->descripcion}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">#Casa:</div>
                                                                                <div class="text"><i class="fas fa-home"></i> {{$direccion->numero_casa}}</div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- ------------------------div de informacion basica----------------------------------------- --}}
                                                            <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card  tab-box">
                                            <div class="row user-tabs">
                                                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                    <ul class="nav nav-tabs nav-tabs-bottom">
                                                        <li class="nav-item"><a href="#emp_informacion" data-toggle="tab" class="nav-link active"><i class="fas fa-info"></i> INFORMACÓN</a></li>
                                                        <li class="nav-item"><a href="#emp_funciones" data-toggle="tab" class="nav-link"><i class="fas fa-briefcase"></i> FUNCIONES DE TRABAJO</a></li>
                                                        <li class="nav-item"><a href="#emp_detalle" data-toggle="tab" class="nav-link"><i class="fas fa-hand-holding-usd"></i>SOLICITUD DE DEDUCCIONES</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content">

                                            <!----------------------------- Detalle completo de informacion -------------------------->
                                            <div id="emp_informacion" class="pro-overview tab-pane fade show active">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex">
                                                        <div class="card profile-box flex-fill shadow p-3 mb-5 bg-white rounded border border-info">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Información detallada <i class="fas fa-info-circle"></i>{{-- <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a> --}}</h3>
                                                                <ul class="personal-info">
                                                                    <li>
                                                                        <div class="title">Nombre Completo:</div>
                                                                        <div class="text">{{$empleado->nombre}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">RTN:</div>
                                                                        <div class="text">{{$empleado->rtn}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Fecha de Nacimiento.</div>
                                                                        <div class="text">{{$empleado->fecha_nacimiento}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Lugar de Nacimiento</div>
                                                                        <div class="text">{{$empleado->lugar_nacimiento}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Estado Civil</div>
                                                                        <div class="text">{{$empleado->estado_civil}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Nacionalidad</div>
                                                                        <div class="text">Hondureña</div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 d-flex">
                                                        <div class="card profile-box flex-fill shadow p-3 mb-5 bg-white rounded border border-info">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Información Gerencial <i class="fas fa-tasks"></i>{{-- <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a> --}}</h3>

                                                                <ul class="personal-info">
                                                                    <li>
                                                                        <div class="title">Telefono Secundario:</div>
                                                                        <div class="text">{{$empleado->telefono_2}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Correo Institucional:</div>
                                                                        <div class="text">{{$empleado->email_institucional}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Fecha de ingreso:</div>
                                                                        <div class="text">{{$empleado->fecha_ingreso}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Sueldo</div>
                                                                        <div class="text">Lps. {{$empleado->sueldo}}</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Estado</div>
                                                                        <div class="text">Activo</div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="title">Lugar de asignación</div>
                                                                        <div class="text">Distrito Central</div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach($referencias as $referencia)
                                                        @if ($referencia->estatus_referencia_id == 1)
                                                            <div class="col-md-6 d-flex">
                                                                <div class="card profile-box flex-fill shadow p-3 mb-5 bg-white rounded border border-info">
                                                                    <div class="card-body">
                                                                        <div class="pro-edit"><a data-target="#edit_ref_modal" data-toggle="modal" class="edit-icon" href="#" onclick="cargoReferencia({{$referencia->id}})"><i class="fa fa-pencil"></i></a></div>
                                                                        <h3 class="card-title ">Referencia Personal <i class="fas fa-user-check"></i></h3>
                                                                        <ul class="personal-info">
                                                                            <li>
                                                                                <div class="title">Nombre:</div>
                                                                                <div class="text">{{$referencia->nombre}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Identidad:</div>
                                                                                <div class="text">{{$referencia->identidad}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Telefono:</div>
                                                                                <div class="text">{{$referencia->telefono}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Correo:</div>
                                                                                <div class="text">{{$referencia->email}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Dirección:</div>
                                                                                <div class="text">{{$referencia->direccion}}</div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="title">Parentezco:</div>
                                                                                <div class="text">{{$referencia->parentezco}}</div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!------------------------- /Detalle completo de informacion ---------------------------------->

                                            <!-- Funciones Tab -->
                                            <div class="tab-pane fade" id="emp_funciones">
                                                <div class="card mb-0 shadow-lg p-3 mb-5 bg-white rounded border border-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="profile-view">
                                                                    <div class="profile-basic">
                                                                        <div class="row">
                                                                            <div class="col-md-5 p-10">
                                                                                <div class="profile-info-left">
                                                                                    <h3 class="user-name m-t-0 mb-0">AREA DE {{$area->nombre}}</h3><br>
                                                                                    <h5 class="text-muted">Código: {{$area->codigo}}</h5>
                                                                                    <h5 class="text-muted">Area de Trabajo: {{$area->nombre}}</h5>
                                                                                    <br>
                                                                                    <div class="small doj text-muted">Jefe inmediato: Selvin Morazán</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <ul class="personal-info list-group list-group-flush">
                                                                                    @foreach ($funciones as $funcion)
                                                                                        <li class="list-group-item">
                                                                                            <div class="title">Funcion:</div>
                                                                                            <div class="text"><a>{{$funcion->nombre}} Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam totam alias, voluptate mollitia hic soluta accusantium doloremque.</a></div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Projects Tab -->
                                            {{-- deducciones empleado modal --}}
                                            <div id="Deduccion_modal" class="modal custom-modal fade" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">DEDUCCIÓN PERSONAL</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form  id="formDeduccion" data-parsley-validate >
                                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                                {{-- <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none"> --}}
                                                                    <div class="card shadow p-3 mb-5 bg-white rounded">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label">Nombre de deducción<span class="text-danger">*</span></label>
                                                                                        <input class="form-control" required  id="nombre_deduc" name="nombre_deduc" type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label">Tipo de deducción<span class="text-danger">*</span></label>
                                                                                        <select class="custom-select form-control" required id="TipodeducSelect" name="TipodeducSelect" onchange="selecteValor_TipoDeduc()">
                                                                                            <option selected value=""> <b>Seleccione tipo de deducción</b></option>
                                                                                            <option value="0">PORCENTAJE</option>
                                                                                            <option value="1">MONTO FIJO</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label" style="display: none;" id="porcentajelbl_deduc" name="porcentajelbl_deduc">Porcentaje %<span class="text-danger">*</span></label>
                                                                                        <input {{-- class="form-control" required  --}} style="display: none;" id="porcentaje_deduc" name="porcentaje_deduc" type="text" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label" style="display: none;" id="montolbl_deduc" name="montolbl_deduc">Monto fijo catorcenal<span class="text-danger">*</span></label>
                                                                                        <input {{-- class="form-control" required  --}} id="monto_deduc" name="monto_deduc" type="text" style="display: none;">
                                                                                        <input type="hidden" id="idEmpleadoDe" name="idEmpleadoDe" value="{{ $empleado->id }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label">Descripción sobre la deducción<span class="text-danger">*</span></label>
                                                                                        <textarea class="form-control" required id="descripcion_deduc" name="descripcion_deduc" cols="30" rows="3"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div>
                                                                    <button class="btn btn-primary submit-btn">Agregar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- /deducciones empleado modal --}}
                                            <!--Deducciones Tab -->
                                            <div class="tab-pane fade" id="emp_detalle">
                                                <button type="button" class="btn btn btn-primary col-auto float-left"  data-toggle="modal" data-target="#Deduccion_modal">Nueva deducción <i class="fas fa-money-check-alt"></i></button>
                                                <br><br><br>
                                                <section id="seccionDedu">
                                                    <div class="row" id="grillDeducciones">
                                                            @foreach ($deducciones_emps as $deduc)
                                                            <div class="col-md-6 d-flex">
                                                                <div class="card profile-box flex-fill shadow p-3 mb-5 bg-white rounded border border-success  @if($deduc->estado == 0)border-success  @elseif($deduc->estado == 1) border-danger @endif">
                                                                    <div class="card-body">
                                                                        {{-- <div class="pro-edit"><a data-target="#edit_ref_modal" data-toggle="modal" class="edit-icon" href="#" onclick="cargoReferencia({{$referencia->id}})"><i class="fa fa-pencil"></i></a></div> --}}
                                                                        <div class="pro-edit">
                                                                            <h3 class="card-title">Deducción<i class="fas fa-file-invoice-dollar"></i></h3>
                                                                        </div>

                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item">
                                                                                <div class="title">Nombre:</div>
                                                                                <div class="text">{{$deduc->nombre}}</div>
                                                                            </li>
                                                                            @if ($deduc->monto == NULL)
                                                                                <li class="list-group-item">
                                                                                    <div class="title">Porcentaje:</div>
                                                                                    <div class="text">{{$deduc->porcentaje}}%</div>
                                                                                </li>
                                                                            @elseif ($deduc->porcentaje == NULL)
                                                                                <li class="list-group-item">
                                                                                    <div class="title">Monto:</div>
                                                                                    <div class="text">Lps. {{$deduc->monto}}</div>
                                                                                </li>
                                                                            @endif
                                                                            <li class="list-group-item">
                                                                                <div class="title">Descripción:</div>
                                                                                <div class="text">{{$deduc->descripcion}}</div>
                                                                            </li>
                                                                            <li class="list-group-item">
                                                                                @if($deduc->estado == 0)
                                                                                    <button type="button" class="btn btn-success active btn-block">ACTIVO</button>
                                                                                @elseif($deduc->estado == 1)
                                                                                    <button type="button" class="btn btn-danger active btn-block">CANCELADO</button>
                                                                                @endif
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                    </div>
                                                </section>
                                            </div>
                                            <!-- /Deducciones Tab -->
                                        </div>
                                    </div>
                                    <!-- /Page Content -->

                                    <!-- edit empleado -->
                                    <div id="profile_info" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Id Colaborador: {{$empleado->id}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-group" id="formEditEmpleado">
                                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="profile-img-wrap edit-img">
                                                                    <img class="inline-block" src="../../assets/img//user.jpg" alt="user">
                                                                    <div class="fileupload btn">
                                                                        <span class="btn-text">edit</span>
                                                                        <input class="upload" type="file">
                                                                    </div>
                                                                </div>
                                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                                    <div class="card-header">
                                                                        <h3 class="card-header text-primary text-center">Informacion Principal</h3>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Primer Nombre<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->primer_nombre}}" id="primer_nombre" name="primer_nombre" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Segundo Nombre</label>
                                                                                <input class="form-control is-valid" value="{{$empleado->segundo_nombre}}" id="segundo_nombre" name="segundo_nombre" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Primer Apellido<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->primer_apellido}}" id="primer_apellido" name="primer_apellido"type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Segundo Apellido<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->segundo_apellido}}" id="segundo_apellido" name="segundo_apellido" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Num. Identidad<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->identidad}}" id="identidad" name="identidad" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Fecha de Nacimiento<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->fecha_nacimiento}}" name="fecha_nacimiento" id="fecha_nacimiento" type="date">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Numero de casa<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" disabled value="{{$direccion->numero_casa}}" id="numero_casa" name="numero_casa" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->email}}" id="email" name="email" type="email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Telefono Principal<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->telefono_1}}" id="telefono_1" name="telefono_1" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Direccion de casa<span class="text-danger">*</span></label>
                                                                                <textarea class="form-control is-valid" disabled value="{{$direccion->descripcion}}" id="descripcion" name="descripcion" cols="30" rows="5"></textarea>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                                    <div class="card-header">
                                                                        <h3 class="card-header text-primary text-center">Información detallada</h3>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">RTN<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->rtn}}" id="rtn" name="rtn" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Estado Civil<span class="text-danger">*</span></label>
                                                                                <select class="form-select is-valid" id="estado_civil" name="estado_civil">
                                                                                    <option selected value="{{$empleado->estado_civil}}">{{$empleado->estado_civil}}</option>
                                                                                    <option value="SOLTERO(a)">SOLTERO(a)</option>
                                                                                    <option value="CASADO(a)">CASADO(a)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Lugar de Nacimiento<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->lugar_nacimiento}}" id="lugar_nacimiento" name="lugar_nacimiento" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                                                    <div class="card-header">
                                                                        <h3 class="card-header text-primary text-center">Gerencia</h3>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Fecha de Ingreso<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->fecha_ingreso}}" id="fecha_ingreso" name="fecha_ingreso" type="date">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Sueldo<span class="text-danger">*</span></label>
                                                                                <input class="form-control is-valid" value="{{$empleado->sueldo}}" id="sueldo" name="sueldo" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Estatus <span class="text-danger">*</span></label>
                                                                                <select class="form-select is-valid" id="estatus_id" name="estatus_id">
                                                                                    <option selected="selected"  value="{{$empleado->estatus_id}}">@if ($empleado->estatus_id == 1) ACTIVO @else INACTIVO @endif</option>
                                                                                    <option value="1">1-ACTIVO</option>
                                                                                    <option value="2">2-INACTIVO</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Telefono Secundario</label>
                                                                                <input class="form-control is-valid" value="{{$empleado->telefono_1}}" id="telefono_2" name="telefono_2" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Correo Institucional</label>
                                                                                <input class="form-control is-valid" value="{{$empleado->email_institucional}}" id="email_institucional" name="email_institucional" type="email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            {{-- Lugar asignado/Municipio --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-section">
                                                            <button class="btn btn-warning" type="submit" id="btnEditEmpleado" onclick="validacionEmpleadoPrincipal({{$empleado->id}})" >Editar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- añadir referencia -->
                                    <div class="modal custom-modal fade" id="referencia_modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="form-header">
                                                        <h3>Añadir referencia a {{$empleado->primer_nombre}} {{$empleado->primer_apellido}}</h3>
                                                    </div>
                                                    <form id="formReferencia" class="form-group" data-parsley-validate>
                                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                        <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded">
                                                            <div class="card-header">
                                                                <h3 class="card-header text-secondary text-center">Datos de referencia</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Nombre Completo<span class="text-danger">*</span></label>
                                                                            <input class="form-control " id="nombre_referencia" name="nombre_referencia" type="text" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Identidad<span class="text-danger">*</span></label>
                                                                            <input class="form-control " id="identidad_referencia" maxlength="15" minlength="15" name="identidad_referencia" type="text" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Telefono<span class="text-danger">*</span></label>
                                                                            <input class="form-control " id="telefono_referencia" name="telefono_referencia"  type="text" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                                            <input class="form-control " id="email_referencia" name="email_referencia" type="text" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Parentezco<span class="text-danger">*</span></label>
                                                                            <select name="parentezco_referencia" id="parentezco_referencia" required>
                                                                                <option selected value="">Seleccione</option>
                                                                                <option value="PADRE">Padre</option>
                                                                                <option value="MADRE">Madre</option>
                                                                                <option value="ESPOSO(A)">Esposo(a)</option>
                                                                                <option value="HERMANO(A)">Hermano(a)</option>
                                                                                <option value="HIJO(O)">Hijo(a)</option>
                                                                                <option value="HIJASTRO(A)">Hijastro(a)</option>
                                                                                <option value="ABUELO(A)">Abuelo(a)</option>
                                                                                <option value="SUEGRO(A)">Suegro(a)</option>
                                                                                <option value="NIETO(A)">Nieto(a)</option>
                                                                                <option value="SOBRINO(A)">Sobrino(a)</option>
                                                                                <option value="NUERA/YERNO">Nuera/Yerno</option>
                                                                                <option value="PADRINO/MADRINA">Padrino/Madrina</option>
                                                                                <option value="CUÑADO">Cuñado(a)</option>
                                                                                <option value="TIO(A)">Tio(a)</option>
                                                                                <option value="PRIMO(A)">Primo(a)</option>
                                                                                <option value="AMIGO(A)">Amigo(a)</option>
                                                                                <option value="VECINO">Vecino</option>
                                                                                <option value="COMPADRE/COMADRE">Compadre/comadre</option>
                                                                                <option value="COMPAÑERO DE TRABAJO">Compañero de trabajo</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Dirección<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control" id="direccion_referencia" name="direccion_referencia" cols="20" rows="3" required></textarea>
                                                                            <input type="hidden" id="Idemploye" name="Idemploye" value="{{$empleado->id}}">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-btn">
                                                            <div class="submit-section">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <button href="javascript:void(0);" class="btn btn-success btn-lg" type="submit" id="btnGuardarReferencia" {{-- onclick="anadirReferencia()" --}}>Añadir</button>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-warning btn-lg">Cancelar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Editar Referencia Modal-->
                                    <div id="edit_ref_modal" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Referencia de {{ $empleado->primer_nombre }} {{ $empleado->primer_apellido}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form  id="formEditReferencia" class="form-group" data-parsley-validate>
                                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                        <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none">
                                                        <div class="card shadow p-3 mb-5 bg-white rounded">
                                                            <div class="card-header">
                                                                <h3 class="card-header text-secondary text-center">Datos de referencia</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Nombre Completo<span class="text-danger">*</span></label>
                                                                            <input class="form-control" id="nombre_referencia_edit" name="nombre_referencia_edit" required value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Identidad<span class="text-danger">*</span></label>
                                                                            <input class="form-control" required id="identidad_referencia_edit" name="identidad_referencia_edit" value="" type="text" maxlength="13">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Telefono<span class="text-danger">*</span></label>
                                                                            <input class="form-control" id="telefono_referencia_edit" name="telefono_referencia_edit" required value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                                            <input class="form-control" id="email_referencia_edit" name="email_referencia_edit"  required value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Parentezco<span class="text-danger">*</span></label>
                                                                            <select name="parentezco_referencia_edit" id="parentezco_referencia_edit" class="form-control" required>
                                                                                <option selected value="">Seleccione</option>
                                                                                <option value="PADRE">Padre</option>
                                                                                <option value="MADRE">Madre</option>
                                                                                <option value="ESPOSO(A)">Esposo(a)</option>
                                                                                <option value="HERMANO(A)">Hermano(a)</option>
                                                                                <option value="HIJO(O)">Hijo(a)</option>
                                                                                <option value="HIJASTRO(A)">Hijastro(a)</option>
                                                                                <option value="ABUELO(A)">Abuelo(a)</option>
                                                                                <option value="SUEGRO(A)">Suegro(a)</option>
                                                                                <option value="NIETO(A)">Nieto(a)</option>
                                                                                <option value="SOBRINO(A)">Sobrino(a)</option>
                                                                                <option value="NUERA/YERNO">Nuera/Yerno</option>
                                                                                <option value="PADRINO/MADRINA">Padrino/Madrina</option>
                                                                                <option value="CUÑADO">Cuñado(a)</option>
                                                                                <option value="TIO(A)">Tio(a)</option>
                                                                                <option value="PRIMO(A)">Primo(a)</option>
                                                                                <option value="AMIGO(A)">Amigo(a)</option>
                                                                                <option value="VECINO">Vecino</option>
                                                                                <option value="COMPADRE/COMADRE">Compadre/comadre</option>
                                                                                <option value="COMPAÑERO DE TRABAJO">Compañero de trabajo</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Estado<span class="text-danger">*</span></label>
                                                                            <select name="estado_referencia_edit" id="estado_referencia_edit" class="form-control" required>
                                                                                <option selected value="">Seleccione estado</option>
                                                                                <option value="1">1-ACTIVO</option>
                                                                                <option value="2">2-INACTIVO</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Dirección<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control" required id="direccion_referencia_edit" name="direccion_referencia_edit" value="" cols="30" rows="10"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-section">
                                                            <button class="btn btn-primary" {{-- onclick="editarReferencia()" --}}>Editar</button>
                                                            <input type="hidden" id="idREF" name="idREF" value="">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- /Editar Referencia Modal -->


                        @endforeach
                    @endforeach
            @endforeach
        @endforeach
@endforeach
    </div>
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>

        $('#formReferencia').submit(function(e){
            e.preventDefault();
            var id = document.getElementById("Idemploye").value;
            var identidad_referencia = document.getElementById("identidad_referencia").value;
            if(/_/g.test(identidad_referencia) || identidad_referencia.length == 0 || identidad_referencia.length < 13){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad completa de la referencia',
                    timer: 1000
                    })
                    e.preventDefault();
            }else{
                anadirReferencia(id);
            }
        });
        $('#formDeduccion').submit(function(e){
            e.preventDefault();
            var selectTipoDeduccion = document.getElementById("TipodeducSelect").value;
            if(selectTipoDeduccion == 0 || selectTipoDeduccion == 1){
                agregarDeducEmp();
            }
        });
        $('#formEditReferencia').submit(function(e){
            console.log("entro porque si");
            e.preventDefault();
            var identidad_referencia_edit = $('#identidad_referencia_edit').val();
            if(/_/g.test(identidad_referencia_edit) || identidad_referencia_edit.length != 13){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad completa',
                    timer: 1000
                    })
                    event.preventDefault();
            }else{
                editarReferencia();
            }
        });

        var  idRef  = document.getElementById("identidad_referencia");
        var  imRef = new Inputmask("9999-9999-99999");
        Idr = imRef.mask(idRef );

        var  idrefEdit  = document.getElementById("identidad_referencia_edit");
        var  imidrefEdit = new Inputmask("9999-9999-99999");
        idfE = im.mask(idrefEdit);

        var  idEditEmpl  = document.getElementById("identidad_referencia");
        var  imidEditEmpl = new Inputmask("9999-9999-99999");
        idEE = imidEditEmpl.mask(idEditEmpl);

        function renderReferencia(data){
            $('#nombre_referencia_edit').val(data[0].nombre);
            $('#identidad_referencia_edit').val(data[0].identidad);
            $('#telefono_referencia_edit').val(data[0].telefono);
            $('#email_referencia_edit').val(data[0].email);
            $('#parentezco_referencia_edit').val(data[0].parentezco);
            $('#direccion_referencia_edit').val(data[0].direccion);
            $('#estado_referencia_edit').val(data[0].estatus_referencia_id);
            $('#idREF').val(data[0].id);
        }

        function editarReferencia(){
            var id = $('#idREF').val();
            var data = new FormData($('#formEditReferencia').get(0));

                $.ajax({
                    type:"POST",
                    url: "/empleado/editar/referencia/"+id,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);

                    }

                })
                Swal.fire({
                            icon: 'success',
                            text: 'Editado con éxito!',
                            timer: 1500
                });
                location.reload();


        }

        function cargoReferencia(idReferencia){
            $.ajax({
                type:"GET",
                url: "/empleado/referencia/get/"+idReferencia,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    renderReferencia(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function editarEmpleadoPrincipal(id){
            var data = new FormData($('#formEditEmpleado').get(0));
            console.log(data);
            $.ajax({
                type:"POST",
                url: "/empleado/editar/"+id,
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formEditEmpleado').trigger("reset");
                    $('#profile_info').modal('hide');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            })
            Swal.fire({
                icon: 'success',
                text: 'Editado con éxito!',
                timer: 1500
                });
        }
        function validacionEmpleadoPrincipal(id){
            var primer_nombre = $('#primer_nombre').val();
                    var segundo_nombre = $('#segundo_nombre').val();
                    var primer_apellido = $('#primer_apellido').val();
                    var segundo_apellido = $('#segundo_apellido').val();
                    var fecha_nacimiento = $('#fecha_nacimiento').val();
                    var identidad = $('#identidad').val();
                    var rtn = $('#rtn').val();
                    var lugar_nacimiento = $('#lugar_nacimiento').val();
                    var grado_academico_id = $('#grado_academico_id').val();
                    var estado_civil = $('#estado_civil').val();
                    var select_deptos_pais = $('#select_deptos_pais').val();
                    var municipio_id = $('#municipio_id').val();
                    var email = $('#email').val();
                    var numero_casa = $('#numero_casa').val();
                    var email_institucional = $('#email_institucional').val();
                    var telefono_1 = $('#telefono_1').val();
                    var telefono_2 = $('#telefono_2').val();
                    var selectDeptos_Modal = $('#selectDeptos_Modal').val();
                    var select_area_Moral = $('#select_area_Moral').val();
                    var cargo_id = $('#cargo_id').val();
                    var fecha_ingreso = $('#fecha_ingreso').val();
                    var estatus_id = $('#estatus_id').val();
                    var sueldo = $('#sueldo').val();
                    var descripcion_laboral = $('#descripcion_laboral').val();

                    if(/_/g.test(identidad)){
                            let identidad = document.getElementById('identidad');
                            identidad.className = 'form-control is-invalid';
                            Swal.fire({
                                icon: 'warning',
                                text: 'Debe indicar la identidad completa',
                                timer: 1000
                            })
                            event.preventDefault();
                    }else if(primer_nombre.length == 0){

                        let primer_nombre = document.getElementById('primer_nombre');
                        primer_nombre.className = 'form-control is-invalid';

                            Swal.fire({
                            icon: 'warning',
                            text: 'Debe escribir un nombre',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(primer_apellido.length == 0){

                        let segundo_apellido = document.getElementById('segundo_apellido');
                        segundo_apellido.className = 'form-control is-invalid';

                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe escribir el primer apellido',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(segundo_apellido.length == 0){
                        let fecha_nacimiento = document.getElementById('fecha_nacimiento');
                        fecha_nacimiento.className = 'form-control is-invalid';
                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe escribir el segundo apellido',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(fecha_nacimiento.length == 0){
                        let fecha_nacimiento = document.getElementById('fecha_nacimiento');
                        fecha_nacimiento.className = 'form-control is-invalid';
                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe indicar una fecha de nacimiento',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(identidad.length == 0){
                        let identidad = document.getElementById('identidad');
                        identidad.className = 'form-control is-invalid';
                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe indicar número de identidad',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(email.length == 0){
                        let email = document.getElementById('email');
                        email.className = 'form-control is-invalid';
                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe indicar un correo electrónico',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(telefono_1.length == 0){
                        let telefono_1 = document.getElementById('telefono_1');
                        telefono_1.className = 'form-control is-invalid';
                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe ingresar un número telefónico',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(rtn.length == 0){
                        let rtn = document.getElementById('rtn');
                        rtn.className = 'form-control is-valid';
                        Swal.fire({
                            icon: 'warning',
                            text: 'Debe indicar RTN',
                            timer: 1000
                            })
                            event.preventDefault();
                    }else if(estado_civil.length == 0){
                        let estado_civil = document.getElementById('estado_civil');
                        estado_civil.className = 'form-control is-valid';
                            Swal.fire({
                                icon: 'warning',
                                text: 'Debe indicar Estado civil',
                                timer: 1000
                                })
                                event.preventDefault();
                    }else if(lugar_nacimiento.length == 0){
                            let lugar_nacimiento = document.getElementById('lugar_nacimiento');
                            lugar_nacimiento.className = 'form-control is-invalid';
                            Swal.fire({
                                icon: 'warning',
                                text: 'Debe indicar Lugar de nacimiento',
                                timer: 1000
                                })
                                event.preventDefault();
                    }else if(estatus_id == ""){
                            let estado_civil = document.getElementById('estado_civil');
                            estado_civil.className = 'form-control is-valid';
                                Swal.fire({
                                    icon: 'warning',
                                    text: 'Debe indicar Estado del colaborador',
                                    timer: 1000
                                    })
                                    event.preventDefault();
                    }else if(sueldo.length == 0){
                            let sueldo = document.getElementById('sueldo');
                        sueldo.className = 'form-control is-invalid';
                            Swal.fire({
                                icon: 'warning',
                                text: 'Debe indicar Sueld bruto',
                                timer: 1000
                                })
                                event.preventDefault();
                    }else if(fecha_ingreso.length == 0){
                            let fecha_ingreso = document.getElementById('fecha_ingreso');
                        fecha_ingreso.className = 'form-control is-invalid';
                            Swal.fire({
                                icon: 'warning',
                                text: 'Debe indicar fecha de inicio del colaborador',
                                timer: 1000
                                })
                                event.preventDefault();
                    }else{
                        editarEmpleadoPrincipal(id);
                    }

        }

        /* function validacionReferencia(id){
            var nombre_referencia = $('#nombre_referencia').val();
            var identidad_referencia = $('#identidad_referencia').val();
            var telefono_referencia = $('#telefono_referencia').val();
            var email_referencia = $('#email_referencia').val();
            var parentezco_referencia = $('#parentezco_referencia').val();
            var direccion_referencia = $('#direccion_referencia').val();

            if(/_/g.test(identidad_referencia)){
                let identidad_referencia = document.getElementById('identidad_referencia');
                identidad_referencia.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad completa de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(nombre_referencia.length == 0){
                let nombre_referencia = document.getElementById('nombre_referencia');
                nombre_referencia.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un nombre de referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(identidad_referencia.length == 0 ){
                let identidad_referencia = document.getElementById('identidad_referencia');
                identidad_referencia.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad completa de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(telefono_referencia.length == 0){
                let telefono_referencia = document.getElementById('telefono_referencia');
                telefono_referencia.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un teléfono de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(email_referencia.length == 0){
                let email_referencia = document.getElementById('email_referencia');
                email_referencia.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una correo electrónico de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(parentezco_referencia == ""){
                let parentezco_referencia = document.getElementById('parentezco_referencia');
                parentezco_referencia.className = 'form-control is-valid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un parentezco en la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(direccion_referencia.length == 0){
                let direccion_referencia = document.getElementById('direccion_referencia');
                ddireccion_referencia.className = 'form-control is-valid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una direccion de referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else{
                anadirReferencia(id);
            }
        } */

        /* function validarDeduccionesEmp(){
            var nombre_deduc = $('#nombre_deduc').val();
            var porcentaje_deduc = $('#porcentaje_deduc').val();
            var monto_deduc = $('#monto_deduc').val();
            var descripcion_deduc = $('#descripcion_deduc').val();
            var idEmpleadoDe = $('#idEmpleadoDe').val();
            var TipodeducSelect = document.getElementById("TipodeducSelect").value;
            var prueba = 3;

            if(descripcion_deduc.length == 0){
                let descripcion_deduc = document.getElementById('descripcion_deduc');
                descripcion_deduc.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una breve descripción de la deducción',
                    timer: 1200
                    })
                    event.preventDefault();
            }else if(TipodeducSelect == 20){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe Escoger un tipo de deduccion',
                    timer: 1200
                    })
                    event.preventDefault();
            }else if(nombre_deduc.length == 0){
                let nombre_deduc = document.getElementById('nombre_deduc');
                nombre_deduc.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un nombre especifico de la deducción',
                    timer: 1200
                    })
                    event.preventDefault();
            }else if(porcentaje_deduc.length == 0 && TipodeducSelect == 0){
                let porcentaje_deduc = document.getElementById('porcentaje_deduc');
                porcentaje_deduc.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un porcentaje de deducción',
                    timer: 1200
                    })
                    event.preventDefault();
            }else if(monto_deduc.length == 0 && TipodeducSelect == 1){
                let monto_deduc = document.getElementById('monto_deduc');
                monto_deduc.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un monto fijo',
                    timer: 1200
                    })
                    event.preventDefault();
            }else{
                agregarDeducEmp(idEmpleadoDe);
            }
        } */

        /* function valDeducciones(){
            var selectTipoDeduccion = document.getElementById("TipodeducSelect").value;
            console.log(selectTipoDeduccion);

                $("#monto_deduc").removeAttr("required");
                $("#porcentaje_deduc").removeAttr("required");
            if(selectTipoDeduccion){
                if(selectTipoDeduccion == 0){
                    $("porcentaje_deduc").prop("required", true);
                    $("#monto_deduc").removeAttr("required");
                    agregarDeducEmp();
                }else if(selectTipoDeduccion == 1){
                    $("monto_deduc").prop("required", true);
                    $("#porcentaje_deduc").removeAttr("required");
                    agregarDeducEmp();
                }
            }else{
                $("#TipodeducSelect").removeAttr("required");
            }
        } */
        function agregarDeducEmp(){
            var data = new FormData($('#formDeduccion').get(0));
                    $.ajax({
                    type:"POST",
                    url: "/empleado/deducciones",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        $('#formDeduccion').trigger("reset");
                        $('#Deduccion_modal').modal('hide')
                        /* console.log(data); */
                            Swal.fire({
                            icon: 'success',
                            text: 'Deducción guardada con éxito!',
                            timer: 1500
                            });

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                })
        }

        function anadirReferencia(id){
            var data = new FormData($('#formReferencia').get(0));
                    $.ajax({
                    type:"POST",
                    url: "/empleado/referencia/"+id,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        console.log(data);
                        $('#formReferencia').trigger("reset");
                        $('#referencia_modal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            text: 'Referencia guardada con éxito!',
                            timer: 1500
                            });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                })
        }

        function selecteValor_TipoDeduc(){
            console.log("Encuentra la función");
        }
    </script>
@endsection
    <!-- /Page Wrapper -->


