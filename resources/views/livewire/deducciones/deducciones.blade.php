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
                        <li class="breadcrumb-item active">Perfil</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

        @foreach ($deducciones as $deduccion)

                <div class="card shadow p-3 mb-5 bg-primary rounded">
                    <div class="ml-auto" id="btnStatus">
                        <button type="button" class="btn btn-warning btn-sm" onclick="habilitacionDeduccion({{$deduccion->estatus}})"><b>Cambiar estado</b></button>
                    </div>
                    <div class="profile-img-wrap edit-img">
                        <img class="inline-block" src="../../assets/img/_720.png" alt="user">
                        <div class="fileupload btn">
                            <span class="btn-text">editar</span>
                            <input class="upload" type="file">
                        </div>
                    </div>
                    <div class="m-auto">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="text-white"> <b> {{$deduccion->nombre}} </b></h1>
                            <div id="spamStatus">
                                @if ($deduccion->estatus == 1)
                                    <span class="badge badge-pill badge-success">ACTIVO</span>
                                @elseif($deduccion->estatus == 0)
                                    <span class="badge badge-pill badge-danger">INACTIVO</span>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a  class="btn btn-success text-white" data-toggle="modal" data-target="#add_techo" ><i class="fa fa-plus"></i>Agregar Techo</a>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

                <table class="table table-striped custom-table mb-0 animate__animated animate__bounceInUp" id="techos">
                    <thead>
                        <tr>
                            <th> <b>PORCENTAJE</b> </th>
                            <th> <b>TECHO INICIO</b> </th>
                            <th> <b>TECHO FINAL</b>  </th>
                            <th> <b>ACCIONES</b>  </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                        </div>
                    </div>
                </div>

                <!-- Add TECHO -->
                <div class="modal custom-modal fade" id="add_techo" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Techos de deducción</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-group" id="formTechos" data-parsley-validate>
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                        <label>Porcentaje<span class="text-danger">*</span></label>
                                        <input class="form-control" required type="text" id="porcentaje_techo" name="porcentaje_techo">
                                        <input type="hidden" id="idde" name="idde" value="{{$deduccion->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Rango de inicio<span class="text-danger">*</span></label>
                                        <input class="form-control" required type="text" id="rangoInicio_techo" name="rangoInicio_techo">

                                    </div>
                                    <div class="form-group">
                                        <label>Rango FInal<span class="text-danger">*</span></label>
                                        <input class="form-control" required type="text" id="rangoFinal_techo" name="rangoFinal_techo">
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-success submit-btn">Crear</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add TECHO -->
            @foreach ($techos as $techo)
                <!-- Edit TECHO -->
                <div class="modal custom-modal fade" id="editar_techo" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar techo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-group" id="formTechos_edit" data-parsley-validate>
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                        <label>Porcentaje<span class="text-danger">*</span></label>
                                        <input class="form-control" required type="text" id="porcentaje_techo_edit" name="porcentaje_techo_edit" value="{{ $techo->porcentaje }}">
                                        <input type="hidden" id="idde_edit" name="idde_edit" value="{{$deduccion->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Rango de inicio<span class="text-danger">*</span></label>
                                        <input class="form-control" required type="text" id="rangoInicio_techo_edit" name="rangoInicio_techo_edit" value="{{ $techo->rango_inicio }}">
                                        <input type="hidden" id="techoId_edit" name="techoId_edit" value="{{$techo->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Rango FInal<span class="text-danger">*</span></label>
                                        <input class="form-control" required type="text" id="rangoFinal_techo_edit" name="rangoFinal_techo_edit" value="{{ $techo->rango_final }}">
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-warning submit-btn">Editar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TECHO -->
            @endforeach
        @endforeach
    </div>


</div>

@section('script')
    <script>
        $('#formTechos').submit(function(e){
            e.preventDefault();
            guardarTecho();
        });
        $('#formTechos_edit').submit(function(e){
            e.preventDefault();
            editarTecho();
        });
        var idDeduccion = $('#idde').val();

           $('#techos').DataTable({
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
        "ajax": "/deducciones_listar/perfil/"+idDeduccion,
        "columns": [
            {data:'porcentaje'},
            {data:'rango_inicio'},
            {data:'rango_final'},
            {data:'action'}
        ]});



        function guardarTecho(){
            var data = new FormData($('#formTechos').get(0));
            $.ajax({
                type:"POST",
                url: "/techos/guardar",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formTechos').trigger("reset");
                    $('#add_techo').modal('hide');
                    Swal.fire({
                            icon: 'success',
                            text: 'Guardado con éxito!',
                            timer: 1500
                            });
                            location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            })
        }

        function habilitacionDeduccion(estatus){
            let idDeduc = $('#idde').val();
            Swal.fire({
                title: '¿Realmente desea cambiar el estado de ésta deducción para todos?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Sí`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"GET",
                            url: "/deducciones/estado/"+idDeduc+"/"+estatus,
                            success: function(data){
                                if(data.estatus == 1){
                                    $('#spamStatus').html('<span class="badge badge-pill badge-success">ACTIVO</span>');
                                }else if(data.estatus == 0){
                                    $('#spamStatus').html('<span class="badge badge-pill badge-danger">INACTIVO</span>');
                                }
                                Swal.fire('Listo!', '', 'success');

                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR, textStatus, errorThrown);
                            }
                        })

                    } else if (result.isDenied) {
                        Swal.fire('No se realizó ningún cambio', '', 'info')
                    }
            })
        }

        function editarTecho(){
            var idTecho = $('#techoId_edit').val();
            var data = new FormData($('#formTechos_edit').get(0));
            $.ajax({
                type:"POST",
                url: "/techos/editar/"+idTecho,
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formTechos_edit').trigger("reset");
                    $('#editar_techo').modal('hide');
                    Swal.fire({
                            icon: 'success',
                            text: 'Guardado con éxito!',
                            timer: 1500
                            });
                            location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            })
        }


    </script>
@endsection
