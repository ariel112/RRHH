<div class="page-wrapper">


    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Salidas/Entradas de Medio Día</h3>

                </div>

            </div>
        </div>
        <!-- /Page Header -->


        <div class="m-2">

            <form action="" class=" d-flex align-items-end">

                <div class=" ">
                    <label for="fechaDiaSalida" class="col-form-label ml-3">Seleccione una fecha</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="fechaDiaSalida " style="width:200px">
                    </div>
                </div>

                <div class="d-flex mb-2">
                    <div class="form-check ml-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Salida
                        </label>
                    </div>
                    <div class="form-check ml-2">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Entrada
                        </label>
                    </div>
                </div>


            </form>
        </div>

        <!-----Tabla de empleados----->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablaEmpleadosSalidas" class="table table-striped custom-table mb-0 " style="width:100%">
                        <thead>
                            <tr>
                               
                                <th class="font-weight-bold">Nombre empleado</th>
                                <th class="font-weight-bold">Identidad</th>
                                <th class="font-weight-bold">Departamento</th>
                               
                                <!-- <th class="font-weight-bold">Seleccionar</th> -->

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--fin tabla empleados------>

    </div>
</div>

@section('script')

<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

<script>
$(document).ready(tablaListaEmpleados);

function tablaListaEmpleados() {
    // $("#tablaEmpleadosSalidas").DataTable({
    //     ajax: "/listar/empleados/medio/dia",
    //     paging: false,
    //     processing: true,
    //     serverSide: true,
    //     columns: [
    //         { data: "nombre", name: "nombre" },
    //         { data: "identidad", name: "identidad" },
    //         { data: "departamento", name: "departamento" },          
    //         { data: "acciones",  name: "acciones",  orderable: false,  searchable: false,  },
    //     ],
    // });

    $('#tablaEmpleadosSalidas').DataTable({
       
      
        ajax: "/listar/empleados/medio/dia",
        columns: [
            { data: "nombre", name: "nombre" },
            { data: "identidad", name: "identidad" },
            { data: "departamento", name: "departamento" },          
          // { data: "acciones",  name: "seleccionar",  },
        ],
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        
    } );
}

</script>

<style>
table.dataTable tbody>tr.selected,table.dataTable tbody>tr>.selected{background-color:#b0bed9}table.dataTable.stripe tbody>tr.odd.selected,table.dataTable.stripe tbody>tr.odd>.selected,table.dataTable.display tbody>tr.odd.selected,table.dataTable.display tbody>tr.odd>.selected{background-color:#acbad4}table.dataTable.hover tbody>tr.selected:hover,table.dataTable.hover tbody>tr>.selected:hover,table.dataTable.display tbody>tr.selected:hover,table.dataTable.display tbody>tr>.selected:hover{background-color:#aab7d1}table.dataTable.order-column tbody>tr.selected>.sorting_1,table.dataTable.order-column tbody>tr.selected>.sorting_2,table.dataTable.order-column tbody>tr.selected>.sorting_3,table.dataTable.order-column tbody>tr>.selected,table.dataTable.display tbody>tr.selected>.sorting_1,table.dataTable.display tbody>tr.selected>.sorting_2,table.dataTable.display tbody>tr.selected>.sorting_3,table.dataTable.display tbody>tr>.selected{background-color:#acbad5}table.dataTable.display tbody>tr.odd.selected>.sorting_1,table.dataTable.order-column.stripe tbody>tr.odd.selected>.sorting_1{background-color:#a6b4cd}table.dataTable.display tbody>tr.odd.selected>.sorting_2,table.dataTable.order-column.stripe tbody>tr.odd.selected>.sorting_2{background-color:#a8b5cf}table.dataTable.display tbody>tr.odd.selected>.sorting_3,table.dataTable.order-column.stripe tbody>tr.odd.selected>.sorting_3{background-color:#a9b7d1}table.dataTable.display tbody>tr.even.selected>.sorting_1,table.dataTable.order-column.stripe tbody>tr.even.selected>.sorting_1{background-color:#acbad5}table.dataTable.display tbody>tr.even.selected>.sorting_2,table.dataTable.order-column.stripe tbody>tr.even.selected>.sorting_2{background-color:#aebcd6}table.dataTable.display tbody>tr.even.selected>.sorting_3,table.dataTable.order-column.stripe tbody>tr.even.selected>.sorting_3{background-color:#afbdd8}table.dataTable.display tbody>tr.odd>.selected,table.dataTable.order-column.stripe tbody>tr.odd>.selected{background-color:#a6b4cd}table.dataTable.display tbody>tr.even>.selected,table.dataTable.order-column.stripe tbody>tr.even>.selected{background-color:#acbad5}table.dataTable.display tbody>tr.selected:hover>.sorting_1,table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_1{background-color:#a2aec7}table.dataTable.display tbody>tr.selected:hover>.sorting_2,table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_2{background-color:#a3b0c9}table.dataTable.display tbody>tr.selected:hover>.sorting_3,table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_3{background-color:#a5b2cb}table.dataTable.display tbody>tr:hover>.selected,table.dataTable.display tbody>tr>.selected:hover,table.dataTable.order-column.hover tbody>tr:hover>.selected,table.dataTable.order-column.hover tbody>tr>.selected:hover{background-color:#a2aec7}table.dataTable tbody td.select-checkbox,table.dataTable tbody th.select-checkbox{position:relative}table.dataTable tbody td.select-checkbox:before,table.dataTable tbody td.select-checkbox:after,table.dataTable tbody th.select-checkbox:before,table.dataTable tbody th.select-checkbox:after{display:block;position:absolute;top:1.2em;left:50%;width:12px;height:12px;box-sizing:border-box}table.dataTable tbody td.select-checkbox:before,table.dataTable tbody th.select-checkbox:before{content:" ";margin-top:-6px;margin-left:-6px;border:1px solid black;border-radius:3px}table.dataTable tr.selected td.select-checkbox:after,table.dataTable tr.selected th.select-checkbox:after{content:"✓";font-size:20px;margin-top:-19px;margin-left:-6px;text-align:center;text-shadow:1px 1px #b0bed9,-1px -1px #b0bed9,1px -1px #b0bed9,-1px 1px #b0bed9}table.dataTable.compact tbody td.select-checkbox:before,table.dataTable.compact tbody th.select-checkbox:before{margin-top:-12px}table.dataTable.compact tr.selected td.select-checkbox:after,table.dataTable.compact tr.selected th.select-checkbox:after{margin-top:-16px}div.dataTables_wrapper span.select-info,div.dataTables_wrapper span.select-item{margin-left:.5em}@media screen and (max-width: 640px){div.dataTables_wrapper span.select-info,div.dataTables_wrapper span.select-item{margin-left:0;display:block}}

</style>

@endsection