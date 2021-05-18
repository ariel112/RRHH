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
                    <table id="tablaEmpleadosSalidas" class="table table-striped custom-table mb-0 ">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Nombre empleado</th>
                                <th class="font-weight-bold">Identidad</th>
                                <th class="font-weight-bold">Departamento</th>
                                <th class="font-weight-bold">Seleccionar</th>

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

<script>
$(document).ready(tablaListaEmpleados);

function tablaListaEmpleados() {
    $("#tablaEmpleadosSalidas").DataTable({
        ajax: "/listar/empleados/medio/dia",
        paging: false,
        processing: true,
        serverSide: true,
        columns: [
            { data: "nombre", name: "nombre" },
            { data: "identidad", name: "identidad" },
            { data: "departamento", name: "departamento" },          
            { data: "acciones",  name: "acciones",  orderable: false,  searchable: false,  },
        ],
    });
}

</script>

@endsection