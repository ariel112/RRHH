<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Nóminas de Sueldos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Planilla</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Page Content -->
        <div class="content container-fluid">
            <div class=" animate__animated animate__fadeInUpBig" style="margin:auto; opacity:80%;">
                <div class="card shadow p-3 mb-5 bg-white rounded border border-info" style="opacity:80%;">
                    <div class="card-header">
                        <h5 class="card-title">Planilla Catorcenal</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div>
                                <div class="form-group row">
                                    <label for="namePlanilla" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namePlanilla">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fechaInicioPlanilla" class="col-sm-2 col-form-label">Fecha de inicio</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="fechaInicioPlanilla" placeholder="Seleccione una fecha de inicio">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fechaFinalPlanilla" class="col-sm-2 col-form-label">Fecha de finalizacion</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="fechaFinalPlanilla" placeholder="Seleccione una fecha de final">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="radio" name="planillaRadio" id="radios1" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Con deducciones
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="planillaRadio" id="radios2" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                    Sin deducciones
                                    </label>
                                </div>
                            </div>

                                <button type="button" class="btn btn-success btn-block mt-4" onclick="ejecutarPlanilla()">Generar</button>
                        </form>
                    </div>
                </div>
            </div>


            <!--tabla ajuste salarial-->




            <!-- Modal -->
            <div class="modal fade" id="ajuste" tabindex="-1" role="dialog" aria-labelledby="ajuste" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ajuste">Ajuste salarial</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea agregar ajuste salarial?</p>
                            <div>
                                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">SI</button>
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">NO</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section("script")
<script src="{{ asset('assets/js/planilla/planilla.js') }}"></script>
@endsection
