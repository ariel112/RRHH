<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Contratos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contratos</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="create-invoice.html" class="btn add-btn" data-toggle="modal" data-target="#crear_contratos" ><i class="fa fa-plus"></i> Crear Contratos</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tbl_contrato" class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th># Contrato</th>
                                <th>Empleado</th>
                                <th>Inicio contrato</th>
                                <th>Fin contrato</th>
                                <th>Meses</th>
                                <th>Estatus</th>
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                <input wire:model="searchNombre" type="text" class="form-control floating" placeholder="Nombre del colaborador">
                <select class="js-data-example-ajax" wire:model="searchNombre" style="width: 350px; height:40px;" name="empleado_id">
                <select class="select floating custom-select" style="width: 350px; height:40px;" name="empleado_id" >
                    @if ($empleados->count())
                        @foreach($empleados as $empleado)
                            <option style="width: 350px; height:40px;" class="select floating" value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                        @endforeach
                    @else
                        <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                            <option style="width: 350px; height:40px;" class="select floating" >No se encuentran resultados para {{$searchNombre}}</option>
                        </div>
                    @endif
                </select>
            </div>
        </div> --}}
    </div>
    <!-- /Page Content -->




    <!-- Add Employee Modal -->
    <div id="crear_contratos" class="modal custom-modal fade" role="dialog" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Crear contratos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_contrato" data-parsley-validate>
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label"># Contrato <span class="text-danger">*</span></label>
                                    <input required class="form-control" name="num_contrato" id="num_contrato" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gerente de Talento Humano</label>
                                    <select required class="form-control empleado_rrhh" name="empleado_rrhh" id="empleado_rrhh">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"># delegación <span class="text-danger">*</span></label>
                                    <input required class="form-control" name="num_delegacion"  type="text">
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de contrato <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-focus">
                                                 <label for="">Inicio:</label>
                                                    <input required class="form-control" type="date" name="fecha_inicio">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-focus">
                                                    <label for="">Final:</label>
                                                    <input class="form-control" required type="date" name="fecha_fin">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Días de vaciones <span class="text-danger">*</span></label>
                                    <select class="form-control" name="vacaciones" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" wire:ignore wire:key="first">
                                    <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                                    {{-- <input wire:model="searchNombre" type="text" class="form-control floating" placeholder="Nombre del colaborador"> --}}
                                    <select class="js-data-example-ajax form-control" required style="width: 350px; height:40px;" name="empleado_id" id="empleado_id">
                                    {{-- <select class="select floating custom-select" style="width: 350px; height:40px;" name="empleado_id" > --}}
                                        {{--@if ($empleados->count())
                                            @foreach($empleados as $empleado)
                                                <option style="width: 350px; height:40px;" class="select floating" value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                                            @endforeach
                                        @else
                                            <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                                                <option style="width: 350px; height:40px;" class="select floating" >No se encuentran resultados para {{$searchNombre}}</option>
                                            </div>
                                        @endif --}}
                                    {{-- </select> --}}
                                    {{-- <select name="tags[]" class="form-control" multiple="multiple" id="tags"></select> --}}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Identidad <span class="text-danger">*</span></label>
                                    <input class="form-control" id="identidad" name="identidad" type="text" value=""  disabled>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Sueldo <span class="text-danger">*</span></label>
                                    <input class="form-control" required name="sueldo" id="sueldo" type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gerencia<span class="text-danger">*</span></label>
                                    <input class="form-control" name="gerencia" id="gerencia" type="text" value="" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Cargo</label>
                                    <input class="form-control" id="cargo" name="cargo" type="text" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" >
                            <button id="crearcontrato" class="btn btn-success submit-btn">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Employee Modal -->



{{-- edit contratos --}}
 <div id="editar_contratos" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success text-warning"> <i class="fa fa-edit"></i> Editar contratos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_contrato_edit" data-parsley-validate>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="id" id="id_contrato">
                    <div class="row">
                        <div class="col-sm-6"> 
                            <div class="form-group">
                                <label class="col-form-label">Estado del contrato<span class="text-danger">*</span></label>
                                <select required class="form-control" name="estado_contrato" id="estado_contrato">
                                    <option value="Activo"> Activo</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2"> 
                            <div class="form-group">
                                <label class="col-form-label"># Contrato <span class="text-danger">*</span></label>
                                <input required class="form-control" name="num_contrato" id="num_contrato_edit" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Gerente de Talento Humano</label>
                                <select required class="form-control empleado_rrhh" name="empleado_rrhh" id="empleado_rrhh_edit">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"># delegación <span class="text-danger">*</span></label>
                                <input required class="form-control" name="num_delegacion" id="num_delegacion_edit"  type="text">
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="col-form-label">Fecha de contrato <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-focus">
                                             <label for="">Inicio:</label>
                                                <input required class="form-control" type="date" id="fecha_inicio_edit" name="fecha_inicio">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-focus">
                                                <label for="">Final:</label>
                                                <input class="form-control" required id="fecha_final_edit" type="date" name="fecha_fin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Días de vaciones <span class="text-danger">*</span></label>
                                <select class="form-control" name="vacaciones" required id="vacaciones_edit">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" wire:ignore wire:key="first">
                                <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                                <input type="text" id="empleado_id_edit" class="form-control" disabled >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Identidad <span class="text-danger">*</span></label>
                                <input class="form-control" id="identidad_edit" name="identidad" type="text" value=""  disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Sueldo <span class="text-danger">*</span></label>
                                <input class="form-control" required name="sueldo" id="sueldo_edit" type="text" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Gerencia<span class="text-danger">*</span></label>
                                <input class="form-control" name="gerencia" id="gerencia_edit" type="text" value="" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Cargo</label>
                                <input class="form-control" id="cargo_edit" name="cargo" type="text" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="text-center" >
                        <button id="editar_contrato" class="btn btn-warning submit-btn text-white ">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- fin edit contratos --}}


{{-- vista contratos --}}
{{-- edit contratos --}}
{{-- <div id="vw_contratos" class="modal custom-modal fade" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success">Crear contratos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_contrato" data-parsley-validate>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="row">
                        <div class="col-sm-2"> 
                            <div class="form-group">
                                <label class="col-form-label"># Contrato <span class="text-danger">*</span></label>
                                <input required class="form-control" name="num_contrato" id="num_contrato" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Gerente de Talento Humano</label>
                                <select required class="form-control" name="empleado_rrhh" id="empleado_rrhh">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"># delegación <span class="text-danger">*</span></label>
                                <input required class="form-control" name="num_delegacion"  type="text">
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="col-form-label">Fecha de contrato <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-focus">
                                             <label for="">Inicio:</label>
                                                <input required class="form-control" type="date" name="fecha_inicio">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-focus">
                                                <label for="">Final:</label>
                                                <input class="form-control" required type="date" name="fecha_fin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Días de vaciones <span class="text-danger">*</span></label>
                                <select class="form-control" name="vacaciones" required>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" wire:ignore wire:key="first">
                                <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                                <select class="js-data-example-ajax form-control" required style="width: 350px; height:40px;" name="empleado_id" id="empleado_id">
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Identidad <span class="text-danger">*</span></label>
                                <input class="form-control" id="identidad" name="identidad" type="text" value=""  disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Sueldo <span class="text-danger">*</span></label>
                                <input class="form-control" required name="sueldo" id="sueldo" type="text" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Gerencia<span class="text-danger">*</span></label>
                                <input class="form-control" name="gerencia" id="gerencia" type="text" value="" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Cargo</label>
                                <input class="form-control" id="cargo" name="cargo" type="text" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <div >
                        <button id="crearcontrato" class="btn btn-primary submit-btn">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
{{-- fin vista contratos --}}





</div>

@section('script')


<script>





$('#tbl_contrato').DataTable({
"language": {
       "lengthMenu": "Mostrar _MENU_ registros",
       "zeroRecords": "No se encontraron resultados",
       "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
       "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
       "infoFiltered": "(filtrado de un total de _MAX_ registros)",
       "sSearch": "Buscar:",
       "oPaginate": {
           "sFirst": "Primero",
           "sLast":"Último",
           "sNext":"Siguiente",
           "sPrevious": "Anterior"
       },
       "sProcessing":"Procesando...",},
       "serverSide": true,
    processing: true,
    "autoWidth": false,
    "ajax": "/contratos/listar",
    "columns": [
        {data:'num_contrato'},
        {data:'nombre'},
        {data:'fecha_inicio'},
        {data:'fecha_fin'},
        {data:'dif_mes'},
        {data:'item'},
        {data:'action'}
    ]});










    function CierraPopup(modal) {
    $("#"+modal).modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }


  // funcion alerta edit
  function alert_edit(){
                Swal.fire({
            position: 'top-end',
            icon: 'warning',
            title: 'Editado Correctamente',
            showConfirmButton: false,
            timer: 2500
            });
            }
            // 



$(document).ready(function() {

// cerrar modal

function CierraPopup(modal) {
    $("#"+modal).modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }





  
            // funcion alerta todo bien
            function alert_bien(){
                Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '¡Creado Correctamente!',
            showConfirmButton: false,
            timer: 2500
            });
            }
            // 
          



    /* --------------------------------Select Colaborador------------------------- */
    $('#empleado_id').select2({


            ajax: {
                type: 'GET',
                url:'/empleado_contrato',
                processResults: function (data) {
                    /* console.log(data[0].text); */
                    // console.log(data);
                    getEm(data);
                    /* console.log(data[1]); */

                    $('#empleado_id').select2('data')
                    return {
                        results: data
                        };

                }
            }
    }); 

    function getEm(data){
        $("#empleado_id").on("select2:select", function (e) {
            var id_select = $(e.currentTarget).val();
            var inputsueldo = document.getElementById("sueldo");
            var inputIdentidad = document.getElementById("identidad");
            var inputGerencia = document.getElementById("gerencia");
            var inputCargo = document.getElementById("cargo");
                /* inputsueldo.value = data[0].id; */
            for (let i = 0; i < data.length; i++) {
                if(data[i].id == id_select){
                    inputsueldo.value = data[i].sueldo;
                    inputIdentidad.value = data[i].identidad;
                    inputGerencia.value = data[i].depto;
                    inputCargo.value = data[i].nombre;
                }
            }

            // console.log(id_select)
        });
    }


    /* --------------------------------/Select Colaborador------------------------- */




 $('#form_contrato').submit(function (e) { 
     e.preventDefault();
     guardar();
 });

    function guardar() {
    // console.log('datos: ', $("#idPic").serialize());
            var modalID ='crear_contratos'
            var data = new FormData($('#form_contrato').get(0));
            $.ajax({
            type:"POST",
            url: "/contratos/show",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){
                CierraPopup(modalID);
                $('input[type="text"]').val('');
                $('select').empty();
                alert_bien();
                $('#tbl_contrato').DataTable().ajax.reload();
                // $('#tbl_cargos').DataTable().ajax.reload();
            //  console.log(data);

            },
            error: function (jqXHR, textStatus, errorThrown) {


                console.log(jqXHR, textStatus, errorThrown);
            }
        })
        }




// cargo el encargado del componente
(gerente)();

function gerente() {
    // console.log('datos: ', $("#idPic").serialize());


    $.ajax({
    type:"GET",
    url: "/gerente",
    contentType: false,
    cache: false,
    processData:false,
    dataType:"json",
    success: function(data){
        // console.log(data);
        cargo(data);
    },
    error: function (jqXHR, textStatus, errorThrown) {

        console.log(jqXHR, textStatus, errorThrown);
    }
})
}


function cargo(data){
     var html_select =' <option selected value="" disabled >Seleccione el encargado</option>';
     for (var i=0; i<data.length; ++i)
       html_select += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'

       $('#empleado_rrhh').html(html_select)
 }


// edicion de contrato form

 $('#form_contrato_edit').submit(function (e) {
     e.preventDefault();
     editar();
 });


 // edito los contratos post
function editar() {
    // console.log('datos: ', $("#idPic").serialize());
          var modalID = 'editar_contratos';
            var data = new FormData($('#form_contrato_edit').get(0));
            $.ajax({
            type:"POST",
            url: "/contratos/edit",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){



                // $('#form_contrato').reset();
                // document.getElementById("form_contrato").reset();

              CierraPopup(modalID);
              alert_edit();
              $('#tbl_contrato').DataTable().ajax.reload();


            },
            error: function (jqXHR, textStatus, errorThrown) {


                console.log(jqXHR, textStatus, errorThrown);
            }
        })
        }




});



//  =================== editar contratos ===============================
// editar cargos

function editcontrato(id){


$(document).ready(function(){
    contratoarea_edit(id);
});

  }


  function contratoarea_edit(id){
      $.ajax({
          type:"GET",
          url: "/contratos/muestra/"+id,
          contentType: false,
          cache: false,
          processData:false,
          dataType:"json",
          success: function(data){
              // console.log(data.funciones[0].nombre);
            //   console.log(data[0]);

               vistacontrato_edit(data[0]);
          },
          error: function (jqXHR, textStatus, errorThrown) {
              console.log(jqXHR, textStatus, errorThrown);
          }
      });
  }

  function vistacontrato_edit(data){

        $('#num_contrato_edit').val(data.num_contrato);
        $('#num_delegacion_edit').val(data.num_delegacion);
        $('#fecha_inicio_edit').val(data.fecha_inicio);
        $('#fecha_final_edit').val(data.fecha_fin);
        $('#vacaciones_edit').val(data.vacaciones);
        $('#estado_contrato').val(data.estado_contrato);
        $('#sueldo_edit').val(data.sueldo);

        $('#empleado_rrhh_edit').val(data.sueldo);

        $('#empleado_id_edit').val(data.nombre);
        $('#identidad_edit').val(data.identidad);
        $('#gerencia_edit').val(data.gerencia);
        $('#cargo_edit').val(data.cargo);
        $('#id_contrato').val(data.id);

       
        
// llamo el gerente para editarlo
    $.ajax({
    type:"GET",
    url: "/gerente",
    contentType: false,
    cache: false,
    processData:false,
    dataType:"json",
    success: function(data){
        // console.log(data);
        cargo(data, data.empleado_rrhh);
    },
    error: function (jqXHR, textStatus, errorThrown) {

        console.log(jqXHR, textStatus, errorThrown);
    }
})



function cargo(data, id){
    var html_select = '';
     for (var i=0; i<data.length; ++i)
       if(data[i].id=id){
       html_select += '<option selected value="'+data[i].id+'">'+data[i].nombre +'</option>'

       }else{
       html_select += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'

       }

       $('#empleado_rrhh_edit').html(html_select);
 }

  
  }




  



// eliminar contrato

function eliminar_contrato(id){
 
    Swal.fire({
            title: '¿Está seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, borralo!'
            }).then((result) => {
            if (result.isConfirmed) {
              
            //    ajax para eliminar el contrato
                $.ajax({
                    type:"GET",
                    url: "/contratos/elimina/"+id,
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){

                        $('#tbl_contrato').DataTable().ajax.reload();

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
                
                Swal.fire(
                '!Eliminado!',
                'El contrato ha sido eliminado.',
                'success'
                )

            }
            })
            
        }



// fin eliminar contrato




  
  
//  =================== fin editar contratos ===========================



</script>
@endsection
