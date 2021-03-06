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
        {{-- <div class="row">
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
        </div> --}}
        <!-- /Leave Statistics -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="empleadoListado" class="table animate__animated animate__bounceInUp">
                        <thead class="table-dark">
                            <tr>
                                    <th class="font-weight-bold">Tipo de permiso</th>
                                    <th class="font-weight-bold">Fecha de inicio</th>
                                    <th class="font-weight-bold">Fecha final</th>
                                    <th class="font-weight-bold">Motivo</th>
                                    <th class="font-weight-bold">Aprobacion de jefe inmediato</th>
                                    <th class="font-weight-bold">Encargado de Departamento</th>
                                    <th class="font-weight-bold">Aprobacion de Talento Humano</th>
                                    <th class="font-weight-bold">Encargado de Talento Humano</th>
                                    <th class="font-weight-bold">Acciones</th>
                                <!-- <th class="font-weight-bold">Acciones</th> -->
                                <!-- <th>Aprobado por</th> -->
                                <!-- <th class="text-right">Acciones</th> -->
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
                                <input id="fechaInicio" class="form-control datetimepicker" type="text" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fecha final <span class="text-danger">*</span></label>
                            <div class="cal-icon"  >
                                <input id="fechaFinal" class="form-control datetimepicker"   type="text" required >
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
                            <label>Numero de d??as <span class="text-danger">*</span></label>
                            <input id="numDias" class="form-control" readonly type="text">
                        </div> -->
                        <!-- <div class="form-group">
                            <label>Remaining Leaves <span class="text-danger">*</span></label>
                            <input class="form-control" readonly value="12" type="text">
                        </div> -->
                        <div class="form-group">
                            <label>Motivo<span class="text-danger">*</span></label>
                            <textarea id="motivoPermiso" rows="4" maxlength="150"  class="form-control"></textarea>
                            <div id="contador">0/150</div>
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
                            <select id="selectEdit" class="select" onclick="opciones()">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de inicio<span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input id="fechaInicioEdit" class="form-control datetimepicker" type="text" required onclick="botonVerificar()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Fecha final <span class="text-danger">*</span></label>
                            <div class="cal-icon"  >
                                <input id="fechaFinalEdit" class="form-control datetimepicker"   type="text" required onclick="botonVerificar()">
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
                            <textarea id="motivoEdit" rows="4" class="form-control" maxlength="150"></textarea>
                            <div id="contadorEdit">0/150</div>
                        </div>

                        <div class="submit-section" id="verificarEdit">
                            <button class="btn btn-success submit-btn" type="button" onclick="verificarDataEdit()" >Verificar</button>
                        </div>

                        <div class="submit-section d-none" id="enviarEdit">
                            <button  class="btn btn-primary submit-btn" type="button" onclick="enviarPermisoEdit()" >Enviar</button>
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
<script>
    (cuentaCaracter)();
    (cuentaCaracterEdit)();
    function cuentaCaracter(){
        const mensaje = document.getElementById('motivoPermiso');
        const contador = document.getElementById('contador');

        mensaje.addEventListener('input', function(e) {
            const target = e.target;
            const longitudMax = target.getAttribute('maxlength');
            const longitudAct = target.value.length;
            contador.innerHTML = `${longitudAct}/${longitudMax}`;
        });
    }

    function cuentaCaracterEdit(){
        const mensaje = document.getElementById('motivoEdit');
        const contador = document.getElementById('contadorEdit');

        mensaje.addEventListener('input', function(e) {
            const target = e.target;
            const longitudMax = target.getAttribute('maxlength');
            const longitudAct = target.value.length;
            contador.innerHTML = `${longitudAct}/${longitudMax}`;
        });
    }


</script>
<script src="{{ asset('assets/js/permisos/permisos.js') }}"></script>
@endsection
