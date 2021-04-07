
    <div class="page-wrapper">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    {{--  --}}
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

                                        <div class="card mb-0">
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

                                        <div class="card tab-box">
                                            <div class="row user-tabs">
                                                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                    <ul class="nav nav-tabs nav-tabs-bottom">
                                                        <li class="nav-item"><a href="#emp_informacion" data-toggle="tab" class="nav-link active"><i class="fas fa-info"></i> INFORMACÓN</a></li>
                                                        <li class="nav-item"><a href="#emp_funciones" data-toggle="tab" class="nav-link"><i class="fas fa-briefcase"></i> FUNCIONES DE TRABAJO</a></li>
                                                        <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link"><i class="fas fa-hand-holding-usd"></i> DETALLE DE PLANILLA</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content">

                                            <!----------------------------- Detalle completo de informacion -------------------------->
                                            <div id="emp_informacion" class="pro-overview tab-pane fade show active">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex">
                                                        <div class="card profile-box flex-fill">
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
                                                        <div class="card profile-box flex-fill">
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
                                                                <div class="card profile-box flex-fill">
                                                                    <div class="card-body">
                                                                        <div class="pro-edit"><a data-target="#edit_ref_modal" data-toggle="modal" class="edit-icon" href="#" onclick="cargoReferencia({{$referencia->id}})"><i class="fa fa-pencil"></i></a></div>
                                                                        <h3 class="card-title">Referencia Personal <i class="fas fa-user-check"></i></h3>
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
                                                {{-- <div class="row">
                                                    @foreach ($funciones as $funcion)
                                                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="dropdown profile-action">
                                                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i>Editar</a>
                                                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>Elimiar</a>
                                                                    </div>
                                                                </div>
                                                                <h4 class="project-title"><a href="project-view.html">{{$area->nombre}}</a></h4>
                                                                <small class="block text-ellipsis m-b-15">
                                                                    <span class="text-xs">1</span> <span class="text-muted">Proyectos actuales</span>
                                                                    <span class="text-xs">9</span> <span class="text-muted">Proyectos completados</span>
                                                                </small>
                                                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. When an unknown printer took a galley of type and
                                                                    scrambled it...
                                                                </p>
                                                                <p class="text-muted">{{$funcion->nombre}}
                                                                </p>
                                                                <div class="pro-deadline m-b-15">
                                                                    <div class="sub-title">
                                                                        Fecha de Asignación:
                                                                    </div>
                                                                    <div class="text-muted">
                                                                        {{$empleado->fecha_ingreso}}
                                                                    </div>
                                                                </div>
                                                                <div class="pro-deadline m-b-15">
                                                                    <div class="sub-title">
                                                                        Jefe inmediato:
                                                                    </div>
                                                                    <div class="text-muted">
                                                                        Ariel Morazán
                                                                    </div>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Team :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="all-users">+15</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                                                <div class="progress progress-xs mb-0">
                                                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach


                                                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="dropdown profile-action">
                                                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                                <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                                                <small class="block text-ellipsis m-b-15">
                                                                    <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                                                    <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                                                </small>
                                                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. When an unknown printer took a galley of type and
                                                                    scrambled it...
                                                                </p>
                                                                <div class="pro-deadline m-b-15">
                                                                    <div class="sub-title">
                                                                        Deadline:
                                                                    </div>
                                                                    <div class="text-muted">
                                                                        17 Apr 2019
                                                                    </div>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Project Leader :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Team :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="all-users">+15</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                                                <div class="progress progress-xs mb-0">
                                                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="dropdown profile-action">
                                                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                                <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                                                <small class="block text-ellipsis m-b-15">
                                                                    <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                                                    <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                                                </small>
                                                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. When an unknown printer took a galley of type and
                                                                    scrambled it...
                                                                </p>
                                                                <div class="pro-deadline m-b-15">
                                                                    <div class="sub-title">
                                                                        Deadline:
                                                                    </div>
                                                                    <div class="text-muted">
                                                                        17 Apr 2019
                                                                    </div>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Project Leader :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Team :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="all-users">+15</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                                                <div class="progress progress-xs mb-0">
                                                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="dropdown profile-action">
                                                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                        <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                                <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                                                <small class="block text-ellipsis m-b-15">
                                                                    <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                                                    <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                                                </small>
                                                                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. When an unknown printer took a galley of type and
                                                                    scrambled it...
                                                                </p>
                                                                <div class="pro-deadline m-b-15">
                                                                    <div class="sub-title">
                                                                        Deadline:
                                                                    </div>
                                                                    <div class="text-muted">
                                                                        17 Apr 2019
                                                                    </div>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Project Leader :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Jeffery Lalor"><img alt="" src="assets/img/profiles/avatar-16.jpg"></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="project-members m-b-15">
                                                                    <div>Team :</div>
                                                                    <ul class="team-members">
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Doe"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Richard Miles"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="John Smith"><img alt="" src="assets/img/profiles/avatar-10.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" data-toggle="tooltip" title="Mike Litorus"><img alt="" src="assets/img/profiles/avatar-05.jpg"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#" class="all-users">+15</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                                                <div class="progress progress-xs mb-0">
                                                                    <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="card mb-0">
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

                                            <!-- Bank Statutory Tab -->
                                            <div class="tab-pane fade" id="bank_statutory">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title"> Basic Salary Information</h3>
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                                                        <select class="select">
                                                                            <option>Select salary basis type</option>
                                                                            <option>Hourly</option>
                                                                            <option>Daily</option>
                                                                            <option>Weekly</option>
                                                                            <option>Monthly</option>
                                                                        </select>
                                                                </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">$</span>
                                                                            </div>
                                                                            <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Payment type</label>
                                                                        <select class="select">
                                                                            <option>Select payment type</option>
                                                                            <option>Bank transfer</option>
                                                                            <option>Check</option>
                                                                            <option>Cash</option>
                                                                        </select>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <h3 class="card-title"> PF Information</h3>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">PF contribution</label>
                                                                        <select class="select">
                                                                            <option>Select PF contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                                                        <select class="select">
                                                                            <option>Select PF contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Employee PF rate</label>
                                                                        <select class="select">
                                                                            <option>Select PF contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                                        <select class="select">
                                                                            <option>Select additional rate</option>
                                                                            <option>0%</option>
                                                                            <option>1%</option>
                                                                            <option>2%</option>
                                                                            <option>3%</option>
                                                                            <option>4%</option>
                                                                            <option>5%</option>
                                                                            <option>6%</option>
                                                                            <option>7%</option>
                                                                            <option>8%</option>
                                                                            <option>9%</option>
                                                                            <option>10%</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Total rate</label>
                                                                        <input type="text" class="form-control" placeholder="N/A" value="11%">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Employee PF rate</label>
                                                                        <select class="select">
                                                                            <option>Select PF contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                                        <select class="select">
                                                                            <option>Select additional rate</option>
                                                                            <option>0%</option>
                                                                            <option>1%</option>
                                                                            <option>2%</option>
                                                                            <option>3%</option>
                                                                            <option>4%</option>
                                                                            <option>5%</option>
                                                                            <option>6%</option>
                                                                            <option>7%</option>
                                                                            <option>8%</option>
                                                                            <option>9%</option>
                                                                            <option>10%</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Total rate</label>
                                                                        <input type="text" class="form-control" placeholder="N/A" value="11%">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <h3 class="card-title"> ESI Information</h3>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">ESI contribution</label>
                                                                        <select class="select">
                                                                            <option>Select ESI contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                                                        <select class="select">
                                                                            <option>Select ESI contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Employee ESI rate</label>
                                                                        <select class="select">
                                                                            <option>Select ESI contribution</option>
                                                                            <option>Yes</option>
                                                                            <option>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                                        <select class="select">
                                                                            <option>Select additional rate</option>
                                                                            <option>0%</option>
                                                                            <option>1%</option>
                                                                            <option>2%</option>
                                                                            <option>3%</option>
                                                                            <option>4%</option>
                                                                            <option>5%</option>
                                                                            <option>6%</option>
                                                                            <option>7%</option>
                                                                            <option>8%</option>
                                                                            <option>9%</option>
                                                                            <option>10%</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Total rate</label>
                                                                        <input type="text" class="form-control" placeholder="N/A" value="11%">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                            <div class="submit-section">
                                                                <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Bank Statutory Tab -->

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
                                                    <form id="formReferencia" class="form-group">
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
                                                                            <textarea class="form-control" id="direccion_referencia" name="direccion_referencia" cols="20" rows="3"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-btn">
                                                            <div class="submit-section">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <button href="javascript:void(0);" class="btn btn-success btn-lg" type="submit" id="btnGuardarReferencia" onclick="validacionReferencia({{$empleado->id}})">Añadir</button>
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
                                                    <form class="form-group" id="formEditReferencia">
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
                                                                            <input class="form-control is-valid" id="nombre_referencia_edit" name="nombre_referencia_edit" required value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Identidad<span class="text-danger">*</span></label>
                                                                            <input class="form-control is-valid" id="identidad_referencia_edit" name="identidad_referencia_edit" value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Telefono<span class="text-danger">*</span></label>
                                                                            <input class="form-control is-valid" id="telefono_referencia_edit" name="telefono_referencia_edit" value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                                            <input class="form-control is-valid" id="email_referencia_edit" name="email_referencia_edit" value="" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Parentezco<span class="text-danger">*</span></label>
                                                                            <select name="parentezco_referencia_edit" id="parentezco_referencia_edit">
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
                                                                            <select name="estado_referencia_edit" id="estado_referencia_edit">
                                                                                <option selected value="">Seleccione estado</option>
                                                                                <option value="1">1-ACTIVO</option>
                                                                                <option value="2">2-INACTIVO</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="col-form-label">Dirección<span class="text-danger">*</span></label>
                                                                            <textarea class="form-control is-valid" id="direccion_referencia_edit" name="direccion_referencia_edit" value="" cols="30" rows="10"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="submit-section">
                                                            <button class="btn btn-primary" onclick="editarReferencia()">Editar</button>
                                                            <input type="hidden" id="idREF" name="idREF" value="">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- /Editar Referencia Modal -->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
                                    <script>
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
                                            event.preventDefault();
                                            var id = $('#idREF').val();
                                            var data = new FormData($('#formEditReferencia').get(0));
                                            var nombre_referencia_edit = $('#nombre_referencia_edit').val();
                                            var identidad_referencia_edit = $('#identidad_referencia_edit').val();
                                            var telefono_referencia_edit = $('#telefono_referencia_edit').val();
                                            var email_referencia_edit = $('#email_referencia_edit').val();
                                            var parentezco_referencia_edit = $('#parentezco_referencia_edit').val();
                                            var direccion_referencia_edit = $('#direccion_referencia_edit').val();


                                            if(/_/g.test(identidad_referencia_edit)){
                                                let identidad_referencia_edit = document.getElementById('identidad_referencia_edit');
                                                identidad_referencia_edit.className = 'form-control is-invalid';
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe indicar la identidad completa de la referencia',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(nombre_referencia_edit.length == 0){

                                                let nombre_referencia_edit = document.getElementById('nombre_referencia_edit');
                                                nombre_referencia_edit.className = 'form-control is-invalid';

                                            }else if(identidad_referencia_edit.length == 0){

                                                let identidad_referencia_edit = document.getElementById('identidad_referencia_edit');
                                                identidad_referencia_edit.className = 'form-control is-invalid';

                                            }else if(telefono_referencia_edit.length == 0){

                                                let telefono_referencia_edit = document.getElementById('telefono_referencia_edit');
                                                telefono_referencia_edit.className = 'form-control is-invalid';

                                            }else if(email_referencia_edit.length == 0){

                                                let email_referencia_edit = document.getElementById('email_referencia_edit');
                                                email_referencia_edit.className = 'form-control is-invalid';

                                            }else if(parentezco_referencia_edit == ''){

                                                let parentezco_referencia_edit = document.getElementById('parentezco_referencia_edit');
                                                parentezco_referencia_edit.className = 'form-control is-invalid';

                                            }else if(direccion_referencia_edit.length == 0){

                                                let direccion_referencia_edit = document.getElementById('direccion_referencia_edit');
                                                direccion_referencia_edit.className = 'form-control is-invalid';

                                            }else{
                                                $.ajax({
                                                type:"POST",
                                                url: "/empleado/editar/referencia/"+id,
                                                data: data,
                                                contentType: false,
                                                cache: false,
                                                processData:false,
                                                dataType:"json",
                                                success: function(data){
                                                    console.log(data);
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

                                        function validacionReferencia(id){
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
                                        }
                                        function anadirReferencia(id){
                                            var data = new FormData($('#formReferencia').get(0));
                                            location.reload()
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
                                                        /* var info = $.parseJSON(data);
                                                        console.log(info); */
                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) {
                                                        console.log(jqXHR, textStatus, errorThrown);
                                                    }
                                                })
                                                Swal.fire({
                                                        icon: 'success',
                                                        text: 'Referencia guardada con éxito!',
                                                        timer: 1500
                                                        });
                                                $('#formReferencia').trigger("reset");
                                        }
                                    </script>
                        @endforeach
                    @endforeach
            @endforeach
        @endforeach
@endforeach
    </div>
    <!-- /Page Wrapper -->


