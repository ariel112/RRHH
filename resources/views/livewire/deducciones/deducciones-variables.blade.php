<div class="page-wrapper">
    <div  class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Deducciones</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a >Dashboard</a></li>
                        <li class="breadcrumb-item active">Deducciones</li>
                        <li class="breadcrumb-item active">Variantes</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

        <div class="card" style="opacity: 80%;">
            <div class="card-body">
                <form id="formDeducVarianteCrear" class="form-group" data-parsley-validate>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control floating" required id="nombre_deduc_variante" name="nombre_deduc_variante" placeholder="Nombre de deducción">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-lg btn-block btn-success ">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

        <table class="table animate__animated animate__bounceInUp" id="tbltipodeduc">
            <thead class="table-dark">
                <tr>
                    <th> <b>ID</b> </th>
                    <th> <b>NOMBRE</b> </th>
                    <th> <b>ESTADO</b> </th>
                    <th> <b>ACCIONES</b> </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- DEDUCCIONMODALVARIANTE  -->
    <div class="modal custom-modal fade" id="editar_deduccion_variante" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Deducción variante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" id="formDeduc_edit" data-parsley-validate>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="row">
                            <div class="col-12" id="nombretipodeduc">
                                <label for=""> Nombre de Tipo de deducción</label>
                                <input type="text" class="form-control floating" required id="nombre_deduc_variante_edit" name="nombre_deduc_variante_edit" value="">
                                <input type="hidden" id="idTideva" name="idTideva" value="">
                            </div>
                            <div class="col-12">
                                <label for="">Estado de deducción</label>
                                <select name="select_estado_deduc" id="select_estado_deduc" required class="custom-select">
                                    <option value="" id="optionSelect_estado_deduc"></option>
                                </select>
                            </div>

                        </div>
                        <div class="submit-section">
                            <button class="btn btn-lg btn-block btn-warning ">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /DEDUCCIONMODALVARIANTE -->
</div>

@section('script')

<script>
    $('#tbltipodeduc').DataTable({
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
        "ajax": "/tipoDeducVariante/listar",
        "columns": [
            {data:'id'},
            {data:'nombre'},
            {data:'estado'},
            {data:'action'}
    ]});
    /* function addIdTipoDeduccion(id, nombre){
            $('#idTideva').val(id);
            $('#nombre_deduc_variante_edit').val(nombre);
    } */
    $('#formDeducVarianteCrear').submit(function(e){
            e.preventDefault();
            guardarDeduccionVariante();
    });

    $('#formDeduc_edit').submit(function(e){
            e.preventDefault();
            let id = $('#idTideva').val();
            editarVariantes(id);
    });

    /* (cargarTipoDeducVariable)(); */
    (cargarEstados)();


        function guardarDeduccionVariante(){
            var data = new FormData($('#formDeducVarianteCrear').get(0));
            $.ajax({
                type:"POST",
                url: "/deducVariantes/guardar",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formDeducVarianteCrear').trigger("reset");
                    Swal.fire({
                            icon: 'success',
                            text: 'Guardado con éxito!',
                            timer: 1500
                            });
                    $("#tbltipodeduc").DataTable().ajax.reload();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            })
        }



        function editarVariantes(id){
            var data = new FormData($('#formDeduc_edit').get(0));
            $.ajax({
                type:"POST",
                url: "/deducVariantes/editar/"+id,
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formDeducVarianteCrear').trigger("reset");
                    Swal.fire({
                            icon: 'success',
                            text: 'Editado con éxito!',
                            timer: 1500
                            });
                    $('#editar_deduccion_variante').modal('hide');
                    $("#tbltipodeduc").DataTable().ajax.reload();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            })
        }

        function estadoVariantes(id, nombre, idestado){
            Swal.fire({
                title: '¿Confirme cambio de estado de '  +nombre+'?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Confirmo`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"GET",
                            url: "/estadoVariantes/"+id+"/"+idestado,
                            contentType: false,
                            cache: false,
                            processData:false,
                            dataType:"json",
                            success: function(data){
                                console.log(data);
                                Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Cambio de estado con éxito!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                                $("#tbltipodeduc").DataTable().ajax.reload();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR, textStatus, errorThrown);
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire('Salida no marcada', '', 'info')
                    }
            })
        }

        function renderEstados(data){
            var html_select_cargos ='<option value="">SELECCIONE ESTADO</option>';
            for (var i=0; i<data.length; ++i){
                html_select_cargos += '<option value="'+data[i].id+'" ">'+data[i].estado+'</option>';
                }
            $('#select_estado_deduc').html(html_select_cargos)
        }

        function cargarEstados(){
            $.ajax({
                type:"GET",
                url: "/cargo/estadoVariante",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    renderEstados(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderDatodsEditar_modal(id){
            $.ajax({
                type:"GET",
                url: "/deduccionTipoVariable/mostrar/"+id,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    $('#nombre_deduc_variante_edit').val(data[0].nombre);
                    $('#idTideva').val(data[0].id);
                    $('#optionSelect_estado_deduc').val(data[0].estado_tdv_id);
                    if(data[0].estado_tdv_id==1){
                        $('#optionSelect_estado_deduc').html('ACTIVO');
                    }else{
                        $('#optionSelect_estado_deduc').html('INACTIVO');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        /* function renderTipoDeducVariable(data){
            $('#nombre_deduc_variante_edit').val(data[0].nombre)
        }

        function cargarTipoDeducVariable(){
            $.ajax({
                type:"GET",
                url: "/cargo/TipoDeducVariable",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    renderTipoDeducVariable(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        } */

</script>

@endsection
