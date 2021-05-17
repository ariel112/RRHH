<div class="page-wrapper">
    <div  class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Feriados anuales</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a >Dashboard</a></li>
                        <li class="breadcrumb-item active">Feriados</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <div class="" >
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"  data-target="#modalAddFeriado">Agregar feriado</button>
        </div>
        <br><br>
        <table class="table" id="tblFeriados">
            <thead class="table-dark">
                <tr>
                    <th> <b>ID</b> </th>
                    <th> <b>FECHA</b> </th>
                    <th> <b>MOTIVO</b>  </th>
                    <th> <b>REGISTRADO POR</b>  </th>
                    <th> <b>ESTADO</b>  </th>
                    <th> <b>ACCIONES</b>  </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="modal custom-modal fade" id="modalAddFeriado" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Añadir Feriado</h3>
                        </div>
                        <form id="formAddFeriado" class="form-group" data-parsley-validate>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="card-header">
                                    <h3 class="card-header text-secondary text-center">Datos del Feriado</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Fecha<span class="text-danger">*</span></label>
                                                <input class="form-control " id="fecha_dia" name="fecha_dia" type="date" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Motivo<span class="text-danger">*</span></label>
                                                <textarea name="motivo" class="form-control" required id="motivo" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-btn">
                                <div class="submit-section">
                                    <div class="row">
                                        <div class="col-6">
                                            <button href="javascript:void(0);" class="btn btn-primary btn-lg" type="submit" id="btnAddFeriado">Guardar</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-warning btn-lg">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
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
        $('#tblFeriados').DataTable({
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
        "ajax": "/feriados/listar",
        "columns": [
            {data:'id'},
            {data:'fecha'},
            {data:'motivo'},
            {data:'user'},
            {data:'estatus'},
            {data:'actions'}
        ]});

    $('#formAddFeriado').submit(function(e){
        e.preventDefault();
        addFeriado();
    });

    function addFeriado(){
        var data = new FormData($('#formAddFeriado').get(0));
                    $.ajax({
                    type:"POST",
                    url: "/feriado/guardar",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        console.log(data);
                        $('#formAddFeriado').trigger("reset");
                        $('#modalAddFeriado').modal('hide');
                        $('#tblFeriados').DataTable().ajax.reload();
                        Swal.fire({
                            icon: 'success',
                            text: 'Feriado guardad0 con éxito!',
                            timer: 1500
                            });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                })
    }

    function cambiarEstadoFeriado(idFeriado){
        event.preventDefault();
        Swal.fire({
            title: '¿Seguro quiere cambiar estado de éste feriado?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Confirmo`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"GET",
                        url: "/feriado/estado/"+idFeriado,
                        contentType: false,
                        cache: false,
                        processData:false,
                        dataType:"json",
                        success: function(data){
                            /* console.log(data); */
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Estado modificado con éxito!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#tblFeriados').DataTable().ajax.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            /* console.log(jqXHR, textStatus, errorThrown); */
                            $('#tblFeriados').DataTable().ajax.reload();
                        }
                    });
                    Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Estado modificado con éxito!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                } else if (result.isDenied) {
                    Swal.fire('Estado no cambiado', '', 'info')
            }
        })
    }

    </script>
@endsection
