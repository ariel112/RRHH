<div class="page-wrapper">
    <div  class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Marcaje de colaboradores</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a >Dashboard</a></li>
                        <li class="breadcrumb-item active">Marcaje</li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- /Page Header -->
        <div class="card shadow p-3 mb-5 bg-primary rounded"style="opacity: 60%;">
            <div class="card-body " style="padding: auto">
                <div class="date " >
                    <h1 style="color:white;">
                    <span id="weekDay" class="weekDay"></span>
                    <span id="day" class="day"></span>
                    <span id="month" class="month"></span>
                    <span id="year" class="year"></span>
                    </h1>
                </div>
                <div class="clock">
                    <h1 style="color:white;">
                    <span id="hours" class="hours"></span> :
                    <span id="minutes" class="minutes"></span> :
                    <span id="seconds" class="seconds"></span>
                    </h1>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table animate__animated animate__bounceInUp" id="tblMarcaje">
                        <thead class="table-dark">
                            <tr>
                                <th> <b>ID</b> </th>
                                <th> <b>NOMBRE</b> </th>
                                <th> <b>IDENTIDAD</b>  </th>
                                <th> <b>ENTRADA</b>  </th>
                                <th> <b>SALIDA</b>  </th>
                                <th> <b>INSERTAR</b>  </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <div id="insertar_asistencia" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">A??adir Asistencia a             <h5 id="nombreEmp" class="modal-title text-success"> </h5></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formInsertAsistencia" data-parsley-validate >
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Seleccione hora:</label>
                                    <input type="time" id="hora_fecha" name="hora_fecha" class="form-control" required>
                                    <input type="hidden" id="idEmpleado_input" name="idEmpleado_input">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn btn-block">Insertar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@section('script')
    <script>
        $('#tblMarcaje').DataTable({
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"??ltimo",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",},
            "serverSide": true,
            processing: true,
            "autoWidth": false,
            "ajax": "/marcaje/listar",
            "columns": [
                {data:'id'},
                {data:'nombre'},
                {data:'identidad'},
                {data:'entradas'},
                {data:'salidas'},
                {data:'insertar'}

        ]});
        $('#formInsertAsistencia').submit(function (e) {
            e.preventDefault();
            insertAsistencia();
            /* var data = new FormData($('#formInsertAsistencia').get(0));
            var object = {};
            data.forEach(function(value, key){
                object[key] = value;
            });
            var json = JSON.stringify(object);
            console.log(json); */
        });

        function insertAsistencia(){
            var data = new FormData($('#formInsertAsistencia').get(0));
            $.ajax({
                type:"POST",
                url: "/marcar/insertar",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formInsertAsistencia').trigger("reset");
                    $('#insertar_asistencia').modal('hide');
                    $('#tblMarcaje').DataTable().ajax.reload();
                    Swal.fire({
                        icon: 'success',
                        text: 'Registro exitoso!',
                        timer: 1500
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

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
                    /* $("#btnSalida_Emp_"+idEmpleado).button('dispose'); */
                    /* $("#btnSalida_Emp_"+idEmpleado).addClass("disabled"); */
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Entrada marcada con ??xito!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $("#btnEntrada_Emp_"+idEmpleado).fadeOut();
                    /*$('div.row > div').removeClass('active'); */
                    $("#tblMarcaje").DataTable().ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function marcarSalida(idEmpleado, nombre){
            /* $.ajax({
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
                    title: 'Salida marcada con ??xito!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                    $("#btnSalida_Emp_"+idEmpleado).fadeOut();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            }); */
            Swal.fire({
                title: '??Confirme salida de '  +nombre+'?',
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
                                title: 'Salida marcada con ??xito!',
                                showConfirmButton: false,
                                timer: 1500
                                })
                                $("#btnSalida_Emp_"+idEmpleado).fadeOut();
                                $("#tblMarcaje").DataTable().ajax.reload();
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
                    'Mi??rcoles',
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

        function abrirModalInsertar(idEmpleado, nombre){
            /* console.log(idEmpleado+ ' Nombre: '+nombre); */
            $('#nombreEmp').html(' '+nombre);
            $('#idEmpleado_input').val(idEmpleado);

            $("#insertar_asistencia").modal("show");
        }
    </script>

@endsection
