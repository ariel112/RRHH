<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Reembolsos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reembolso</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <h5 >Selección de planilla a realizar reembolso</h5>
        <br>


        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

        <table class="table animate__animated animate__bounceInUp" id="tbl_Planillareembolsos">
            <thead class="table-dark">
                <tr>
                    {{-- <th>#</th> --}}
                    <th>id</th>
                    <th>Código</th>
                    <th>Número-memo</th>
                    <th>Encargado</th>
                    <th>Identidad</th>
                    <th>Inicio</th>
                    <th>Finalización</th>
                    <th>Código de empleado</th>
                    <th>Total pagado</th>
                    <th>Se generó</th>
                    {{-- <th>Estatus</th> --}}
                    <th class="text-right">Acción</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
                </div>
            </div>
        </div>

        <!-- Add notas Modal -->
        <div id="reembolso_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">REEMBOLSO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_reembolso" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-6">
                                    {{-- <div class="form-group" wire:ignore wire:key="first"> --}}
                                        <label class="col-form-label focus-label">Seleccione Colaborador <span class="text-danger">*</span></label>
                                        <select class="js-data-example-ajax form-control" required style="width: 350px; height:40px;" name="empleado_id" id="empleado_id">
                                    {{-- </div> --}}
                                </div>
                                <div class="col-4">
                                    <input type="hidden"  >

                                    <label class="col-form-label focus-label">Nombre de reembolso<span class="text-danger">*</span></label>
                                    <input class="form-group form-control" required type="text" id="nombre_reembolso" name="nombre_reembolso">
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label focus-label">Monto de reembolso<span class="text-danger">*</span></label>
                                    <input class="form-group form-control" required type="number" id="monto_reembolso" min="0" name="monto_reembolso" >
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="planilla_id_error" id="planilla_id_error" >
                                    <label class="col-form-label focus-label">Descripción de reembolso<span class="text-danger">*</span></label>
                                    <textarea name="descripcion_reembolso" required id="descripcion_reembolso" cols="30" rows="5" class="form-group form-control"></textarea>
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
        <!-- /Add notas Modal -->
    </div>
</div>
@section('script')
    <script>
        (tabla_llenado_dataTable)();
        function tabla_llenado_dataTable(){
            $('#tbl_Planillareembolsos').DataTable({
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
                "ajax": "/planilla/reembolso",
                "columns": [
                    {data:'id'},
                    {data:'codigo'},
                    {data:'numero-memo'},
                    {data:'encargado'},
                    {data:'identidad'},
                    {data:'inicio'},
                    {data:'finalizacion'},
                    {data:'empleado_id'},
                    {data:'total_pagado'},
                    {data:'se_genero'},
                    {data:'acciones'}
            ]});
        }

        function abrirModalReembolso(idPlanilla_error){
            console.log(idPlanilla_error);
            $('#planilla_id_error').val(idPlanilla_error);
            $("#reembolso_modal").modal("show");
        }

        (seleccionarEmpleado)();
        function seleccionarEmpleado(){
            $('#empleado_id').select2({
                ajax: {
                    type: 'GET',
                    url:'/empleado_contrato',
                    processResults: function (data) {
                        $("#empleado_id").on("select2:select", function (e) {
                            var id_select = $(e.currentTarget).val();
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].id == id_select){
                                }
                            }
                        });
                        $('#empleado_id').select2('data')
                        return {
                            results: data
                            };
                    }
                }
            });
        }

        $('#form_reembolso').submit(function(e){
            e.preventDefault();
            agregarReembolso();
        });

        function agregarReembolso(){
            var data = new FormData($('#form_reembolso').get(0));
                $.ajax({
                    type:"POST",
                    url: "/planilla/reembolso/agregar",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        console.log(data);
                        $('#form_reembolso').trigger("reset");
                        $('#reembolso_modal').modal('hide');
                        $('#tbl_Planillareembolsos').DataTable().ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            text: 'Reembolso agregado  con éxito!',
                            timer: 1500
                            });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
        }


    </script>
@endsection
