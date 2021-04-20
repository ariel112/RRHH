<div class="page-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

    <!-- Page Content -->
    <div class="content container-fluid">


        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title"> </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Empleados</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee" ><i class="fa fa-plus"></i>Registrar Nuevo Empleado</a>
                    <div class="view-icons">
                        <a href="employees.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="employees-list.html" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @livewire('empleado.empleado-card')
    </div>
    <!-- /Page Content -->

    <!-- Crear Empleado Modal -->
    <div id="add_employee" class="modal custom-modal fade " role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Expediente de empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group needs-validation" id="formEmpleado" novalidate>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input name="idUser" type="text" value="{{ Auth::user()->id }}" style="display: none">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header rounded"><h3 class="card-header text-primary text-center">Información personal</h3></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="form-label">Primer Nombre<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="primer_nombre" name="primer_nombre" type="text" required>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Segundo Nombre</label>
                                                    <input class="form-control" id="segundo_nombre" name="segundo_nombre" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Primer Apellido<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="primer_apellido" name="primer_apellido"type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Segundo Apellido<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="segundo_apellido" name="segundo_apellido" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Fecha de Nacimiento<span class="text-danger">*</span></label>
                                                    <input class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" type="date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Num. Identidad<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="identidad" name="identidad" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">RTN<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="rtn" name="rtn" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Lugar Nacimiento<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Grado Académico<span class="text-danger">*</span></label>
                                                    <select class="custom-select" id="grado_academico_id" name="grado_academico_id">
                                                        <option selected value="">Seleccione </option>
                                                        <option value="1">PRIMARIA</option>
                                                        <option value="2">SECUNDARIA</option>
                                                        <option value="3">UNIVERSIDAD COMPLETA</option>
                                                        <option value="4">UNIVERSIDAD INCOMPLETA</option>
                                                        <option value="5">POSTGRADO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label">Profesión<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="profesion" name="profesion" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label ">Estado Civil<span class="text-danger">*</span></label>
                                                    <select class="custom-select" required id="estado_civil" name="estado_civil">
                                                        <option selected value="">Seleccione </option>
                                                        <option value="SOLTERO(a)">SOLTERO(a)</option>
                                                        <option value="CASADO(a)">CASADO(a)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="col-form-label ">Género<span class="text-danger">*</span></label>
                                                    <select class="custom-select" required id="genero" name="genero">
                                                        <option selected value="">Seleccione </option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-primary text-center">Localización</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Departamento<span class="text-danger">*</span></label>
                                                    <select class="custom-select" id="select_deptos_pais" name="select_deptos_pais" onchange="selectValor()">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Municipio<span class="text-danger">*</span></label>
                                                    <select class="custom-select" id="municipio_id" name="municipio_id">
                                                        <option value="" selected >Seleccione Municipio</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Numero de casa<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="numero_casa" name="numero_casa" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Direccion de casa<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="descripcion" name="descripcion" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-primary text-center">Contácto</h3>
                                    </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="email" name="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Correo Institucional</label>
                                                        <input class="form-control" id="email_institucional" name="email_institucional" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Telefono Principal<span class="text-danger">*</span></label>
                                                        <input class="form-control" id="telefono_1" name="telefono_1" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Telefono Secundario</label>
                                                        <input class="form-control" id="telefono_2" name="telefono_2" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-14">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-primary text-center">Gerencial</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Departamento<span class="text-danger">*</span></label>
                                                    <select class="custom-select" id="selectDeptos_Modal" name="selectDeptos_Modal" onchange="selectValor_Deptosmodal()"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Area<span class="text-danger">*</span></label>
                                                    <select class="custom-select" id="select_area_Moral" name="select_area_Moral" onchange="selectValor_Areamodal()"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Cargo<span class="text-danger">*</span></label>
                                                    <select class="custom-select" id="cargo_id" name="cargo_id"></select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Fecha de Ingreso<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="fecha_ingreso" name="fecha_ingreso" type="date">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Estatus <span class="text-danger">*</span></label>

                                                    <select class="custom-select" id="estatus_id" name="estatus_id">
                                                        <option selected="selected"  value="">Seleccione Estado</option>
                                                        <option value="1">ACTIVO</option>
                                                        <option value="2">INACTIVO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Sueldo<span class="text-danger">*</span></label>
                                                    <input class="form-control" id="sueldo" name="sueldo" type="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Descripción Laboral<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="descripcion_laboral" name="descripcion_laboral" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <strong><b><h2>Referencia Personal</h2></b></strong>
                            <hr>
                            <div class="col-sm-14">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header">
                                        <h3 class="card-header text-secondary text-center">Datos de referencia</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Nombre Completo<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="nombre_referencia" name="nombre_referencia" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Identidad<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="identidad_referencia" name="identidad_referencia" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Telefono<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="telefono_referencia" name="telefono_referencia"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Correo<span class="text-danger">*</span></label>
                                                    <input class="form-control " id="email_referencia" name="email_referencia" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Parentezco<span class="text-danger">*</span></label>
                                                    <select name="parentezco_referencia" id="parentezco_referencia">
                                                        <option selected value="">Seleccione</option>
                                                        <option value="PADRE">Padre</option>
                                                        <option value="MADRE">Madre</option>
                                                        <option value="ESPOSO(A)">Esposo(a)</option>
                                                        <option value="HERMANO(A)">Hermano(a)</option>
                                                        <option value="HIJO(O)">Hijo(a)</option>
                                                        <option value="HIJASTRO(A)">Hijastro(a)</option>
                                                        <option value="ABUELO(A)">Abuelo(a)</option>
                                                        <option value="SUEGRO(A)">Suegro(a)</option>
                                                        <option value="NIETO(A)">Nieto(a)</option>
                                                        <option value="SOBRINO(A)">Sobrino(a)</option>
                                                        <option value="NUERA/YERNO">Nuera/Yerno</option>
                                                        <option value="PADRINO/MADRINA">Padrino/Madrina</option>
                                                        <option value="CUÑADO">Cuñado(a)</option>
                                                        <option value="TIO(A)">Tio(a)</option>
                                                        <option value="PRIMO(A)">Primo(a)</option>
                                                        <option value="AMIGO(A)">Amigo(a)</option>
                                                        <option value="VECINO">Vecino</option>
                                                        <option value="COMPADRE/COMADRE">Compadre/comadre</option>
                                                        <option value="COMPAÑERO DE TRABAJO">Compañero de trabajo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Dirección<span class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="direccion_referencia" name="direccion_referencia" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-success" type="submit" id="btnGuardarEmpleado" onclick="validacion()">Agregar al Sistema</button>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script>
        var  idE  = document.getElementById("identidad");
        var  imE = new Inputmask("9999-9999-99999");
        Idr = imE.mask(idE);

        var  idER  = document.getElementById("identidad_referencia");
        var  imER = new Inputmask("9999-9999-99999");
        IdrR = imER.mask(idER);
        /* ------------Departamentos y municipios------------------- */
        function cargoDeptos_pais(data){
            var html_select_deptos_pais ='<option selected="selected">Seleccione Depto.</option>';
            for (var i=0; i<data.length; ++i){
                html_select_deptos_pais += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#select_deptos_pais').html(html_select_deptos_pais)
        }
        (status)();

        function status(){
            $.ajax({
                type:"GET",
                url: "/empleado/deptos_pais",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    cargoDeptos_pais(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function selectValor(){
            var idDepto = document.getElementById("select_deptos_pais").value;
            cargoMunicipio(idDepto);
        }

        function cargoMunicipio(idDepto){
            $.ajax({
                type:"GET",
                url: "/empleado/municipio/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    renderMunicipio(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderMunicipio(data){
            var html_select_municipio ='<option selected="selected">Seleccione Municipio</option>';
            for (var i=0; i<data.length; ++i){
                html_select_municipio += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#municipio_id').html(html_select_municipio)
        }
        /* ---------------------------------------------------------------------- */

        /* ------------------------Guardar Empleados------------------------------- */

        function guardarEmpleado(){
            event.preventDefault();
            var data = new FormData($('#formEmpleado').get(0));
            $.ajax({
                type:"POST",
                url: "/empleado/guardar",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    /* var info = $.parseJSON(data);
                    console.log(info); */
                    $('#formEmpleado').trigger("reset");
                    $('#add_employee').modal('hide');
                    Swal.fire({
                    icon: 'success',
                    text: 'Guardado con éxito!',
                    timer: 1500
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            })

        }

        function validacion(){
            var primer_nombre = $('#primer_nombre').val();
            var primer_apellido = $('#primer_apellido').val();
            var segundo_apellido = $('#segundo_apellido').val();
            var fecha_nacimiento = $('#fecha_nacimiento').val();
            var genero = $('#genero').val();
            var identidad = $('#identidad').val();
            var rtn = $('#rtn').val();
            var lugar_nacimiento = $('#lugar_nacimiento').val();
            var grado_academico_id = $('#grado_academico_id').val();
            var estado_civil = $('#estado_civil').val();
            var select_deptos_pais = $('#select_deptos_pais').val();
            var municipio_id = $('#municipio_id').val();
            var email = $('#email').val();
            var numero_casa = $('#numero_casa').val();
            var email_institucional = $('#email_institucional').val();
            var telefono_1 = $('#telefono_1').val();
            var telefono_2 = $('#telefono_2').val();
            var selectDeptos_Modal = $('#selectDeptos_Modal').val();
            var select_area_Moral = $('#select_area_Moral').val();
            var cargo_id = $('#cargo_id').val();
            var fecha_ingreso = $('#fecha_ingreso').val();
            var estatus_id = $('#estatus_id').val();
            var sueldo = $('#sueldo').val();
            var descripcion_laboral = $('#descripcion_laboral').val();
            var profesion = $('#profesion').val();
            if(/_/g.test(identidad)){
                let identidad = document.getElementById('identidad');
                identidad.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad completa',
                    timer: 1000
                })
                event.preventDefault();
            }else if(primer_nombre.length == 0){
                let primer_nombre = document.getElementById('primer_nombre');
                primer_nombre.className = 'form-control is-invalid';

                    Swal.fire({
                    icon: 'warning',
                    text: 'Debe escribir un nombre',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(profesion.length == 0){
                let profesion = document.getElementById('profesion');
                profesion.className = 'form-control is-invalid';

                    Swal.fire({
                    icon: 'warning',
                    text: 'Debe escribir un nombre',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(genero == ""){
                let genero = document.getElementById('genero');
                genero.className = 'form-control is-invalid';
                    Swal.fire({
                    icon: 'warning',
                    text: 'Debe escribir un genero',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(primer_apellido.length == 0){
                let primer_apellido = document.getElementById('primer_apellido');
                primer_apellido.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe escribir el primer apellido',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(segundo_apellido.length == 0){
                let segundo_apellido = document.getElementById('segundo_apellido');
                segundo_apellido.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe escribir el segundo apellido',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(fecha_nacimiento.length == 0){
                let fecha_nacimiento = document.getElementById('fecha_nacimiento');
                fecha_nacimiento.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una fecha de nacimiento',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(identidad.length == 0){

                let identidad = document.getElementById('identidad');
                identidad.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar número de identidad',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(rtn.length == 0){

                let rtn = document.getElementById('rtn');
                rtn.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar RTN',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(lugar_nacimiento.length == 0){

                let lugar_nacimiento = document.getElementById('lugar_nacimiento');
                lugar_nacimiento.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Lugar de nacimiento',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(grado_academico_id == ""){

                let grado_academico_id = document.getElementById('grado_academico_id');
                grado_academico_id.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Grado academico',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(estado_civil.length == 0){

                let estado_civil = document.getElementById('estado_civil');
                estado_civil.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Estado civil',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(select_deptos_pais == ""){

                let select_deptos_pais = document.getElementById('select_deptos_pais');
                select_deptos_pais.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar departamento de pais',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(municipio_id == ""){

                let municipio_id = document.getElementById('municipio_id');
                municipio_id.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Municipio',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(email.length == 0){

                let email = document.getElementById('email');
                email.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un correo electrónico',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(telefono_1.length == 0){

                let telefono_1 = document.getElementById('telefono_1');
                telefono_1.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe ingresar un número telefónico',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(selectDeptos_Modal == ""){

                let selectDeptos_Modal = document.getElementById('selectDeptos_Modal');
                selectDeptos_Modal.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Depto. de Trabajo',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(select_area_Moral == ""){

                let select_area_Moral = document.getElementById('select_area_Moral');
                select_area_Moral.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Area de Trabajo',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(cargo_id.length == ""){

                let cargo_id = document.getElementById('cargo_id');
                cargo_id.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Cargo',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(fecha_ingreso.length == 0){

                let fecha_ingreso = document.getElementById('fecha_ingreso');
                fecha_ingreso.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar fecha de inicio del colaborador',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(estatus_id == ""){

                let estatus_id = document.getElementById('estatus_id');
                estatus_id.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Estado del colaborador',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(sueldo.length == 0){

                let sueldo = document.getElementById('sueldo');
                sueldo.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar Sueld bruto',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(descripcion_laboral.length == 0){

                let descripcion_laboral = document.getElementById('descripcion_laboral');
                descripcion_laboral.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una descripcion de experiencia laboral',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(nombre_referencia.length == 0){

                let nombre_referencia = document.getElementById('nombre_referencia');
                nombre_referencia.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un nombre de referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(identidad_referencia.length == 0){

                let identidad_referencia = document.getElementById('identidad_referencia');
                identidad_referencia.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(/_/g.test(identidad_referencia)){
                let identidad_referencia = document.getElementById('identidad_referencia');
                identidad_referencia.className = 'form-control is-invalid';
                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar la identidad completa de la referencia',
                    timer: 1000
                })
                event.preventDefault();
            }else if(telefono_referencia.length == 0){

                let telefono_referencia = document.getElementById('telefono_referencia');
                telefono_referencia.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un teléfono de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(email_referencia.length == 0){

                let email_referencia = document.getElementById('email_referencia');
                email_referencia.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una correo electrónico de la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(parentezco_referencia == ""){

                let parentezco_referencia = document.getElementById('parentezco_referencia');
                parentezco_referencia.className = 'form-control is-invalid';

                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar un parentezco en la referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else if(direccion_referencia.length == 0){
                let direccion_referencia = document.getElementById('direccion_referencia');
                direccion_referencia.className = 'form-control is-invalid';


                Swal.fire({
                    icon: 'warning',
                    text: 'Debe indicar una direccion de referencia',
                    timer: 1000
                    })
                    event.preventDefault();
            }else{
                let primer_nombre = document.getElementById('primer_nombre');
                primer_nombre.className = 'form-control is-valid';

                let segundo_apellido = document.getElementById('segundo_apellido');
                segundo_apellido.className = 'form-control is-valid';

                let fecha_nacimiento = document.getElementById('fecha_nacimiento');
                fecha_nacimiento.className = 'form-control is-valid';

                let identidad = document.getElementById('identidad');
                identidad.className = 'form-control is-valid';

                let rtn = document.getElementById('rtn');
                rtn.className = 'form-control is-valid';

                let lugar_nacimiento = document.getElementById('lugar_nacimiento');
                lugar_nacimiento.className = 'form-control is-valid';

                let grado_academico_id = document.getElementById('grado_academico_id');
                grado_academico_id.className = 'form-control is-valid';

                let estado_civil = document.getElementById('estado_civil');
                estado_civil.className = 'form-control is-valid';

                let select_deptos_pais = document.getElementById('select_deptos_pais');
                select_deptos_pais.className = 'form-control is-valid';

                let municipio_id = document.getElementById('municipio_id');
                municipio_id.className = 'form-control is-valid';

                let email = document.getElementById('email');
                email.className = 'form-control is-valid';

                let telefono_1 = document.getElementById('telefono_1');
                telefono_1.className = 'form-control is-valid';

                let selectDeptos_Modal = document.getElementById('selectDeptos_Modal');
                selectDeptos_Modal.className = 'form-control is-valid';

                let select_area_Moral = document.getElementById('select_area_Moral');
                select_area_Moral.className = 'form-control is-valid';

                let cargo_id = document.getElementById('cargo_id');
                cargo_id.className = 'form-control is-valid';

                let fecha_ingreso = document.getElementById('fecha_ingreso');
                fecha_ingreso.className = 'form-control is-valid';

                let estatus_id = document.getElementById('estatus_id');
                estatus_id.className = 'form-control is-valid';

                let sueldo = document.getElementById('sueldo');
                sueldo.className = 'form-control is-valid';

                let descripcion_laboral = document.getElementById('descripcion_laboral');
                descripcion_laboral.className = 'form-control is-valid';

                let nombre_referencia = document.getElementById('nombre_referencia');
                nombre_referencia.className = 'form-control is-valid';

                let identidad_referencia = document.getElementById('identidad_referencia');
                identidad_referencia.className = 'form-control is-valid';

                let telefono_referencia = document.getElementById('telefono_referencia');
                telefono_referencia.className = 'form-control is-valid';

                let email_referencia = document.getElementById('email_referencia');
                email_referencia.className = 'form-control is-valid';

                let parentezco_referencia = document.getElementById('parentezco_referencia');
                parentezco_referencia.className = 'form-control is-valid';

                let direccion_referencia = document.getElementById('direccion_referencia');
                direccion_referencia.className = 'form-control is-valid';
                (guardarEmpleado)();
            }

        }

        /* ------------------------------------------------------------------------- */

        /* --------------------------Departamentos Gerenciales---------------------------- */
        (cargaDeptos)();

        function renderDeptosModal(data){
            var html_select_deptosModal ='<option selected="selected" value="">Seleccione Departamento</option>';
            for (var i=0; i<data.length; ++i){
                html_select_deptosModal += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#selectDeptos_Modal').html(html_select_deptosModal)
        }

        function cargaDeptos(){
            $.ajax({
                type:"GET",
                url: "/empleado/deptos",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    renderDeptosModal(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
        function selectValor_Deptosmodal(){
            var idDepto = document.getElementById("selectDeptos_Modal").value;
            cargoAreas(idDepto);
        }

        function cargoAreas(idDepto){
            $.ajax({
                type:"GET",
                url: "/empleado/area/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    renderAreas(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderAreas(data){
            var html_select_Areas ='<option selected="selected" value="">Seleccione Area de depto.</option>';
            for (var i=0; i<data.length; ++i){
                html_select_Areas += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#select_area_Moral').html(html_select_Areas)
        }

        function selectValor_Areamodal(){
            var idArea = document.getElementById("select_area_Moral").value;
            cargoCargos(idArea);
        }

        function cargoCargos(idArea){
            $.ajax({
                type:"GET",
                url: "/empleado/cargo/"+idArea,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    /* console.log(data); */
                    renderCargos(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderCargos(data){
            var html_select_cargos ='<option selected="selected" value="">Seleccione Area de depto.</option>';
            for (var i=0; i<data.length; ++i){
                html_select_cargos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#cargo_id').html(html_select_cargos)
        }

        /* --------------------------/Departamentos Gerenciales---------------------------- */
    </script>
</div>

