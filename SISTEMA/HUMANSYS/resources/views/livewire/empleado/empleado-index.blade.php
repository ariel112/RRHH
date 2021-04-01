<div class="page-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title"> </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Empleados</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee" ><i class="fa fa-plus"></i>Registrar Nuevo Empleado</a>
                    <div class="view-icons">
                        <a href="employees.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="employees-list.html" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        {{-- <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" id="identidad" name="identidad" class="form-control floating">
                    <label class="focus-label">Número de identidad</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" id="nombre" name="nombre" class="form-control floating">
                    <label class="focus-label">Nombre del empleado</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="select floating">
                        <option selected="selected">Buscar por Cargos</option>
                        <option>Web Developer</option>
                        <option>Web Designer</option>
                        <option>Android Developer</option>
                        <option>Ios Developer</option>
                    </select>
                    <label class="focus-label">Designation</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block"> Buscar </a>
            </div>
        </div> --}}
        <!-- Search Filter -->

        @livewire('empleado.empleado-card')
        {{-- <div class="row staff-grid-row">
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">John Doe</a></h4>
                    <div class="small text-muted">Web Designer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Richard Miles</a></h4>
                    <div class="small text-muted">Web Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-10.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">John Smith</a></h4>
                    <div class="small text-muted">Android Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-05.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Mike Litorus</a></h4>
                    <div class="small text-muted">IOS Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-11.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Wilmer Deluna</a></h4>
                    <div class="small text-muted">Team Leader</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-12.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Jeffrey Warden</a></h4>
                    <div class="small text-muted">Web Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-13.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Bernardo Galaviz</a></h4>
                    <div class="small text-muted">Web Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-01.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Lesley Grauer</a></h4>
                    <div class="small text-muted">Team Leader</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-16.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Jeffery Lalor</a></h4>
                    <div class="small text-muted">Team Leader</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-04.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Loren Gatlin</a></h4>
                    <div class="small text-muted">Android Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-03.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Tarah Shropshire</a></h4>
                    <div class="small text-muted">Android Developer</div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <div class="profile-img">
                        <a href="{{ route('empleado.perfil',1) }}" class="avatar"><img src="assets/img/profiles/avatar-08.jpg" alt=""></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',1) }}">Catherine Manseau</a></h4>
                    <div class="small text-muted">Android Developer</div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- /Page Content -->

    <!-- Crear Empleado Modal -->
    <div id="add_employee" class="modal custom-modal fade " role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Expediente de empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" id="formEmpleado">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header rounded"><h3 class="card-header text-primary text-center">Información personal</h3></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Primer Nombre<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="primer_nombre" name="primer_nombre" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Segundo Nombre<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="segundo_nombre" name="segundo_nombre" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Primer Apellido<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="primer_apellido" name="primer_apellido"type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Segundo Apellido<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="segundo_apellido" name="segundo_apellido" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Fecha de Nacimiento</label>
                                                    <input class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" type="date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Num. Identidad<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="identidad" name="identidad" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">RTN<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="rtn" name="rtn" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Lugar de Nacimiento<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Grado Académico</label>
                                                    <select class="select" id="grado_academico_id" name="grado_academico_id">
                                                        <option selected value="">Seleccione </option>
                                                        <option value="1">PRIMARIA</option>
                                                        <option value="2">SECUNDARIA</option>
                                                        <option value="3">UNIVERSIDAD COMPLETA</option>
                                                        <option value="4">UNIVERSIDAD INCOMPLETA</option>
                                                        <option value="5">POSTGRADO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Estado Civil</label>
                                                    <select class="select" id="estado_civil" name="estado_civil">
                                                        <option selected value="">Seleccione </option>
                                                        <option value="SOLTERO(a)">SOLTERO(a)</option>
                                                        <option value="CASADO(a)">CASADO(a)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-primary text-center">Localización</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Departamento</label>
                                                    <select class="select" id="select_deptos_pais" name="select_deptos_pais" onchange="selectValor()">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Municipio</label>
                                                    <select class="select" id="municipio_id" name="municipio_id">
                                                        <option value="" selected >Seleccione Municipio</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Numero de casa<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="numero_casa" name="numero_casa" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Direccion de casa<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="descripcion" name="descripcion" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-primary text-center">Contácto</h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="email" name="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Correo Institucional <span class="text-danger">*</span></label>
                                                        <input class="form-control" id="email_institucional" name="email_institucional" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Telefono Principal<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="telefono_1" name="telefono_1" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Telefono Secundario</label>
                                                        <input class="form-control" id="telefono_2" name="telefono_2" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-14">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-primary text-center">Gerencial</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Departamento</label>
                                                    <select class="select" id="selectDeptos_Modal" name="selectDeptos_Modal" onchange="selectValor_Deptosmodal()"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Area</label>
                                                    <select class="select" id="select_area_Moral" name="select_area_Moral" onchange="selectValor_Areamodal()"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cargo</label>
                                                    <select class="select" id="cargo_id" name="cargo_id"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Fecha de Ingreso</label>
                                                    <input class="form-control" id="fecha_ingreso" name="fecha_ingreso" type="date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Estatus</label>
                                                    
                                                    <select class="select" id="estatus_id" name="estatus_id">
                                                        <option selected="selected"  value="">Seleccione Estado</option>
                                                        <option value="1">ACTIVO</option>
                                                        <option value="2">INACTIVO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Sueldo<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="sueldo" name="sueldo" type="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Descripción Laboral<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="descripcion_laboral" name="descripcion_laboral" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <strong><b><h2>Referencia Personal</h2></b></strong>
                            <hr>
                            <div class="col-sm-14">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-secondary text-center">Datos de referencia</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Nombre Completo<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="nombre" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Identidad<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="identidad" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Telefono<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="telefono" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="email" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Parentezco<span class="text-danger">*</span></label>
                                                    <select name="parentezco" id="parentezco">
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
                                                    <textarea class="form-control" id="direccion" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Import</th>
                                        <th class="text-center">Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Holidays</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leaves</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clients</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Projects</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tasks</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chats</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Assets</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Timing Sheets</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --> 
                        <div class="submit-section">
                            <button class="btn btn-success" type="submit" id="btnGuardarEmpleado" onclick="validacion()">Agregar al Sistema</button>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Crear Empleado Modal -->

    <!-- Editar Empleado Modal -->
    <div id="edit_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" value="John" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Last Name</label>
                                    <input class="form-control" value="Doe" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                    <input class="form-control" value="johndoe" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" value="johndoe@example.com" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" value="johndoe" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>
                                    <input class="form-control" value="johndoe" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" value="FT-0001" readonly class="form-control floating">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Phone </label>
                                    <input class="form-control" value="9876543210" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Company</label>
                                    <select class="select">
                                        <option>Global Technologies</option>
                                        <option>Delta Infotech</option>
                                        <option selected>International Software Inc</option>
                                    </select>
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
                        </div>
                        <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Import</th>
                                        <th class="text-center">Export</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Holidays</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leaves</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Clients</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Projects</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tasks</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chats</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Assets</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Timing Sheets</td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input checked="" type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Editar Empleado Modal -->

    <!-- Eliminar Empleado Modal -->
    <div class="modal custom-modal fade" id="delete_employee" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Employee</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Eliminar Empleado Modal -->

    <script>
        /* ------------Departamentos y municipios------------------- */
        function cargoDeptos_pais(data){
            var html_select_deptos_pais ='<option selected="selected">Seleccione Depto.</option>';
            for (var i=0; i<data.length; ++i){
                html_select_deptos_pais += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#select_deptos_pais').html(html_select_deptos_pais)
        }
        (status)();

        function status(){
            $.ajax({
                type:"GET",
                url: "/empleado/deptos_pais",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    cargoDeptos_pais(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function selectValor(){
            var idDepto = document.getElementById("select_deptos_pais").value;
            cargoMunicipio(idDepto);
        }

        function cargoMunicipio(idDepto){
            $.ajax({
                type:"GET",
                url: "/empleado/municipio/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    renderMunicipio(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderMunicipio(data){
            var html_select_municipio ='<option selected="selected">Seleccione Municipio</option>';
            for (var i=0; i<data.length; ++i){
                html_select_municipio += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#municipio_id').html(html_select_municipio)
        }
        /* ---------------------------------------------------------------------- */

        /* ------------------------Guardar Empleados------------------------------- */

        function guardarEmpleado(){
             event.preventDefault();
            var data = new FormData($('#formEmpleado').get(0));
            $.ajax({
                type:"POST",
                url: "/empleado/store",
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
                    text: 'Guardado con éxito!',
                    timer: 1500
                    });
            $('#formEmpleado').trigger("reset");
        }

        function validacion(){
            /* var primer_nombre = document.getElementById('primer_nombre');
            var segundo_nombre = document.getElementById('segundo_nombre');
            var primer_apellido = document.getElementById('primer_apellido');
            var segundo_apellido = document.getElementById('segundo_apellido');
            var fecha_nacimiento = document.getElementById('fecha_nacimiento');
            var identidad = document.getElementById('identidad');
            var rtn = document.getElementById('rtn');
            var lugar_nacimiento = document.getElementById('lugar_nacimiento');
            var grado_academico_id = document.getElementById('grado_academico_id');
            var estado_civil = document.getElementById('estado_civil');
            var select_deptos_pais = document.getElementById('select_deptos_pais');
            var municipio_id = document.getElementById('municipio_id');
            var email = document.getElementById('email');
            var numero_casa = document.getElementById('numero_casa');
            var email_institucional = document.getElementById('email_institucional');
            var telefono_1 = document.getElementById('telefono_1');
            var telefono_2 = document.getElementById('telefono_2');
            var selectDeptos_Modal = document.getElementById('selectDeptos_Modal');
            var select_area_Moral = document.getElementById('select_area_Moral');
            var cargo_id = document.getElementById('cargo_id');
            var fecha_ingreso = document.getElementById('fecha_ingreso');
            var estatus_id = document.getElementById('estatus_id');
            var sueldo = document.getElementById('sueldo');
            var descripcion_laboral = document.getElementById('descripcion_laboral'); */
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
            }else if(rtn.length == 0){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar RTN',
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
            }else if(grado_academico_id == ""){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Grado academico',
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
            }else if(select_deptos_pais == ""){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar departamento de pais',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(municipio_id == ""){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Municipio',
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
            }else if(selectDeptos_Modal == ""){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Depto. de Trabajo',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(select_area_Moral == ""){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Area de Trabajo',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(cargo_id.length == ""){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Cargo',
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
            }else if(descripcion_laboral.length == 0){
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una descripcion de experiencia laboral',
                    timer: 1000
                    })
                    event.preventDefault();
            }else{
                (guardarEmpleado)(); 
            }

        }

        /* ------------------------------------------------------------------------- */

        /* --------------------------Departamentos Gerenciales---------------------------- */
        (cargaDeptos)();

        function renderDeptosModal(data){
            var html_select_deptosModal ='<option selected="selected" value="">Seleccione Departamento</option>';
            for (var i=0; i<data.length; ++i){
                html_select_deptosModal += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#selectDeptos_Modal').html(html_select_deptosModal)
        }

        function cargaDeptos(){
            $.ajax({
                type:"GET",
                url: "/empleado/deptos",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    renderDeptosModal(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
        function selectValor_Deptosmodal(){
            var idDepto = document.getElementById("selectDeptos_Modal").value;
            cargoAreas(idDepto);
        }

        function cargoAreas(idDepto){
            $.ajax({
                type:"GET",
                url: "/empleado/area/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    renderAreas(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderAreas(data){
            var html_select_Areas ='<option selected="selected" value="">Seleccione Area de depto.</option>';
            for (var i=0; i<data.length; ++i){
                html_select_Areas += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#select_area_Moral').html(html_select_Areas)
        }

        function selectValor_Areamodal(){
            var idArea = document.getElementById("select_area_Moral").value;
            cargoCargos(idArea);
        }

        function cargoCargos(idArea){
            $.ajax({
                type:"GET",
                url: "/empleado/cargo/"+idArea,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    renderCargos(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderCargos(data){
            var html_select_cargos ='<option selected="selected" value="">Seleccione Area de depto.</option>';
            for (var i=0; i<data.length; ++i){
                html_select_cargos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#cargo_id').html(html_select_cargos)
        }



        /* --------------------------/Departamentos Gerenciales---------------------------- */
    </script>
</div>

