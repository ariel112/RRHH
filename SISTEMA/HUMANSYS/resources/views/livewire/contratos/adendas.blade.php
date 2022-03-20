<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Adenda</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Aumentos de sueldos o cambios de puestos || ADENDA</li>

                    </ul>
                    <br>
                    <div class="col-auto float-right ml-auto">
                        <a class="btn btn-secondary" style="color:#ffffff;" data-toggle="modal" data-target="#Modal_aumento_salarial_PUESTO" ><i class="fa fa-plus"></i>Cambio de puesto y Salario</a>
                        <a class="btn btn-info" style="color:#ffffff;" data-toggle="modal" data-target="#Modal_cambio_puesto" ><i class="fa fa-plus"></i>Cambio sólo puesto</a>
                        <a class="btn btn-warning" style="color:#000000;" data-toggle="modal" data-target="#Modal_aumento_salarial" ><i class="fa fa-plus"></i>Aumento sólo salarial</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table class="table animate__animated animate__bounceInUp" id="tbl_adendas_realizadas">
                        <thead class="table-dark">
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Identidad</th>
                                <th>Código de contrato</th>
                                <th>Sueldo anterior</th>
                                <th>Cargo anterior</th>
                                <th>Sueldo actualizado</th>
                                <th>Cargo actualizado</th>
                                {{-- <th>Empleado-Aprobación</th>
                                <th>Gerente Talento Humano</th> --}}
                                <th>Fecha de vigencia</th>
                                <th>Descripción</th>
                                <th>Fecha del registro</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

         <!-- CAMBIO DE SALARIO Y PUESTO Modal -->
         <div id="Modal_aumento_salarial_PUESTO" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">AUMENTO SALARIAL Y CAMBIO DE PUESTO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_aumento_salario_PUESTO" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Buscar Colaborador <span class="text-danger">*</span></label>
                                        <select class="js-data-example-ajax form-control" required style="width: 742px; height:40px;" name="empleado_id_puesto_salario" id="empleado_id_puesto_salario">
                                </div>
                                <div class="col-18">
                                    <label class="col-form-label focus-label">Identidad{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class=" form-control" {{-- style="width: 350px; height:40px;" --}} type="text" id="identidad_empleado_puesto_salario" name="identidad_empleado_puesto_salario">
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label focus-label">Código de contraro{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="text" id="codigo_contrato_puesto_salario" name="codigo_contrato_puesto_salario">
                                    <input  type="hidden" id="cargo_anterior_sp" name="cargo_anterior_sp">
                                    <input  type="hidden" id="id_contrato_sp" name="id_contrato_sp">
                                </div>
                                <div class="col-md-8">
                                    <label class="col-form-label focus-label">Puesto actual{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="text" id="cargo_actual_salario_puesto" name="cargo_actual_salario_puesto">
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Seleccionar Gerencia<span class="text-danger">*</span></label>
                                        <select class="custom-select form-control" required id="selectDeptos_Modal_salario_puesto" name="selectDeptos_Modal_salario_puesto" onchange="selectValor_Deptosmodal_ps()"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Seleccionar Area<span class="text-danger">*</span></label>
                                        <select class="custom-select form-control" required id="select_area_Moral_salario_puesto" name="select_area_Moral_salario_puesto" onchange="selectValor_Areamodal_ps()"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Seleccionar Nuevo Puesto<span class="text-danger">*</span></label>
                                        <select class="custom-select form-control" required id="cargo_id_salario_puesto" name="cargo_id_salario_puesto"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Sueldo Mensual Actual{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="text" id="sueldo_contrato_sp" name="sueldo_contrato_sp">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Nuevo Sueldo Mensual<span class="text-danger">*</span></label>
                                    <input  class="form-control" required type="number" min="0" id="sueldo_nuevo_salario_sp" name="sueldo_nuevo_salario_sp" >
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label focus-label">Fecha en que entra en vigencia el cambio<span class="text-danger">*</span></label>
                                    <input  class="form-control" required type="date" id="fecha_inicio_vigencia_salario_sp" name="fecha_inicio_vigencia_salario_sp">
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Descripción<span class="text-danger">*</span></label>
                                    <textarea name="descripcion_salario_puesto" required id="descripcion_salario_puesto" cols="30" rows="5" class="form-group form-control"></textarea>
                                </div>
                            </div>
                            <div class="text-center" >
                                <button id="crear_reembolso" class="btn btn-primary submit-btn btn-block">Agregar reembolso</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /CAMBIO DE SALARIO Y PUESTO Modal  -->


        <!-- CAMBIO DE PUESTOModal -->
        <div id="Modal_cambio_puesto" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">CAMBIO DE PUESTO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_cambio_puesto" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Buscar Colaborador <span class="text-danger">*</span></label>
                                        <select class="js-data-example-ajax form-control" required style="width: 742px; height:40px;" name="empleado_id_puesto" id="empleado_id_puesto">
                                </div>
                                <div class="col-18">
                                    <label class="col-form-label focus-label">Identidad{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class=" form-control" {{-- style="width: 350px; height:40px;" --}} type="text" id="identidad_empleado_puesto" name="identidad_empleado_puesto">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Código de contraro{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="text" id="codigo_contrato_puesto" name="codigo_contrato_puesto">
                                    <input  type="hidden" id="cargo_anterior_puesto" name="cargo_anterior_puesto">
                                    <input  type="hidden" id="id_contrato_puesto" name="id_contrato_puesto">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Sueldo Mensual Actual{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="number" id="sueldo_contrato_puesto" name="sueldo_contrato_puesto">
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label focus-label">Puesto actual{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="text" id="cargo_actual" name="cargo_actual">
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Seleccionar Departamento<span class="text-danger">*</span></label>
                                        <select class="custom-select form-control" required id="selectDeptos_Modal" name="selectDeptos_Modal" onchange="selectValor_Deptosmodal()"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Seleccionar Area<span class="text-danger">*</span></label>
                                        <select class="custom-select form-control" required id="select_area_Moral" name="select_area_Moral" onchange="selectValor_Areamodal()"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Seleccionar Nuevo Puesto<span class="text-danger">*</span></label>
                                        <select class="custom-select form-control" required id="cargo_id" name="cargo_id"></select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label focus-label">Fecha en que entra en vigencia el cambio de puesto<span class="text-danger">*</span></label>
                                    <input  class="form-control" required type="date" id="fecha_inicio_vigencia_puesto" name="fecha_inicio_vigencia_puesto">
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Descripción<span class="text-danger">*</span></label>
                                    <textarea name="descripcion_puesto" required id="descripcion_puesto" cols="30" rows="5" class="form-group form-control"></textarea>
                                </div>
                            </div>
                            <div class="text-center submit-section" >
                                <button id="crear_reembolso" class="btn btn-primary submit-btn btn-block">Generar aumento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /CAMBIO DE PUESTO Modal  -->

        <!-- CAMBIO DE SALARIO Modal -->
        <div id="Modal_aumento_salarial" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">AUMENTO SALARIAL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_aumento_salario" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Buscar Colaborador <span class="text-danger">*</span></label>
                                        <select class="js-data-example-ajax form-control" required style="width: 742px; height:40px;" name="empleado_id" id="empleado_id">
                                </div>
                                <div class="col-18">
                                    <label class="col-form-label focus-label">Identidad{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class=" form-control" {{-- style="width: 350px; height:40px;" --}} type="text" id="identidad_empleado" name="identidad_empleado">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Código de contraro{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="text" id="codigo_contrato" name="codigo_contrato">
                                    <input  type="hidden" id="cargo_anterior_salario" name="cargo_anterior_salario">
                                    <input  type="hidden" id="id_contrato_salario" name="id_contrato_salario">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Puesto actual</label>
                                    <input disabled class="form-control" type="text" id="cargo_actual_nombre" name="cargo_actual_nombre" >
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Sueldo Mensual Actual{{-- <span class="text-danger">*</span> --}}</label>
                                    <input disabled class="form-control"  type="number" id="sueldo_contrato" name="sueldo_contrato">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Nuevo Sueldo Mensual<span class="text-danger">*</span></label>
                                    <input  class="form-control" required type="number" min="0" id="sueldo_nuevo_salario" name="sueldo_nuevo_salario" >
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label focus-label">Fecha en que entra en vigencia el aumento<span class="text-danger">*</span></label>
                                    <input  class="form-control" required type="date" id="fecha_inicio_vigencia_salario" name="fecha_inicio_vigencia_salario">
                                </div>
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Descripción<span class="text-danger">*</span></label>
                                    <textarea name="descripcion_salario" required id="descripcion_salario" cols="30" rows="5" class="form-group form-control"></textarea>
                                </div>
                            </div>
                            <div class="text-center submit-section" >
                                <button id="crear_reembolso" class="btn btn-primary submit-btn btn-block">Generar aumento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /CAMBIO DE SALARIO Modal  -->


    </div>
</div>
@section('script')
    <script>
        $('#form_aumento_salario').submit(function(e){
            e.preventDefault();
            agregarAdendaS();
        });

        $('#form_cambio_puesto').submit(function(e){
            e.preventDefault();
            agregarAdendaP();
        });

        $('#form_aumento_salario_PUESTO').submit(function(e){
            e.preventDefault();
            agregarAdendaSP();
        });

        function agregarAdendaS(){
            var data = new FormData($('#form_aumento_salario').get(0));

            $.ajax({
                type:"POST",
                url: "/adenda/agregarSalario",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    $('#tbl_adendas_realizadas').DataTable().ajax.reload();
                    $('#form_aumento_salario').trigger("reset");
                    $('#Modal_aumento_salarial').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        text: 'Adenda por aumento de salario realizado con éxito!',
                        timer: 1500
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log( jqXHR.responseJSON.message);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: jqXHR.responseJSON.message
                    })
                }
            })
        }

        function agregarAdendaP(){
            var data = new FormData($('#form_cambio_puesto').get(0));

            $.ajax({
                type:"POST",
                url: "/adenda/agregarCambioPuesto",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    $('#tbl_adendas_realizadas').DataTable().ajax.reload();
                    $('#form_cambio_puesto').trigger("reset");
                    $('#Modal_cambio_puesto').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        text: 'Adenda por cambio de puesto realizado con éxito!',
                        timer: 1500
                    });
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log( jqXHR.responseJSON.message);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: jqXHR.responseJSON.message
                    })
                }
            })
        }

        function agregarAdendaSP(){
            var data = new FormData($('#form_aumento_salario_PUESTO').get(0));

            $.ajax({
                type:"POST",
                url: "/adenda/agregarCambioPuestoSalario",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    $('#tbl_adendas_realizadas').DataTable().ajax.reload();
                    $('#form_aumento_salario_PUESTO').trigger("reset");
                    $('#Modal_aumento_salarial_PUESTO').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        text: 'Adenda por cambio de puesto y salario realizado con éxito!',
                        timer: 1500
                    });
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log( jqXHR.responseJSON.message);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: jqXHR.responseJSON.message
                    })
                }
            });
        }

        (tabla_llenado_dataTable)();
        function tabla_llenado_dataTable(){
            $('#tbl_adendas_realizadas').DataTable({
                "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
                },
                "sProcessing":"Procesando...",},
                "serverSide": true,
                processing: true,
                "autoWidth": true,
                "ajax": "/adenda/listado",
                "columns": [
                    {data:'id'},
                    {data:'codigo_contrato'},
                    {data:'sueldo_anterior'},
                    {data:'cargo_anterior_id'},
                    {data:'sueldo_nuevo'},
                    {data:'cargo_nuevo_id'},
                    {data:'fecha_inicio_vigencia'},
                    {data:'descripcion'},
                    {data:'fecha_registro'}
            ]});
        }

        (seleccionarEmpleado)();
        function seleccionarEmpleado(){
            $('#empleado_id').select2({
                ajax: {
                    type: 'GET',
                    url:'/empleado_contrato_activo',
                    processResults: function (data) {
                        $("#empleado_id").on("select2:select", function (e) {
                            var id_select = $(e.currentTarget).val();
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].id == id_select){
                                    $('#identidad_empleado').val(data[i].identidad);
                                    $('#sueldo_contrato').val(data[i].sueldo);
                                    $('#codigo_contrato').val(data[i].num_contrato);
                                    $('#id_contrato_salario').val(data[i].id_contrato);
                                    $('#cargo_anterior_salario').val(data[i].cargo_id);
                                    $('#cargo_actual_nombre').val(data[i].nombre);
                                }
                            }
                            console.log(id_select);
                        });
                        $('#empleado_id').select2('data')
                        return {
                            results: data
                            };
                    }
                }
            });
        }

        (seleccionarEmpleado_puesto)();
        function seleccionarEmpleado_puesto(){
            $('#empleado_id_puesto').select2({
                ajax: {
                    type: 'GET',
                    url:'/empleado_contrato_activo',
                    processResults: function (data) {
                        $("#empleado_id_puesto").on("select2:select", function (e) {
                            var id_select = $(e.currentTarget).val();
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].id == id_select){
                                    $('#identidad_empleado_puesto').val(data[i].identidad);
                                    $('#codigo_contrato_puesto').val(data[i].num_contrato);
                                    $('#cargo_actual').val(data[i].nombre);
                                    $('#sueldo_contrato_puesto').val(data[i].sueldo);
                                    $('#id_contrato_puesto').val(data[i].id_contrato);
                                    $('#cargo_anterior_puesto').val(data[i].cargo_id);
                                    (cargaDeptos)();
                                }
                            }
                            console.log(id_select);
                        });
                        $('#empleado_id_puesto').select2('data')
                        return {
                            results: data
                            };
                    }
                }
            });
        }

        (seleccionarEmpleado_puesto_salario)();
        function seleccionarEmpleado_puesto_salario(){
            $('#empleado_id_puesto_salario').select2({
                ajax: {
                    type: 'GET',
                    url:'/empleado_contrato_activo',
                    processResults: function (data) {
                        $("#empleado_id_puesto_salario").on("select2:select", function (e) {
                            var id_select = $(e.currentTarget).val();
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].id == id_select){
                                    $('#identidad_empleado_puesto_salario').val(data[i].identidad);
                                    $('#codigo_contrato_puesto_salario').val(data[i].num_contrato);
                                    $('#cargo_actual_salario_puesto').val(data[i].nombre);
                                    $('#sueldo_contrato_sp').val(data[i].sueldo);
                                    $('#cargo_anterior_sp').val(data[i].cargo_id);
                                    $('#id_contrato_sp').val(data[i].id_contrato);

                                    (cargaDeptos_ps)();
                                }
                            }
                            console.log(id_select);
                        });
                        $('#empleado_id_puesto_salario').select2('data')
                        return {
                            results: data
                            };
                    }
                }
            });
        }

        /* --------------------------Departamentos Gerenciales SOLO PUESTO---------------------------- */

            function cargaDeptos(){
                $.ajax({
                    type:"GET",
                    url: "/empleado/deptos",
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        var html_select_deptosModal ='<option selected="selected" value="">Seleccione Departamento</option>';
                        for (var i=0; i<data.length; ++i){
                            html_select_deptosModal += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                            }
                        $('#selectDeptos_Modal').html(html_select_deptosModal);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            }

            function selectValor_Deptosmodal(){
                var idDepto = document.getElementById("selectDeptos_Modal").value;
                /* cargoAreas(idDepto); */
                $.ajax({
                    type:"GET",
                    url: "/empleado/area/"+idDepto,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        var html_select_Areas ='<option selected="selected" value="">Seleccione Area de depto.</option>';
                        for (var i=0; i<data.length; ++i){
                            html_select_Areas += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                            }
                        $('#select_area_Moral').html(html_select_Areas);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            }

            function selectValor_Areamodal(){
                var idArea = document.getElementById("select_area_Moral").value;
                /* cargoCargos(idArea); */
                $.ajax({
                    type:"GET",
                    url: "/empleado/cargo/"+idArea,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        var html_select_cargos ='<option selected="selected" value="">Seleccione Puesto.</option>';
                        for (var i=0; i<data.length; ++i){
                            html_select_cargos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                            }
                        $('#cargo_id').html(html_select_cargos);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            }

        /* --------------------------/Departamentos Gerenciales SOLO PUESTO---------------------------- */

        /* --------------------------Departamentos Gerenciales puesto y salario---------------------------- */

            function cargaDeptos_ps(){
                $.ajax({
                    type:"GET",
                    url: "/empleado/deptos",
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        var html_select_deptosModal ='<option selected="selected" value="">Seleccione Departamento</option>';
                        for (var i=0; i<data.length; ++i){
                            html_select_deptosModal += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                            }
                        $('#selectDeptos_Modal_salario_puesto').html(html_select_deptosModal);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            }

            function selectValor_Deptosmodal_ps(){
                var idDepto = document.getElementById("selectDeptos_Modal_salario_puesto").value;
                /* cargoAreas(idDepto); */
                $.ajax({
                    type:"GET",
                    url: "/empleado/area/"+idDepto,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        var html_select_Areas ='<option selected="selected" value="">Seleccione Area de depto.</option>';
                        for (var i=0; i<data.length; ++i){
                            html_select_Areas += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                            }
                        $('#select_area_Moral_salario_puesto').html(html_select_Areas);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            }

            function selectValor_Areamodal_ps(){
                var idArea = document.getElementById("select_area_Moral_salario_puesto").value;
                /* cargoCargos(idArea); */
                $.ajax({
                    type:"GET",
                    url: "/empleado/cargo/"+idArea,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        var html_select_cargos ='<option selected="selected" value="">Seleccione Puesto.</option>';
                        for (var i=0; i<data.length; ++i){
                            html_select_cargos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                            }
                        $('#cargo_id_salario_puesto').html(html_select_cargos);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            }

        /* --------------------------/Departamentos Gerenciales puesto y salari---------------------------- */


    </script>
@endsection
