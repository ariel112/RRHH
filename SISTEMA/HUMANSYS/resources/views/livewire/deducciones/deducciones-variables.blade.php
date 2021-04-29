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

        <div class="card">
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

        <table class="table" id="tbltipodeduc">
            <thead class="table-dark">
                <tr>
                    <th> <b>ID</b> </th>
                    <th> <b>NOMBRE</b> </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@section('script')

<script>
    $('#formDeducVarianteCrear').submit(function(e){
            e.preventDefault();
            guardarDeduccionVariante();
    });

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
            {data:'nombre'}
        ]});

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
</script>

@endsection
