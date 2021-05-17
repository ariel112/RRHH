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
            <button type="button" class="btn btn-primary btn-lg btn-block">Agregar feriado</button>
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
    </script>
@endsection
