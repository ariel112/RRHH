
<div  class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Niveles de acceso al sistema</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <table class="table animate__animated animate__bounceInUp" id="tblusuarios">
            <thead class="table-dark">
                <tr>
                    <th> <b>NOMBRE</b> </th>
                    <th> <b>IDENTIDAD</b>  </th>
                    <th> <b>ROL DE ACCESO</b>  </th>
                    <th> <b>Acción</b>  </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div id="modal_asignar_usuario" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ROLES DE USUARIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card p-3 sm-white rounded m-auto d-flex" >
                            <div class="card-header">
                                <h3 class="card-header text-secondary text-center">Definir niveles de acceso</h3>
                            </div>
                            <div class="card-body">
                                <form id="formUserSelect" class="form-group" data-parsley-validate>
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group" wire:ignore wire:key="first">
                                                <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                                                {{-- <select class="js-data-example-ajax form-control" required style="width: 350px; height:40px;" name="empleado_id" id="empleado_id">
                                                </select> --}}
                                                <input type="text" id="nombre_empleado" name="nombre_empleado" disabled value="">
                                            </div>
                                            <input id="empleadoIdentidad" name="empleadoIdentidad" type="hidden" value="">
                                        </div>
                                        <div class="col-6">
                                            <label class="col-form-label focus-label">Rol en el sistema <span class="text-danger">*</span></label>
                                            <select name="select_tipoUser" id="select_tipoUser" class="form-control" required>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button href="javascript:void(0);" class="btn btn-success btn-lg btn-block m-auto" type="submit" id="btnGuardarTipoUser">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@section('script')

    <script>
        $('#formUserSelect').submit(function(e){
            e.preventDefault();
            guardarTipoUser();
        });


        $('#tblusuarios').DataTable({
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
            "ajax": "/user/listar_usuarios",
            "columns": [
                {data:'nombre'},
                {data:'identidad'},
                {data:'nivel'},
                {data:'accion'}
        ]});

        function render_tipoUsers(data){
                var html_render_tipoUsers ='<option selected="selected" value="">SELECCIONE</option>';
                for (var i=0; i<data.length; ++i){
                    html_render_tipoUsers += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                    }
                $('#select_tipoUser').html(html_render_tipoUsers);
        }

        function cargo_tipoUsers(){
            $.ajax({
                type:"GET",
                url: "/tipoUsers",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    render_tipoUsers(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
        cargo_tipoUsers();

        function guardarTipoUser(){
            var data = new FormData($('#formUserSelect').get(0));
                $.ajax({
                    type:"POST",
                    url: "/empleado/tipoUsuario",
                    data: data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                        /* console.log(data); */

                        Swal.fire({
                            icon: 'success',
                            text: 'Nivel de acceso registrado éxito!',
                            timer: 1500
                        });
                        $('#tblusuarios').DataTable().ajax.reload();
                        $('#formUserSelect').trigger("reset");
                        $('#modal_asignar_usuario').modal('hide');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                })
        }

        function cargarEmpleadoUser(idempleado){
            $.ajax({
                type:"GET",
                url: "/empleado/getEmpleadoUser/"+idempleado,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    $('#empleadoIdentidad').val(data[0].identidad);
                    $('#nombre_empleado').val(data[0].nombre);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
    </script>

@endsection
