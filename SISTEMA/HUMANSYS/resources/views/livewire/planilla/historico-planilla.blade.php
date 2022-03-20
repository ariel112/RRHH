<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Nóminas de Sueldos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Histórico</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table animate__animated animate__bounceInUp" id="tbl_HistoricoPlanilas">
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
        <div id="crear_notas" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">Añadir notas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_notas" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Notas de planilla <span class="text-danger">*</span></label>
                                        <br>
                                        <span id="add_field" value="adicionar" class="btn btn-success"><i class="fa fa-plus text-white"></i></span>
                                        <br>
                                        <input type="hidden" name="idPlanilla"  id="idPlanilla" value="">
                                        <div id="listas" class="mt-1">
                                            <div class="">

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div >
                                <button id="crearcargo" class="btn btn-primary submit-btn btn-block">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add notas Modal -->
        {{-- ventana modal edit notas --}}
        <div id="ver_notas_editar" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning"><i class="fa fa-edit"></i> Visualización y edición de notas de planilla con id: <h3 class="modal-title text-warning" id="idPlanilla_mostrar"></h3></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="ver_notas_edit_form" data-parsley-validate>
                            <input type="hidden" name="idPlanilla_edit"  id="idPlanilla_edit" value="">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Notas <span class="text-danger">*</span></label>
                                        <br>
                                        <span id="add_field_edit" value="adicionar" class="btn btn-success"><i class="fa fa-plus text-white"></i></span>
                                        <br>
                                        <div id="listas_edit" class="mt-1">
                                            <div id="area_funciones" class="">


                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center" >
                                <button id="edit_nota" class="btn btn-warning submit-btn text-white text-center">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  Fin ventana modal edit notas --}}
    </div>
</div>
@section('script')
<script>

        // funcion para cerra modal
    function CierraPopup(modal) {
        $("#"+modal).modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
    }
        // fin de funcion para cerrar modal



        // para adicionar funciones del colaborador

    var campos_max = 20;
    var x = 0;

    $('#add_field').click (function(e) {
        e.preventDefault();     //prevenir novos clicks
        if (x < campos_max) {
        $('#listas').append('<div class="input-group mb-3 mt-1 reducir_input"><span class="input-group-text reducir_input"><b>i.</b></span>\
            <input type="text" class="form-control reducir_input" required name="funciones[]">\
            <span class="input-group-text bg-danger reducir_input"><a  class="remover_campo btn btn-danger reducir_input"><i class="fa fa-minus fa-1x text-white reducir_input"></i></a></span></div>');
            x++;
        }
    });

    // Remover o div anterior
    $('#listas').on("click",".remover_campo",function(e) {
        e.preventDefault();
        $(this).parent().parent('div').remove();
        x--;
    });

    $('#form_notas').submit(function (e) {
        e.preventDefault();
        guardar();
    });

    function guardar() {
        var modalID = 'crear_notas';
        var data = new FormData($('#form_notas').get(0));
        $.ajax({
            type:"POST",
            url: "/planilla/notas",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){
                CierraPopup(modalID);
                alert_bien();
                location.reload();
                $('#tbl_HistoricoPlanilas').DataTable().ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    }

    function alert_bien(){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '¡Creado Correctamente!',
            showConfirmButton: false,
            timer: 2500
        });
    }

    function alert_edit(){
        Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Editado Correctamente',
            showConfirmButton: false,
            timer: 2500
        });
    }

    (tabla_llenado_dataTable)();
    function tabla_llenado_dataTable(){
        $('#tbl_HistoricoPlanilas').DataTable({
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
            "ajax": "/planilla/getplanillas",
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

    function descargarPlanilla(idPlanilla){
        event.preventDefault();
        axios({
        url: "/planilla/descarga/"+idPlanilla,
        method: 'GET',
        responseType: 'blob', // important
        })

        .then(
            (response => {
                //console.log(response.data.message)
                let mensaje = response.data.message;

                Swal.fire({
                    title: "Exito!",
                    text: mensaje,
                    icon: "success",
                    confirmButtonText: "Cerrar",
                });

                if(response.data.icon == "error"){
                    return;
                }
                const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'planilla.xlsx'); //or any other extension
                    document.body.appendChild(link);
                    link.click();
                        })
        ).catch( (err) => {
            // console.log(err)
                Swal.fire({
                    title: "Error!",
                    text: "Ha ocurrido un error, intente de nuevo.",
                    icon: "error",
                    confirmButtonText: "Cerrar",
                });
        })
    }

    function abrirModalNotas(idPlanilla){
        /* console.log(idPlanilla); */
        $('#idPlanilla').val(idPlanilla);
        $("#crear_notas").modal("show");
    }

    function mostrarNotasPlanilla(idPlanilla){
        $('#idPlanilla_mostrar').html(' '+idPlanilla);
        cargo_notas_mostrar(idPlanilla);
        $('#idPlanilla_edit').val(idPlanilla);
        $("#ver_notas_editar").modal("show");
    }

    function listarnotas(data){
        var list_notes ='';
        for (var i=0; i<data.length; ++i){
            list_notes += ' <div id="fun'+data[i].id+'" class="input-group mb-3"><span  class="input-group-text reducir_input">i.</span><input value="'+data[i].descripcion+'" type="text" class="form-control reducir_input"  aria-label="Funciones del empleado" name="funciones_editar[]"><a  class="btn bg-danger text-white"> <i onclick="eliminar_notas('+data[i].id+')" class="fa fa-trash"></i></a><input  style="display:none;" value="'+data[i].id+'" type="text"    name="id_funcion[]"> </div>'
        }

        $('#area_funciones').html(list_notes);



        // aumentar funciones edit

        var campos_max_edit = 20;   //max de 10 campos



        var x_edit = 0;
        $('#area_funciones').html();
        $('#add_field_edit').click (function(e) {
            e.preventDefault();     //prevenir novos clicks
            if (x_edit < campos_max_edit) {
                $('#area_funciones').append('<div class="input-group mb-3 mt-1 reducir_input">\
                                                <span class="input-group-text reducir_input">i.</span>\
                                                <input type="text" class="form-control  reducir_input"  required name="funciones_edit[]" >\
                                                <span class="input-group-text bg-danger reducir_input">\
                                                    <a  class="remover_campo btn btn-danger reducir_input"><i class="fa fa-minus fa-1x text-white reducir_input"></i></a>\
                                                </span>\
                                            </div>');
                x_edit++;
            }
        });
    }
    function cargo_notas_mostrar(idPlanilla){
        $.ajax({
                type:"GET",
                url: "/planilla/notas/mostrar/"+idPlanilla,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    listarnotas(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
    }



    // Remover o div anterior
    $('#listas_edit').on("click",".remover_campo",function(e) {
            e.preventDefault();
            $(this).parent().parent('div').remove();
            x_edit--;
    });

    function eliminar_notas(id){
        $.ajax({
            type:"GET",
            url: "/notas/eliminar/"+id,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){

                $('#fun'+data).hide('slow').remove();
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Eliminado correctamente',
                    showConfirmButton: false,
                    timer: 2500
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    }

    $('#ver_notas_edit_form').submit(function (e) {
        e.preventDefault();
        editnotas();
    });

    function editnotas(){
        event.preventDefault();
        var modalID = 'ver_notas_editar';
        var data = new FormData($('#ver_notas_edit_form').get(0));
        /* console.log(data); */
        $.ajax({
            type:"POST",
            url: "/planilla/notas/editar",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){
                CierraPopup(modalID);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Editado Correctamente!',
                    showConfirmButton: false,
                    timer: 2500
                });
                location.reload();
                $('#tbl_HistoricoPlanilas').DataTable().ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    }


</script>

@endsection
