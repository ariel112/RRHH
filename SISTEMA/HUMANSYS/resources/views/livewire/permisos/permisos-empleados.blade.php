<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leaves</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leaves</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i>Solicitar Permiso</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Leave Statistics -->
        <div class="row">
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Vacaciones Anuales</h6>
                    <h4>12</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Permisos Medicos</h6>
                    <h4>3</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Otros Permisos</h6>
                    <h4>4</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-info">
                    <h6>Vacaciones Restantes</h6>
                    <h4>5</h4>
                </div>
            </div>
        </div>
        <!-- /Leave Statistics -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="empleadoListado" class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>Tipo de permiso</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha final</th>
                                <th>Numero de dias</th>
                                <th>Motivo</th>
                                
                                <!-- <th>Aprobado por</th> -->
                                <!-- <th class="text-right">Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>Casual Leave</td>
                                <td>8 Mar 2019</td>
                                <td>9 Mar 2019</td>
                                <td>2 days</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-purple"></i> New
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Medical Leave</td>
                                <td>27 Feb 2019</td>
                                <td>27 Feb 2019</td>
                                <td>1 day</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-success"></i> Approved
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>LOP</td>
                                <td>24 Feb 2019</td>
                                <td>25 Feb 2019</td>
                                <td>2 days</td>
                                <td>Personnal</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-success"></i> Approved
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Paternity Leave</td>
                                <td>13 Feb 2019</td>
                                <td>17 Feb 2019</td>
                                <td>5 days</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-danger"></i> Declined
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Casual Leave</td>
                                <td>30 Jan 2019</td>
                                <td>30 Jan 2019</td>
                                <td>Second Half</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-purple"></i> New
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Hospitalisation</td>
                                <td>15 Jan 2019</td>
                                <td>25 Jan 2019</td>
                                <td>10 days</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-success"></i> Approved
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Casual Leave</td>
                                <td>13 Jan 2019</td>
                                <td>14 Jan 2019</td>
                                <td>2 days</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-success"></i> Approved
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Casual Leave</td>
                                <td>10 Jan 2019</td>
                                <td>10 Jan 2019</td>
                                <td>First Half</td>
                                <td>Going to Hospital</td>
                                <td class="text-center">
                                    <div class="action-label">
                                        <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                            <i class="fa fa-dot-circle-o text-danger"></i> Declined
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-xs"><img src="assets/img/profiles/avatar-09.jpg" alt=""></a>
                                        <a href="#">Richard Miles</a>
                                    </h2>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Leave Modal -->
    <div id="add_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Solicitar Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPermiso">
                        <div class="form-group">
                            <label>Tipo de permiso <span class="text-danger">*</span></label>
                            <select id="permisosEmpleado" class="select">
                                <!-- <option>Select Leave Type</option>
                                <option>Casual Leave 12 Days</option>
                                <option>Medical Leave</option>
                                <option>Loss of Pay</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de inicio<span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input id="fechaInicio" class="form-control datetimepicker" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fecha final <span class="text-danger">*</span></label>
                            <div class="cal-icon"  >
                                <input id="fechaFinal" class="form-control datetimepicker"   type="text" required>
                            </div>
                        </div>

                        <div id="horasPermisos" class="d-none">
                            <div class="form-group">
                                <label>Hora de inicio <span class="text-danger">*</span></label>
                                <input id="horaInicio" type="time" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Hora de final <span class="text-danger">*</span></label>
                                <input id="horaFinal" type="time" class="form-control" required>
                            </div>

                        </div>

                        <!-- <div class="form-group">
                            <label>Numero de días <span class="text-danger">*</span></label>
                            <input id="numDias" class="form-control" readonly type="text">
                        </div> -->
                        <!-- <div class="form-group">
                            <label>Remaining Leaves <span class="text-danger">*</span></label>
                            <input class="form-control" readonly value="12" type="text">
                        </div> -->
                        <div class="form-group">
                            <label>Motivo<span class="text-danger">*</span></label>
                            <textarea id="motivoPermiso" rows="4" class="form-control"></textarea>
                        </div>

                        <div class="submit-section" id="verificar">
                            <button class="btn btn-success submit-btn" type="button" onclick="verificarData()" >Verificar</button>
                        </div>

                        <div class="submit-section d-none" id="enviar">
                            <button class="btn btn-primary submit-btn" type="button" onclick="enviarPermiso()" >Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Leave Modal -->

    <!-- Edit Leave Modal -->
    <div id="edit_leave" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Leave</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Leave Type <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select Leave Type</option>
                                <option>Casual Leave 12 Days</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" value="01-01-2019" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" value="01-01-2019" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Number of days <span class="text-danger">*</span></label>
                            <input class="form-control" readonly type="text" value="2">
                        </div>
                        <div class="form-group">
                            <label>Remaining Leaves <span class="text-danger">*</span></label>
                            <input class="form-control" readonly value="12" type="text">
                        </div>
                        <div class="form-group">
                            <label>Leave Reason <span class="text-danger">*</span></label>
                            <textarea rows="4" class="form-control">Going to hospital</textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Leave Modal -->

    <!-- Delete Leave Modal -->
    <div class="modal custom-modal fade" id="delete_approve" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Leave</h3>
                        <p>Are you sure want to Cancel this leave?</p>
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
    <!-- /Delete Leave Modal -->

</div>

@section("script")
<script src="{{ asset('assets/js/permisos/permisos.js') }}"></script>
@endsection