<div class="page-wrapper">


    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">

               <!-----Tabla de empleados----->
               <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table id="matrizAsistencia" class="table animate__animated animate__bounceInUp" style="width:100%">
                        <thead class="table-dark">
                            <tr>

                                <th class="font-weight-bold">Entrada</th>
                                <th class="font-weight-bold">Salida</th>
                                <th class="font-weight-bold">Minutos Tarde</th>
                                <th class="font-weight-bold">Monto de deduccion</th>

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
</div>

@section('script')



<script>
    $(document).ready(MatrizAsistencia);

    function MatrizAsistencia() {
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
       // var events = $('#events');
        var table = $('#matrizAsistencia').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
            },
            "paging": false,

            ajax: "/matriz/empleado/asistencia",

            columns: [{
                    data: "entrada",
                    name: "entrada"
                },
                {
                    data: "salida",
                    name: "salida"
                },
                {
                    data: "minutos_tarde",
                    name: "minutos_tarde"
                },
                {
                    data: "monto_deduccion",
                    name: "monto_deduccion"
                },
                // { data: "acciones",  name: "seleccionar",  },
            ],



        });
    }
</script>

@endsection
