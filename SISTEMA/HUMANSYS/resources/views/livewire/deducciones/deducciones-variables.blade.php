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
                <form id="formDeducVarianteCrear" class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Nombre de deducción</label>
                            <input type="text" class="form-control" required id="nombre_deduc_variante">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-success m-auto">Agregar</button>
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

        
</script>

@endsection
