<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title"> </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Asistencia</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->


        <div class="card mb-0 ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#" class="avatar"><img alt="" src="../../assets/img/user.jpg"></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{$empleado->nombre}}</h3> <br>
                                            <h5 class="text-muted">Empleado ID: {{$empleado->id}}</h5>
                                            <div class="small doj text-muted"><i class="far fa-id-card"></i>  Identidad: {{$empleado->identidad}}</div> <br>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="date ">
                                            <h1 style="color:#707076;">
                                            <span id="weekDay" class="weekDay"></span>
                                            <span id="day" class="day"></span>
                                            <span id="month" class="month"></span>
                                            <span id="year" class="year"></span>
                                            </h1>
                                        </div>
                                        <div class="clock">
                                            <h1 style="color:#707076;">
                                            <span id="hours" class="hours"></span> :
                                            <span id="minutes" class="minutes"></span> :
                                            <span id="seconds" class="seconds"></span>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="card animate__animated animate__rotateInUpRight" style="opacity: 80%;">
            <div class="card-header">
              <h5>Marcar asistencia </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6" id="btnEntradadiv">
                        @if ($asistencia->conteo == 0)
                            <button id="btnEntradaEmpleado" name="btnEntradaEmpleado" type="button" class="btn btn-success btn-lg btn-block"  onclick="marcarEntrada({{ $empleado->id }})">Marcar Entrada</button>
                        @else
                            <td><i class="fa fa-check text-success"></i></td>
                        @endif
                    </div>
                    <div class="col-6" id="btnSalidadiv">
                        @if ($asisSalida->conteo == 0)
                            @if ($asistencia->conteo == 0)
                            <button disabled id="btnSalidaEmpleado" name="btnSalidaEmpleado" type="button" class="btn btn-warning btn-lg btn-block" onclick="marcarSalida({{ $empleado->id }})">Marcar Salida</button>
                            @else
                            <button id="btnSalidaEmpleado" name="btnSalidaEmpleado" type="button" class="btn btn-warning btn-lg btn-block" onclick="marcarSalida({{ $empleado->id }})">Marcar Salida</button>
                            @endif
                        @else
                            <td><i class="fa fa-check text-success"></i></td>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</div>

@section('script')

    <script>

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
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Entrada marcada con éxito!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#btnEntradaEmpleado").fadeOut();
                    document.getElementById("btnEntradadiv").innerHTML='<td><i class="fa fa-check text-success"></i></td>';
                    document.getElementById("btnSalidadiv").innerHTML='';
                    document.getElementById("btnSalidadiv").innerHTML='<button id="btnSalidaEmpleado" name="btnSalidaEmpleado" type="button" class="btn btn-warning btn-lg btn-block" onclick="marcarSalida({{ $empleado->id }})">Marcar Salida</button>'
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function marcarSalida(idEmpleado){
            Swal.fire({
                title: '¿Seguro quiere marcar su salida?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Confirmo`,
                }).then((result) => {
                    if (result.isConfirmed) {
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
                                $("#btnSalidaEmpleado").fadeOut();
                                document.getElementById("btnSalidadiv").innerHTML='<td><i class="fa fa-check text-success"></i></td>';
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR, textStatus, errorThrown);
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire('Salida no marcada', '', 'info')
                    }
            })
        }




            var udateTime = function() {
                    let currentDate = new Date(),
                        hours = currentDate.getHours(),
                        minutes = currentDate.getMinutes(),
                        seconds = currentDate.getSeconds(),
                        weekDay = currentDate.getDay(),
                        day = currentDate.getDay(),
                        month = currentDate.getMonth(),
                        year = currentDate.getFullYear();

                    const weekDays = [
                        'Domingo',
                        'Lunes',
                        'Martes',
                        'Miércoles',
                        'Jueves',
                        'Viernes',
                        'Sabado'
                    ];

                    document.getElementById('weekDay').textContent = weekDays[weekDay];
                    /* document.getElementById('day').textContent = day; */

                    const months = [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ];

                    /* document.getElementById('month').textContent = months[month];
                    document.getElementById('year').textContent = year; */

                    document.getElementById('hours').textContent = hours;

                    if (minutes < 10) {
                        minutes = "0" + minutes
                    }

                    if (seconds < 10) {
                        seconds = "0" + seconds
                    }

                    document.getElementById('minutes').textContent = minutes;
                    document.getElementById('seconds').textContent = seconds;
            };

                udateTime();

                setInterval(udateTime, 1000);
    </script>

@endsection
