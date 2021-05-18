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
                <div id="events">
        Row selected count - new information added at the top
    </div>
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
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>

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
    var events = $('#events');
    var table = $('#tablaEmpleadosSalidas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
       
        dom: 'Bfrtip',
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
        buttons: [
            {
                text: 'Guarar',
                action: function () {
                    var count = table.rows( { selected: true } ).data();

                    console.log(count)
 
                    events.prepend( '<div>'+count+' row(s) selected</div>' );
                }
            }
        ]
        
    } );
}

</script>

<style>
table.dataTable tbody>tr.selected,table.dataTable tbody>tr>.selected{background-color:#b0bed9}table.dataTable.stripe tbody>tr.odd.selected,table.dataTable.stripe tbody>tr.odd>.selected,table.dataTable.display tbody>tr.odd.selected,table.dataTable.display tbody>tr.odd>.selected{background-color:#acbad4}table.dataTable.hover tbody>tr.selected:hover,table.dataTable.hover tbody>tr>.selected:hover,table.dataTable.display tbody>tr.selected:hover,table.dataTable.display tbody>tr>.selected:hover{background-color:#aab7d1}table.dataTable.order-column tbody>tr.selected>.sorting_1,table.dataTable.order-column tbody>tr.selected>.sorting_2,table.dataTable.order-column tbody>tr.selected>.sorting_3,table.dataTable.order-column tbody>tr>.selected,table.dataTable.display tbody>tr.selected>.sorting_1,table.dataTable.display tbody>tr.selected>.sorting_2,table.dataTable.display tbody>tr.selected>.sorting_3,table.dataTable.display tbody>tr>.selected{background-color:#acbad5}table.dataTable.display tbody>tr.odd.selected>.sorting_1,table.dataTable.order-column.stripe tbody>tr.odd.selected>.sorting_1{background-color:#a6b4cd}table.dataTable.display tbody>tr.odd.selected>.sorting_2,table.dataTable.order-column.stripe tbody>tr.odd.selected>.sorting_2{background-color:#a8b5cf}table.dataTable.display tbody>tr.odd.selected>.sorting_3,table.dataTable.order-column.stripe tbody>tr.odd.selected>.sorting_3{background-color:#a9b7d1}table.dataTable.display tbody>tr.even.selected>.sorting_1,table.dataTable.order-column.stripe tbody>tr.even.selected>.sorting_1{background-color:#acbad5}table.dataTable.display tbody>tr.even.selected>.sorting_2,table.dataTable.order-column.stripe tbody>tr.even.selected>.sorting_2{background-color:#aebcd6}table.dataTable.display tbody>tr.even.selected>.sorting_3,table.dataTable.order-column.stripe tbody>tr.even.selected>.sorting_3{background-color:#afbdd8}table.dataTable.display tbody>tr.odd>.selected,table.dataTable.order-column.stripe tbody>tr.odd>.selected{background-color:#a6b4cd}table.dataTable.display tbody>tr.even>.selected,table.dataTable.order-column.stripe tbody>tr.even>.selected{background-color:#acbad5}table.dataTable.display tbody>tr.selected:hover>.sorting_1,table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_1{background-color:#a2aec7}table.dataTable.display tbody>tr.selected:hover>.sorting_2,table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_2{background-color:#a3b0c9}table.dataTable.display tbody>tr.selected:hover>.sorting_3,table.dataTable.order-column.hover tbody>tr.selected:hover>.sorting_3{background-color:#a5b2cb}table.dataTable.display tbody>tr:hover>.selected,table.dataTable.display tbody>tr>.selected:hover,table.dataTable.order-column.hover tbody>tr:hover>.selected,table.dataTable.order-column.hover tbody>tr>.selected:hover{background-color:#a2aec7}table.dataTable tbody td.select-checkbox,table.dataTable tbody th.select-checkbox{position:relative}table.dataTable tbody td.select-checkbox:before,table.dataTable tbody td.select-checkbox:after,table.dataTable tbody th.select-checkbox:before,table.dataTable tbody th.select-checkbox:after{display:block;position:absolute;top:1.2em;left:50%;width:12px;height:12px;box-sizing:border-box}table.dataTable tbody td.select-checkbox:before,table.dataTable tbody th.select-checkbox:before{content:" ";margin-top:-6px;margin-left:-6px;border:1px solid black;border-radius:3px}table.dataTable tr.selected td.select-checkbox:after,table.dataTable tr.selected th.select-checkbox:after{content:"✓";font-size:20px;margin-top:-19px;margin-left:-6px;text-align:center;text-shadow:1px 1px #b0bed9,-1px -1px #b0bed9,1px -1px #b0bed9,-1px 1px #b0bed9}table.dataTable.compact tbody td.select-checkbox:before,table.dataTable.compact tbody th.select-checkbox:before{margin-top:-12px}table.dataTable.compact tr.selected td.select-checkbox:after,table.dataTable.compact tr.selected th.select-checkbox:after{margin-top:-16px}div.dataTables_wrapper span.select-info,div.dataTables_wrapper span.select-item{margin-left:.5em}@media screen and (max-width: 640px){div.dataTables_wrapper span.select-info,div.dataTables_wrapper span.select-item{margin-left:0;display:block}}

@keyframes dtb-spinner{100%{transform:rotate(360deg)}}@-o-keyframes dtb-spinner{100%{-o-transform:rotate(360deg);transform:rotate(360deg)}}@-ms-keyframes dtb-spinner{100%{-ms-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes dtb-spinner{100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-moz-keyframes dtb-spinner{100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}div.dt-button-info{position:fixed;top:50%;left:50%;width:400px;margin-top:-100px;margin-left:-200px;background-color:white;border:2px solid #111;box-shadow:3px 3px 8px rgba(0, 0, 0, 0.3);border-radius:3px;text-align:center;z-index:21}div.dt-button-info h2{padding:.5em;margin:0;font-weight:normal;border-bottom:1px solid #ddd;background-color:#f3f3f3}div.dt-button-info>div{padding:1em}div.dt-button-collection-title{text-align:center;padding:.3em 0 .5em;font-size:.9em}div.dt-button-collection-title:empty{display:none}button.dt-button,div.dt-button,a.dt-button,input.dt-button{position:relative;display:inline-block;box-sizing:border-box;margin-right:.333em;margin-bottom:.333em;padding:.5em 1em;border:1px solid rgba(0, 0, 0, 0.3);border-radius:2px;cursor:pointer;font-size:.88em;line-height:1.6em;color:black;white-space:nowrap;overflow:hidden;background-color:rgba(0, 0, 0, 0.1);background:-webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="rgba(230, 230, 230, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)");-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;text-decoration:none;outline:none;text-overflow:ellipsis}button.dt-button.disabled,div.dt-button.disabled,a.dt-button.disabled,input.dt-button.disabled{cursor:default;opacity:.4}button.dt-button:active:not(.disabled),button.dt-button.active:not(.disabled),div.dt-button:active:not(.disabled),div.dt-button.active:not(.disabled),a.dt-button:active:not(.disabled),a.dt-button.active:not(.disabled),input.dt-button:active:not(.disabled),input.dt-button.active:not(.disabled){background-color:rgba(0, 0, 0, 0.1);background:-webkit-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-moz-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-ms-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-o-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:linear-gradient(to bottom, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="rgba(179, 179, 179, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)");box-shadow:inset 1px 1px 3px #999}button.dt-button:active:not(.disabled):hover:not(.disabled),button.dt-button.active:not(.disabled):hover:not(.disabled),div.dt-button:active:not(.disabled):hover:not(.disabled),div.dt-button.active:not(.disabled):hover:not(.disabled),a.dt-button:active:not(.disabled):hover:not(.disabled),a.dt-button.active:not(.disabled):hover:not(.disabled),input.dt-button:active:not(.disabled):hover:not(.disabled),input.dt-button.active:not(.disabled):hover:not(.disabled){box-shadow:inset 1px 1px 3px #999;background-color:rgba(0, 0, 0, 0.1);background:-webkit-linear-gradient(top, rgba(128, 128, 128, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-moz-linear-gradient(top, rgba(128, 128, 128, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-ms-linear-gradient(top, rgba(128, 128, 128, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-o-linear-gradient(top, rgba(128, 128, 128, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:linear-gradient(to bottom, rgba(128, 128, 128, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="rgba(128, 128, 128, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)")}button.dt-button:hover,div.dt-button:hover,a.dt-button:hover,input.dt-button:hover{text-decoration:none}button.dt-button:hover:not(.disabled),div.dt-button:hover:not(.disabled),a.dt-button:hover:not(.disabled),input.dt-button:hover:not(.disabled){border:1px solid #666;background-color:rgba(0, 0, 0, 0.1);background:-webkit-linear-gradient(top, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-moz-linear-gradient(top, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-ms-linear-gradient(top, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:-o-linear-gradient(top, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);background:linear-gradient(to bottom, rgba(153, 153, 153, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="rgba(153, 153, 153, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)")}button.dt-button:focus:not(.disabled),div.dt-button:focus:not(.disabled),a.dt-button:focus:not(.disabled),input.dt-button:focus:not(.disabled){border:1px solid #426c9e;text-shadow:0 1px 0 #c4def1;outline:none;background-color:#79ace9;background:-webkit-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);background:-moz-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);background:-ms-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);background:-o-linear-gradient(top, #d1e2f7 0%, #79ace9 100%);background:linear-gradient(to bottom, #d1e2f7 0%, #79ace9 100%);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="#d1e2f7", EndColorStr="#79ace9")}.dt-button embed{outline:none}div.dt-buttons{position:relative;float:left}div.dt-buttons.buttons-right{float:right}div.dataTables_layout_cell div.dt-buttons{float:none}div.dataTables_layout_cell div.dt-buttons.buttons-right{float:none}div.dt-button-collection{position:absolute;top:0;left:0;width:150px;margin-top:3px;padding:8px 8px 4px 8px;border:1px solid #ccc;border:1px solid rgba(0, 0, 0, 0.4);background-color:white;overflow:hidden;z-index:2002;border-radius:5px;box-shadow:3px 3px 5px rgba(0, 0, 0, 0.3);box-sizing:border-box}div.dt-button-collection button.dt-button,div.dt-button-collection div.dt-button,div.dt-button-collection a.dt-button{position:relative;left:0;right:0;width:100%;display:block;float:none;margin-bottom:4px;margin-right:0}div.dt-button-collection button.dt-button:active:not(.disabled),div.dt-button-collection button.dt-button.active:not(.disabled),div.dt-button-collection div.dt-button:active:not(.disabled),div.dt-button-collection div.dt-button.active:not(.disabled),div.dt-button-collection a.dt-button:active:not(.disabled),div.dt-button-collection a.dt-button.active:not(.disabled){background-color:#dadada;background:-webkit-linear-gradient(top, #f0f0f0 0%, #dadada 100%);background:-moz-linear-gradient(top, #f0f0f0 0%, #dadada 100%);background:-ms-linear-gradient(top, #f0f0f0 0%, #dadada 100%);background:-o-linear-gradient(top, #f0f0f0 0%, #dadada 100%);background:linear-gradient(to bottom, #f0f0f0 0%, #dadada 100%);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr="#f0f0f0", EndColorStr="#dadada");box-shadow:inset 1px 1px 3px #666}div.dt-button-collection.fixed{position:fixed;top:50%;left:50%;margin-left:-75px;border-radius:0}div.dt-button-collection.fixed.two-column{margin-left:-200px}div.dt-button-collection.fixed.three-column{margin-left:-225px}div.dt-button-collection.fixed.four-column{margin-left:-300px}div.dt-button-collection>:last-child{display:block !important;-webkit-column-gap:8px;-moz-column-gap:8px;-ms-column-gap:8px;-o-column-gap:8px;column-gap:8px}div.dt-button-collection>:last-child>*{-webkit-column-break-inside:avoid;break-inside:avoid}div.dt-button-collection.two-column{width:400px}div.dt-button-collection.two-column>:last-child{padding-bottom:1px;-webkit-column-count:2;-moz-column-count:2;-ms-column-count:2;-o-column-count:2;column-count:2}div.dt-button-collection.three-column{width:450px}div.dt-button-collection.three-column>:last-child{padding-bottom:1px;-webkit-column-count:3;-moz-column-count:3;-ms-column-count:3;-o-column-count:3;column-count:3}div.dt-button-collection.four-column{width:600px}div.dt-button-collection.four-column>:last-child{padding-bottom:1px;-webkit-column-count:4;-moz-column-count:4;-ms-column-count:4;-o-column-count:4;column-count:4}div.dt-button-collection .dt-button{border-radius:0}div.dt-button-background{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0, 0, 0, 0.7);background:-ms-radial-gradient(center, ellipse farthest-corner, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);background:-moz-radial-gradient(center, ellipse farthest-corner, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);background:-o-radial-gradient(center, ellipse farthest-corner, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);background:-webkit-gradient(radial, center center, 0, center center, 497, color-stop(0, rgba(0, 0, 0, 0.3)), color-stop(1, rgba(0, 0, 0, 0.7)));background:-webkit-radial-gradient(center, ellipse farthest-corner, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);background:radial-gradient(ellipse farthest-corner at center, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);z-index:2001}@media screen and (max-width: 640px){div.dt-buttons{float:none !important;text-align:center}}button.dt-button.processing,div.dt-button.processing,a.dt-button.processing{color:rgba(0, 0, 0, 0.2)}button.dt-button.processing:after,div.dt-button.processing:after,a.dt-button.processing:after{position:absolute;top:50%;left:50%;width:16px;height:16px;margin:-8px 0 0 -8px;box-sizing:border-box;display:block;content:" ";border:2px solid #282828;border-radius:50%;border-left-color:transparent;border-right-color:transparent;animation:dtb-spinner 1500ms infinite linear;-o-animation:dtb-spinner 1500ms infinite linear;-ms-animation:dtb-spinner 1500ms infinite linear;-webkit-animation:dtb-spinner 1500ms infinite linear;-moz-animation:dtb-spinner 1500ms infinite linear}


</style>

@endsection