<div class="page-wrapper">
    <div  class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Marcaje de colaboradores</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a >Dashboard</a></li>
                        <li class="breadcrumb-item active">Marcaje</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->

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


        function marcarEntrada(idEmpleado){
            $.ajax({
                type:"GET",
                url: "/marcaje/entrada/"+idEmpleado,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    /* $("#btnSalida_Emp_"+idEmpleado).button('dispose'); */
                    /* $("#btnSalida_Emp_"+idEmpleado).addClass("disabled"); */
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Entrada marcada con éxito!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $("#btnEntrada_Emp_"+idEmpleado).fadeOut();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
        function marcarSalida(idEmpleado){
            $.ajax({
                type:"GET",
                url: "/marcaje/salida/"+idEmpleado,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Salida marcada con éxito!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $("#btnSalida_Emp_"+idEmpleado).fadeOut();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
    </script>

@endsection
