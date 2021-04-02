
    <div class="page-wrapper">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    {{--  --}}
@foreach($empleados as $empleado)
    @foreach($direcciones as $direccion)
        @foreach($referencias as $referencia)
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
                                        <a class="btn btn-danger" style="color: #ffffff;" data-toggle="modal" data-target="#delete_employee">Eliminar <i class="fas fa-user-minus"></i></a>
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
                                                                    <h5 class="text-muted">Cargo: {{$cargo->nombre}}</h5><br>
                                                                    <div class="staff-id">Empleado ID : {{$empleado->id}}</div><br>
                                                                    <div class="small doj text-muted"><i class="far fa-id-card"></i>  Identidad: {{$empleado->identidad}}</div>
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
                                                                    {{-- <li>
                                                                        <div class="title">Reports to:</div>
                                                                        <div class="text">
                                                                        <div class="avatar-box">
                                                                            <div class="avatar avatar-xs">
                                                                                <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <a href="profile.html">
                                                                                Jeffery Lalor
                                                                            </a>
                                                                        </div>
                                                                    </li> --}}
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
                                                <li class="nav-item"><a href="#emp_informacion" data-toggle="tab" class="nav-link active">Información</a></li>
                                                <li class="nav-item"><a href="#emp_funciones" data-toggle="tab" class="nav-link">Funciones de Trabajo</a></li>
                                                <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Detalles de salario y planilla</a></li>
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
                                            <div class="col-md-6 d-flex">
                                                <div class="card profile-box flex-fill">
                                                    <div class="card-body">
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
                                            <div class="col-md-6 d-flex">
                                                <div class="card profile-box flex-fill">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Referencia personal <i class="fas fa-user-check"></i>{{-- <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a> --}}</h3>
                                                        <div class="table-responsive">
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
                                            </div>
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

                            <!-- Profile Modal -->
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
                                                                        <input class="form-control" value="{{$empleado->primer_nombre}}" id="primer_nombre" name="primer_nombre" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Segundo Nombre</label>
                                                                        <input class="form-control" value="{{$empleado->segundo_nombre}}" id="segundo_nombre" name="segundo_nombre" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Primer Apellido<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->primer_apellido}}" id="primer_apellido" name="primer_apellido"type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Segundo Apellido<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->segundo_apellido}}" id="segundo_apellido" name="segundo_apellido" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Num. Identidad<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->identidad}}" id="identidad" name="identidad" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Fecha de Nacimiento<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->fecha_nacimiento}}" name="fecha_nacimiento" id="fecha_nacimiento" type="date">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Numero de casa<span class="text-danger">*</span></label>
                                                                        <input class="form-control" disabled value="{{$direccion->numero_casa}}" id="numero_casa" name="numero_casa" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->email}}" id="email" name="email" type="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Telefono Principal<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->telefono_1}}" id="telefono_1" name="telefono_1" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Direccion de casa<span class="text-danger">*</span></label>
                                                                        <textarea class="form-control" disabled value="{{$direccion->descripcion}}" id="descripcion" name="descripcion" cols="30" rows="5"></textarea>
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
                                                                        <input class="form-control" value="{{$empleado->rtn}}" id="rtn" name="rtn" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Estado Civil<span class="text-danger">*</span></label>
                                                                        <select class="select" id="estado_civil" name="estado_civil">
                                                                            <option selected value="{{$empleado->estado_civil}}">{{$empleado->estado_civil}}</option>
                                                                            <option value="SOLTERO(a)">SOLTERO(a)</option>
                                                                            <option value="CASADO(a)">CASADO(a)</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Lugar de Nacimiento<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->lugar_nacimiento}}" id="lugar_nacimiento" name="lugar_nacimiento" type="text">
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
                                                                        <input class="form-control" value="{{$empleado->fecha_ingreso}}" id="fecha_ingreso" name="fecha_ingreso" type="date">
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Sueldo<span class="text-danger">*</span></label>
                                                                        <input class="form-control" value="{{$empleado->sueldo}}" id="sueldo" name="sueldo" type="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Estatus <span class="text-danger">*</span></label>
                                                                        <select class="select" id="estatus_id" name="estatus_id">
                                                                            <option selected="selected"  value="{{$empleado->estatus_id}}">{{$empleado->estatus_id}}</option>
                                                                            <option value="1">1-ACTIVO</option>
                                                                            <option value="2">2-INACTIVO</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Telefono Secundario</label>
                                                                        <input class="form-control" value="{{$empleado->telefono_1}}" id="telefono_2" name="telefono_2" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Correo Institucional</label>
                                                                        <input class="form-control" value="{{$empleado->email_institucional}}" id="email_institucional" name="email_institucional" type="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    {{-- Lugar asignado/Municipio --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" value="4487 Snowbird Lane">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" value="New York">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text" class="form-control" value="United States">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pin Code</label>
                                                            <input type="text" class="form-control" value="10523">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input type="text" class="form-control" value="631-889-3206">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Department <span class="text-danger">*</span></label>
                                                            <select class="select">
                                                                <option>Select Department</option>
                                                                <option>Web Development</option>
                                                                <option>IT Management</option>
                                                                <option>Marketing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Designation <span class="text-danger">*</span></label>
                                                            <select class="select">
                                                                <option>Select Designation</option>
                                                                <option>Web Designer</option>
                                                                <option>Web Developer</option>
                                                                <option>Android Developer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Reports To <span class="text-danger">*</span></label>
                                                            <select class="select">
                                                                <option>-</option>
                                                                <option>Wilmer Deluna</option>
                                                                <option>Lesley Grauer</option>
                                                                <option>Jeffery Lalor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="submit-section">
                                                    <button class="btn btn-warning" type="submit" id="btnEditEmpleado" onclick="validacionEmpleadoPrincipal({{$empleado->id}})" >Editar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-header">
                                                <h3>Eliminar registros de colaborador</h3>
                                                <p>Está seguro(a) que desea eliminar registros de {{$empleado->nombre}}?</p>
                                            </div>
                                            <div class="modal-btn delete-action">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="javascript:void(0);" class="btn btn-danger continue-btn">Eliminar</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-warning cancel-btn">Cancelar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Profile Modal -->

                            <!-- Personal Info Modal -->
                            {{-- <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Información detallada</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-group" id="formEditInfoDetalle">
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Passport No</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Passport Expiry Date</label>
                                                            <div class="cal-icon">
                                                                <input class="form-control datetimepicker" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tel</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nationality <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Religion</label>
                                                            <div class="cal-icon">
                                                                <input class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Marital status <span class="text-danger">*</span></label>
                                                            <select class="select form-control">
                                                                <option>-</option>
                                                                <option>Single</option>
                                                                <option>Married</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Employment of spouse</label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>No. of children </label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Personal Info Modal -->

                            <!-- Family Info Modal -->
                            {{-- <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Family Informations</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-scroll">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Phone <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Phone <span class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="add-more">
                                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Family Info Modal -->

                            <!-- Emergency Contact Modal -->
                            {{-- <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Personal Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Primary Contact</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone 2</label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Primary Contact</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Phone 2</label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Emergency Contact Modal -->

                            <!-- Education Modal -->
                            {{-- <div id="education_info" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"> Education Informations</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-scroll">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="Oxford University" class="form-control floating">
                                                                        <label class="focus-label">Institution</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="Computer Science" class="form-control floating">
                                                                        <label class="focus-label">Subject</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <div class="cal-icon">
                                                                            <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                                        </div>
                                                                        <label class="focus-label">Starting Date</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <div class="cal-icon">
                                                                            <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                                        </div>
                                                                        <label class="focus-label">Complete Date</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="BE Computer Science" class="form-control floating">
                                                                        <label class="focus-label">Degree</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="Grade A" class="form-control floating">
                                                                        <label class="focus-label">Grade</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="Oxford University" class="form-control floating">
                                                                        <label class="focus-label">Institution</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="Computer Science" class="form-control floating">
                                                                        <label class="focus-label">Subject</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <div class="cal-icon">
                                                                            <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                                        </div>
                                                                        <label class="focus-label">Starting Date</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <div class="cal-icon">
                                                                            <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                                        </div>
                                                                        <label class="focus-label">Complete Date</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="BE Computer Science" class="form-control floating">
                                                                        <label class="focus-label">Degree</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus focused">
                                                                        <input type="text" value="Grade A" class="form-control floating">
                                                                        <label class="focus-label">Grade</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="add-more">
                                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Education Modal -->

                            <!-- Experience Modal -->
                            {{-- <div id="experience_info" class="modal custom-modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Experience Informations</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-scroll">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                                        <label class="focus-label">Company Name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <input type="text" class="form-control floating" value="United States">
                                                                        <label class="focus-label">Location</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                                        <label class="focus-label">Job Position</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                                        </div>
                                                                        <label class="focus-label">Period From</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                                        </div>
                                                                        <label class="focus-label">Period To</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                                        <label class="focus-label">Company Name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <input type="text" class="form-control floating" value="United States">
                                                                        <label class="focus-label">Location</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                                        <label class="focus-label">Job Position</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                                        </div>
                                                                        <label class="focus-label">Period From</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group form-focus">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                                        </div>
                                                                        <label class="focus-label">Period To</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="add-more">
                                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /Experience Modal -->
                            <script>
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
                                            if(primer_nombre.length == 0){
                                                    Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe escribir un nombre',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(primer_apellido.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe escribir el primer apellido',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(segundo_apellido.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe escribir el segundo apellido',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(fecha_nacimiento.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe indicar una fecha de nacimiento',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(identidad.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe indicar número de identidad',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(email.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe indicar un correo electrónico',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(telefono_1.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe ingresar un número telefónico',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(rtn.length == 0){
                                                Swal.fire({
                                                    icon: 'warning',
                                                    text: 'Debe indicar RTN',
                                                    timer: 1000
                                                    })
                                                    event.preventDefault();
                                            }else if(estado_civil.length == 0){
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        text: 'Debe indicar Estado civil',
                                                        timer: 1000
                                                        })
                                                        event.preventDefault();
                                                }else if(lugar_nacimiento.length == 0){
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        text: 'Debe indicar Lugar de nacimiento',
                                                        timer: 1000
                                                        })
                                                        event.preventDefault();
                                                }else if(estatus_id == ""){
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            text: 'Debe indicar Estado del colaborador',
                                                            timer: 1000
                                                            })
                                                            event.preventDefault();
                                                }else if(sueldo.length == 0){
                                                    Swal.fire({
                                                        icon: 'warning',
                                                        text: 'Debe indicar Sueld bruto',
                                                        timer: 1000
                                                        })
                                                        event.preventDefault();
                                                }else if(fecha_ingreso.length == 0){
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
                            </script>


                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
@endforeach
    </div>
    <!-- /Page Wrapper -->


