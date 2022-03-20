<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between">



            <div class="mb-4 ">

                <div class="d-flex mb-2" style="width:20rem">
                    <label for="fechaInicio" class="mt-2 w-100">Fecha de Inicio</label>
                    <input id="fechaInicioAsistencia" type="date" class="form-control">
                </div>

                <div class=" d-flex mb-2" style="width:20rem">
                    <label for="fechaFinal" class="mt-2 w-100">Fecha Final</label>
                    <input id="fechaFinalAsistencia" type="date" class="form-control">
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary " onclick="listarPorFechas()">Solicitar</button>

                </div>

            </div>


            <div>
                <button type="button" class="btn btn-success " onclick="descargarExcel()">Descargar </button>
            </div>



        </div>


        <!-----Tabla de empleados----->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="asistenciaGeneral" class="table animate__animated animate__bounceInUp" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="font-weight-bold">CODIGO EMPLEADO</th>
                                <th class="font-weight-bold">IDENTIDAD</th>
                                <th class="font-weight-bold">NOMBRE</th>
                                <th class="font-weight-bold">DEPARTAMENTO</th>
                                <th class="font-weight-bold">FEECHA_DIA</th>
                                <th class="font-weight-bold">HORA ENTRADA</th>
                                <th class="font-weight-bold">HORA SALIDA</th>
                                <th class="font-weight-bold">MINUTOS TARDE</th>
                                <th class="font-weight-bold">MINUTOS ANTES</th>
                                <th class="font-weight-bold">MINUTOS EXTRA</th>
                                <th class="font-weight-bold">SALIDA/ENTRADA MEDIO DIA</th>
                                <th class="font-weight-bold">PERMISO SOLICITADO</th>

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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="auto-centrar">
  <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
  </div>
 
  </div>
</div>

    </div>
</div>



@section("script")
<script src="{{ asset('assets/js/asistencia/asistenciaGeneral.js') }}"></script>
@endsection