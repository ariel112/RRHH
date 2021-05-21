<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Usuarios</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">usuarios</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="card p-3 {{-- mb-5 --}} sm-white rounded m-auto d-flex" {{-- style="width: 30rem;" --}}>
            <div class="card-header">
                <h3 class="card-header text-secondary text-center">Definir niveles de acceso</h3>
            </div>
            <div class="card-body">
                <form id="formUserSelect" class="form-group" data-parsley-validate>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" wire:ignore wire:key="first">
                                <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                                <select class="js-data-example-ajax form-control" required style="width: 350px; height:40px;" name="empleado_id" id="empleado_id">
                                </select>
                            </div>
                            <input id="empleadoIdentidad" name="empleadoIdentidad" type="hidden" value="">
                        </div>
                        <div class="col-4">
                            {{-- <label class="col-form-label focus-label"> Roles de usuarios</label> --}}
                            <select name="select_tipoUser" id="select_tipoUser" class="form-control" required>
                            </select>
                        </div>
                        <div class="col-2">
                            <button href="javascript:void(0);" class="btn btn-success btn-lg btn-block m-auto" type="submit" id="btnGuardarTipoUser">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <table class="table" id="tblMarcaje">
            <thead class="table-dark">
                <tr>
                    <th> <b>ID</b> </th>
                    <th> <b>NOMBRE</b> </th>
                    <th> <b>IDENTIDAD</b>  </th>
                    <th> <b>ENTRADA</b>  </th>
                    <th> <b>SALIDA</b>  </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>
@section('script')

    <script>
        $('#formUserSelect').submit(function(e){
            e.preventDefault();
            guardarTipoUser();
        });


        $('#tblMarcaje').DataTable({
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
            "ajax": "/marcaje/listar",
            "columns": [
                {data:'id'},
                {data:'nombre'},
                {data:'identidad'},
                {data:'entradas'},
                {data:'salidas'}
        ]});

         $('#empleado_id').select2({


                ajax: {
                    type: 'GET',
                    url:'/empleado_contrato',
                    processResults: function (data) {
                        /* console.log(data[0].text); */
                        // console.log(data);
                        getEm(data);
                        /* console.log(data[1]); */

                        $('#empleado_id').select2('data')
                        return {
                            results: data
                            };

                    }
                }
        });
        function getEm(data){
            $("#empleado_id").on("select2:select", function (e) {
                var id_select = $(e.currentTarget).val();
                    /* console.log(id_select); */
                for (let i = 0; i < data.length; i++) {
                    if(data[i].id == id_select){
                        $('#empleadoIdentidad').val(data[i].identidad);
                        /* document.formUserSelect.identidad_empleado.value= data[i].identidad; */
                        /* console.log(data[i].identidad); */
                    }
                }

                // console.log(id_select)
            });
        }

        function render_tipoUsers(data){
            var html_render_tipoUsers ='<option selected="selected" value="">SELECCIONE TIPO DE USUARIO</option>';
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
                        $('#formUserSelect').trigger("reset");
                        Swal.fire({
                            icon: 'success',
                            text: 'Nivel de acceso registrado éxito!',
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
