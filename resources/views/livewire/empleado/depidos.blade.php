<div class="page-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

    <!-- Page Content -->
    <div class="content container-fluid">


        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title"> </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Colaborador</li>
                        <li class="breadcrumb-item active">Despidos</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#modal_hacer_despido" ><i class="fa fa-plus"></i>Despedir colaborador</a>
                </div>
            </div>
        </div>
        <label for="">Registros de despidos realizados</label>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table animate__animated animate__bounceInUp" id="tbldespidos">
                        <thead class="table-dark">
                            <tr>
                                <th> <b>COLABORADOR</b> </th>
                                <th> <b>ID EMPLEADO</b> </th>
                                <th> <b>ID CONTRATO</b>  </th>
                                <th> <b>FECHA DEL DESPIDO</b>  </th>
                                <th> <b>MOTIVO</b>  </th>
                                <th> <b>FECHA DEL REGISTRO</b>  </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="modal_hacer_despido" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">Ficha de despido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_despido" data-parsley-validate>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row" id="row_datos">
                                <div class="col-12">
                                    <label class="col-form-label focus-label">Buscar Colaborador <span class="text-danger">*</span></label>
                                    <select class="js-data-example-ajax form-control" required style="width: 742px; height:40px;" name="empleado_id" id="empleado_id">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Identidad</label>
                                    <input disabled class="form-control" type="text" id="identidad_empleado" name="identidad_empleado" >
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Código de Contrato</label>
                                    <input disabled class="form-control" type="text" id="codigo_contrato_empleado" name="codigo_contrato_empleado" >
                                    <input type="hidden" id="id_contrato" name="id_contrato" >
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label focus-label">Puesto Asignado</label>
                                    <input disabled class="form-control" type="text" id="puesto_empleado" name="puesto_empleado" >
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label focus-label">Fecha de activación de despido</label>
                                    <input  class="form-control" required type="date" id="fecha_despido" name="fecha_despido" >
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label focus-label">Motivo del despido</label>
                                    <textarea required class="form-group form-control" name="motivo_despido" id="motivo_despido" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="text-center submit-section" >
                                <button  class="btn btn-success submit-btn ">Continuar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
@section('script')
    <script>
        $('#form_despido').submit(function(e){
            e.preventDefault();
            guardar_despido();
        });
        (seleccionarEmpleado)();
        function seleccionarEmpleado(){
            $('#empleado_id').select2({
                ajax: {
                    type: 'GET',
                    url:'/empleado_activo',
                    processResults: function (data) {
                        $("#empleado_id").on("select2:select", function (e) {
                            var id_select = $(e.currentTarget).val();
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].id == id_select){
                                    $('#identidad_empleado').val(data[i].identidad);
                                    $('#codigo_contrato_empleado').val(data[i].num_contrato);
                                    $('#id_contrato').val(data[i].id_contrato);
                                    $('#puesto_empleado').val(data[i].nombre);
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

        function guardar_despido(){
            console.log("entra aqui");
            var data = new FormData($('#form_despido').get(0));
            Swal.fire({
                text: 'Al confirmar, el empleado quedará desactivado del sistema, se le pagarán los días trabajados según corresponda, de acuerdo a fecha de despido.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Confirmar`,
                denyButtonText: `Declinar`,
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"POST",
                        url: "/despidos/agregar",
                        data: data,
                        contentType: false,
                        cache: false,
                        processData:false,
                        dataType:"json",
                        success: function(data){
                            $('#form_despido').trigger("reset");
                            $('#modal_hacer_despido').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                text: 'Despido con éxito!',
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
                } else if (result.isDenied) {
                    Swal.fire('Despido NO realizado', '', 'info')
                }
            })

        }
        (tabla_llenado_dataTable)();
        function tabla_llenado_dataTable(){
            $('#tbldespidos').DataTable({
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
                "ajax": "/despidos/listado",
                "columns": [
                    {data:'colaborador'},
                    {data:'id_emp'},
                    {data:'id_contrato'},
                    {data:'fecha_despido'},
                    {data:'motivo'},
                    {data:'fecha_registro'}
            ]});
        }
    </script>
@endsection
