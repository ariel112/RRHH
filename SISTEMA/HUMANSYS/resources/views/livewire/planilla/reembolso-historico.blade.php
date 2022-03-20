<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Histórico de reembolsos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Reembolso</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <h5>Se enlistan reembolsos activos</h5>
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

        <table class="table animate__animated animate__bounceInUp" id="tbl_Planillareembolsos-historico">
            <thead class="table-dark">
                <tr>
                    {{-- <th>#</th> --}}
                    <th>id</th>
                    <th>Estado</th>
                    <th>Empleado</th>
                    <th>Monto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Planilla ID</th>
                    <th class="text-right">Acción</th>
                </tr>
            </thead>
            <tbody>
                {{-- 6378268215 --}}

            </tbody>
        </table>

                </div>
            </div>
        </div>
        <div id="reembolso_modal_edit" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">REEMBOLSO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_reembolso_edit" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-4">
                                    <label for="">Id colaborador<span class="text-danger">*</span></label>
                                    <input disabled class="form-control" required type="text" id="empleado_id_edit" name="empleado_id_edit">
                                </div>
                                <div class="col-6">
                                    <label for="">Colaborador<span class="text-danger">*</span></label>
                                    <input disabled class="form-control" required type="text" id="empleado_nombre_edit" name="empleado_nombre_edit">
                                </div>
                                <div class="col-2">
                                    <label for="">Monto<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="number" min="0" id="monto_edit" name="monto_edit">
                                </div>
                                <div class="col-6">
                                    <label for="">Nombre<span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" id="nombre_reembolso_edit" name="nombre_reembolso_edit">
                                </div>
                                <div class="col-6">
                                    <label for="">Id de Planilla del reembolso<span class="text-danger">*</span></label>
                                    <input class="form-control" disabled required type="text" id="id_planilla_error_edit" name="id_planilla_error_edit">
                                    <input type="hidden" id="id_reembolso_edit" name="id_reembolso_edit">
                                </div>
                                <div class="col-12">
                                    <label for="">Descripcion<span class="text-danger">*</span></label>
                                    <textarea class="form-control" required name="descripcion_edit" id="descripcion_edit" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="text-center submit-section" >
                                <button id="editar_reembolso" class="btn btn-warning submit-btn btn-block">Guardar cambios</button>
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
        (tabla_llenado_dataTable)();
        function tabla_llenado_dataTable(){
            $('#tbl_Planillareembolsos-historico').DataTable({
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
                "ajax": "/reembolso/get",
                "columns": [
                    {data:'id'},
                    {data:'estado'},
                    {data:'empleado'},
                    {data:'monto'},
                    {data:'nombre'},
                    {data:'descripcion'},
                    {data:'planilla'},
                    {data:'acciones'}
            ]});
        }

        function abrirModalReembolso_edit(idReembolso, nombre){
            $.ajax({
                type:"GET",
                url: "/reembolso/listar_edit/"+idReembolso,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    $('#empleado_id_edit').val(data.empleado_id);
                    $('#monto_edit').val(data.monto);
                    $('#nombre_reembolso_edit').val(data.nombre_reembolso);
                    $('#id_planilla_error_edit').val(data.planilla_id_error);
                    $('#descripcion_edit').html(data.descripcion_reembolso);
                    $('#id_reembolso_edit').val(idReembolso);
                    $('#empleado_nombre_edit').val(nombre);

                    $("#reembolso_modal_edit").modal("show");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        $('#form_reembolso_edit').submit(function(e){
            e.preventDefault();
            guardar_edit();
        });

        function guardar_edit(){
            var data = new FormData($('#form_reembolso_edit').get(0));
                $.ajax({
                    type:"POST",
                    url: "/planilla/reembolso/editar",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        console.log(data);
                        $('#form_reembolso_edit').trigger("reset");
                        $('#reembolso_modal_edit').modal('hide');
                        $('#tbl_Planillareembolsos-historico').DataTable().ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            text: 'Reembolso editado con éxito!',
                            timer: 1500
                            });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
        }

        function desactivarReembolso(idreembolso, nombre, monto){
            console.log('ID: '+idreembolso+' NOMBRE:'+nombre+' MONTO: '+monto);
            Swal.fire({
                text: 'Al desactivar reembolso de '+ nombre +' por un monto de Lps.'+monto+', éste no será generado en la siguiente planilla.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Confirmo`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                type:"GET",
                                url: "/reembolso/desactivar/"+idreembolso,
                                contentType: false,
                                cache: false,
                                processData:false,
                                success: function(){
                                    Swal.fire({
                                        icon: 'success',
                                        text: 'Desactivado con éxito!',
                                        timer: 1500
                                        });
                                        $('#tbl_Planillareembolsos-historico').DataTable().ajax.reload();
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    console.log(jqXHR, textStatus, errorThrown);
                                }
                        })
                    } else if (result.isDenied) {
                        Swal.fire('Cambio de estado no realizado', '', 'info')
                    }
            });
        }
    </script>
@endsection
