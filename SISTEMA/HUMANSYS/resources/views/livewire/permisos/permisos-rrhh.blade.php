<!--Permiso del feje inmediato -->
<div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Permisos</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Permisos</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Añadir Permiso</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Leave Statistics -->
                {{-- <div class="row">
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Total de permisos presentados</h6>
                            <h4 id="totalRRHH"></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Permisos denegados</h6>
                            <h4 id="denegadosRRHH"></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Permisos aprobados</h6>
                            <h4 id="aprobadosRRHH"></h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-info">
                            <h6>Solicitudes Pendientes</h6>
                            <h4 id="pendientesRRHH"></h4>
                        </div>
                    </div>
                </div> --}}
                <!-- /Leave Statistics -->


                <!-- /Search Filter -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tablePermisosRRHH" class="table animate__animated animate__bounceInUp">
                                <thead class="table-dark">
                                    <tr>
                                    <th class="font-weight-bold">Empleado</th>
                                    <th class="font-weight-bold">Tipo de permiso</th>
                                    <th class="font-weight-bold">Fecha de inicio</th>
                                    <th class="font-weight-bold">Fecha de finalización</th>
                                    <th class="font-weight-bold">Motivo</th>
                                    <th class="font-weight-bold">Aprobación de jefe inmediato  </th>
                                    <th class="font-weight-bold">Encargado de Departamento</th>
                                    <th class="font-weight-bold">Aprobación de Talento Humano</th>
                                    <th class="font-weight-bold">Encargado de Talento Humano</th>
                                    <th class="font-weight-bold">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

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
                                <select id="permisosRRHH" class="select">

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
                        <h5 class="modal-title">Editar Permiso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="permisoEdit">
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select id="selectEditRRHH1" class="select" onclick="opciones2()">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de inicio<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input id="fechaInicioEdit" class="form-control datetimepicker" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fecha final <span class="text-danger">*</span></label>
                                <div class="cal-icon"  >
                                    <input id="fechaFinalEdit" class="form-control datetimepicker"   type="text" required>
                                </div>
                            </div>

                            <div id="horasPermisosEdit" class="d-none">
                                <div class="form-group">
                                    <label>Hora de inicio <span class="text-danger">*</span></label>
                                    <input id="horaInicioEdit" type="time" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Hora de final <span class="text-danger">*</span></label>
                                    <input id="horaFinalEdit" type="time" class="form-control" required>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Motivo<span class="text-danger">*</span></label>
                                <textarea id="motivoEdit" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="submit-section" id="verificarEdit">
                                <button class="btn btn-success submit-btn" type="button" onclick="verificarDataEdit()" >Verificar</button>
                            </div>

                            <div class="submit-section d-none" id="enviarEdit">
                                <button class="btn btn-primary submit-btn" type="button" onclick="enviarPermisoEdit()" >Enviar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
            <!-- /Edit Leave Modal -->

            <!-- Approve Leave Modal -->
            <div class="modal custom-modal fade" id="approve_leave" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Aprobación de permiso</h3>
                                <p>¿Está seguro de aprobar este permiso?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="#" onclick="aprobarPermiso()" class="btn btn-primary continue-btn">Aprobar</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-secondary cancel-btn">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Approve Leave Modal -->

            <!-- Delete Leave Modal -->
            <div class="modal custom-modal fade" id="delete_approve" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Denegar permiso</h3>
                                <p>¿Está seguro de denegar este permiso?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn" onclick="denegarPermiso()">Denegar</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Leave Modal -->

            <!-- Edit permisos Modal -->
                <div id="edit_leave" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Permiso</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="permisoEdit">
                                    <div class="form-group">
                                        <label>Leave Type <span class="text-danger">*</span></label>
                                        <select id="selectEditRRHH2" class="select" onclick="opciones()">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha de inicio<span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input id="fechaInicioEdit" class="form-control datetimepicker" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha final <span class="text-danger">*</span></label>
                                        <div class="cal-icon"  >
                                            <input id="fechaFinalEdit" class="form-control datetimepicker"   type="text" required>
                                        </div>
                                    </div>

                                    <div id="horasPermisosEdit" class="d-none">
                                        <div class="form-group">
                                            <label>Hora de inicio <span class="text-danger">*</span></label>
                                            <input id="horaInicioEdit" type="time" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Hora de final <span class="text-danger">*</span></label>
                                            <input id="horaFinalEdit" type="time" class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label>Motivo<span class="text-danger">*</span></label>
                                        <textarea id="motivoEdit" rows="4" class="form-control"></textarea>
                                    </div>

                                    <div class="submit-section" id="verificarEdit">
                                        <button class="btn btn-success submit-btn" type="button" onclick="verificarDataEdit()" >Verificar</button>
                                    </div>

                                    <div class="submit-section d-none" id="enviarEdit">
                                        <button class="btn btn-primary submit-btn" type="button" onclick="enviarPermisoEdit()" >Enviar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /Edit permisos Modal -->
        </div>
        <!-- /Page Wrapper -->

    @section("script")
    <script src="{{ asset('assets/js/permisos/permisosRRHH.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/permisos/permisos.js') }}"></script> --}}
    @endsection
