<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Asistencia</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Asistencia</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-4 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" wire:model="searchNombre" class="form-control floating">
                    <label class="focus-label">Empleado</label>
                </div>
            </div>

            {{-- formulario para buscar  --}}
            <form  action="/asistencia/lista" method="POST">
            <div class="row">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="col-sm-9 col-md-9">
                    <div class="form-group form-focus select-focus">
                        <input type="MONTH" name="fecha" class="form-control">
                        <label class="focus-label">Seleccione la fecha</label>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <button id="generarasistencia" class="btn btn-success "> <i class="fa fa-search"></i> </button>

                </div>
            </div>
            </form>
            {{-- formulario para buscar  --}}

        </div>
        <!-- /Search Filter -->

        {{-- liveware  --}}
        @livewire('asistencia.lista-asistencia')


    </div>
    <!-- /Page Content -->

    <!-- Attendance Modal -->
    <div class="modal custom-modal fade" id="attendance_info" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información de asistencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card punch-status">
                                <div class="card-body">
                                    <h5 class="card-title">Tiempo <small class="text-muted">11 Mar 2019</small></h5>
                                    <div class="punch-det">
                                        <h6>Hora de entrada:</h6>
                                        <p>Miercoles, 11 de Mar 2021 8:12 AM</p>
                                    </div>
                                    <div class="punch-info">
                                        <div class="punch-hours">
                                            <span>7.9 hrs</span>
                                        </div>
                                    </div>
                                    <div class="punch-det">
                                        <h6>Hora de salida</h6>
                                        <p>Miercoles, 20 de Marzo 2021 4:58 PM</p>
                                    </div>
                                    <div class="statistics">
                                        <div class="row">
                                            <div class="col-md-6 col-6 text-center">
                                                <div class="stats-box">
                                                    <p>Break</p>
                                                    <h6>1 hrs</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 text-center">
                                                <div class="stats-box">
                                                    <p>Tiempo extra</p>
                                                    <h6>0 hrs</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card recent-activity">
                                <div class="card-body">
                                    <h5 class="card-title">Actividad</h5>
                                    <ul class="res-activity-list">
                                        <li>
                                            <p class="mb-0">Entrada</p>
                                            <p class="res-activity-time">
                                                <i class="fa fa-clock-o"></i>
                                                08:00 AM.
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0">Salida</p>
                                            <p class="res-activity-time">
                                                <i class="fa fa-clock-o"></i>
                                                05:00 PM.
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0">Permisos</p>
                                            <p class="res-activity-time">
                                                <i class="fa fa-clock-o"></i>
                                                11.15 AM.
                                            </p>
                                        </li>
                                        <li>
                                            <p class="mb-0">Punch Out at</p>
                                            <p class="res-activity-time">
                                                <i class="fa fa-clock-o"></i>
                                                1.30 PM.
                                            </p>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Attendance Modal -->

</div>

@section('script')
    <script>

 $('#asistencia_form').submit(function (e) {
    //  e.preventDefault();
     buscar();
 });

    function buscar() {
            // var modalID ='crear_contratos'
            var data = new FormData($('#asistencia_form').get(0));
            $.ajax({
            type:"POST",
            url: "/asistencia/lista",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){



                // $('#tbl_contrato').DataTable().ajax.reload();
                // $('#tbl_cargos').DataTable().ajax.reload();
            //  console.log(data);

            },
            error: function (jqXHR, textStatus, errorThrown) {


                console.log(jqXHR, textStatus, errorThrown);
            }
        })
        }


    </script>
@endsection
