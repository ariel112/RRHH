<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Nóminas de Sueldos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Voucher</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table class="table animate__animated animate__bounceInUp" id="tbl_planillaVaucher">
                        <thead class="table-dark">
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Código</th>
                                <th>Número-memo</th>
                                <th>Inicio</th>
                                <th>Finalización</th>
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

        <div id="modal_ver_voucher" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">Datos contenidos en su voucher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="row_datos">

                        </div>
                    </div>
                    <div class="modal-footer" id="El_boton_muestra_pdf">
                        <input type="hidden" name="idPlanilla_desPDF" id="idPlanilla_desPDF">
                        {{-- <button type="button" onclick="descargarPdf()" class="btn btn-success">Estoy de acuerdo con mis datos</button> --}}
                        {{-- <button type="button" class="btn btn-warning" data-dismiss="modal">No estoy de acuerdo</button> --}}
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
            $('#tbl_planillaVaucher').DataTable({
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
                "autoWidth": false,
                "ajax": "/planilla/getplanillas_voucher",
                "columns": [
                    {data:'codigo'},
                    {data:'numero-memo'},
                    {data:'inicio'},
                    {data:'finalizacion'},
                    {data:'acciones'}
            ]});
        }

        function mostrarModal(idPlanilla){
            $('#idPlanilla_desPDF').val(idPlanilla);
            document.getElementById('row_datos').innerHTML = '';
            $.ajax({
                type:"GET",
                url: "/planilla/voucher_ver/"+idPlanilla,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    var fijas = data.pagos_deducciones_fijas;
                    var pagos_deducciones_variables = data.pagos_deducciones_variables;
                    document.getElementById('El_boton_muestra_pdf').innerHTML = '<a id="descarga" class="btn btn-success" href="/planilla/generate-pdf_voucher/'+data.planilla.id+'">Estoy de acuerdo con mis datos</a><button type="button" class="btn btn-warning" data-dismiss="modal">No estoy de acuerdo</button>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Empleado: '+data.empleado.id+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Teléfono: '+data.empleado.telefono_1+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Identidad: '+data.empleado.identidad+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Correo: '+data.empleado.email_institucional+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Nombre: '+data.empleado.nombre+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Inicio: '+data.planilla.fecha_inicio+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Finalización: '+data.planilla.fecha_final+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Gerencia: '+data.cargo.gerencia+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Puesto: '+data.cargo.cargo+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-12"><hr></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Sueldo: '+data.pago.catorcena+'</h5></div>';
                    fijas.forEach(funcion_render);
                    function funcion_render(item, index){
                        document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Deducción: '+item.nombre_deduccion+', Monto: Lps. '+item.monto+'</h5></div>';
                    }
                    if(pagos_deducciones_variables){
                        pagos_deducciones_variables.forEach(funcion_render_2);
                        function funcion_render_2(item, index){
                            document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Deducción: '+item.nombre_deduccion+', Monto: Lps. '+item.monto+'</h5></div>';
                        }
                    }
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Otros: Lps. '+data.pago.llegadas_tarde_monto+'</h5></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-12"><hr></div>';
                    document.getElementById('row_datos').innerHTML += '<div class="col-md-4"><h5>Sueldo Neto: Lps. '+data.pago.catorcena+'</h5></div>';
                    $('#modal_ver_voucher').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function descargarPdf(){
            $( "#descarga" ).click();
            /* var idPlanilla = $('#idPlanilla_desPDF').val(); */
            /* $.ajax({
                type:"GET",
                url: "/planilla/generate-pdf_voucher/"+idPlanilla,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    window.open(data, '_blank');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            }); */
        }
    </script>
@endsection
