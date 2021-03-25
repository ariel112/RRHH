<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Cargos</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cargos</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a  class="btn add-btn text-white" data-toggle="modal" data-target="#crear_cargos" ><i class="fa fa-plus"></i> Crear cargo</a>
                </div>
            </div>
        </div>
        
        <!-- /Page Header -->
{{--         
        <!-- Search Filter -->
        <div class="row filter-row">
          
        </div>
        <!-- /Search Filter -->
         --}}
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="tbl_cargos">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Cargo</th>
                                <th>Area</th>
                                <th>Gerencia</th>
                                <th>Funciones</th>
                                {{-- <th>Estatus</th> --}}
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>1</td>
                                <td><a href="invoice-view.html">#INV-0001</a></td>
                                <td>Global Technologies</td>
                                <td>11 Mar 2019</td>
                                <td>17 Mar 2019</td>
                                <td>$2099</td>
                                <td><span class="badge bg-inverse-success">Activos</span></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                            <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> Ver</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-file-pdf-o m-r-5"></i> Descargar</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->




    <!-- Add Employee Modal -->
    <div id="crear_cargos" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_contrato">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gerencia</label>
                                    <select class="select" name="empleado_rrhh" id="selectDeptos" onchange="selectValor()">
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Area <span class="text-danger">*</span></label>
                                    <select class="select" name="area" id="area">
                                        <option selected value="">Selecione el area</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Tipo empleado<span class="text-danger">*</span></label>
                                    <select class="select" name="tipo_empleado" id="tipo_empleado">
                                        <option selected value="">Seleccione el tipo</option>
                                        <option value="1">Trabajador</option>
                                        <option value="2">Patrono</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre del cargo <span class="text-danger">*</span></label>
                                    <input class="form-control" id="cargo" name="cargo" type="text">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Funciones del cargo <span class="text-danger">*</span></label>
                                     <br>

                                    <span id="add_field" value="adicionar" class="btn btn-success"><i class="fa fa-plus text-white"></i></span>
                                    <br>
                                    <div id="listas" class="mt-1">
                                        <div class="">
                                            {{-- <div class="input-group mb-3" >
                                                <span  class="input-group-text reducir_input">1.</span>
                                                <input type="text" class="form-control reducir_input"  aria-label="Funciones del empleado" name="funciones[]">
                                                 <span class="input-group-text">.00</span> 
                                              </div> --}}
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                       
                        <div >
                            <button id="crearcargo" class="btn btn-primary submit-btn">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Employee Modal -->

    {{-- ventana modal edit cargos --}}
    <div id="editar_cargos" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning"><i class="fa fa-edit"></i> Editar Cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_contrato_edit">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="row">
                            <input type="text" style="display: none;" name="id_cargo" id="id_cargo">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gerencia</label>
                                    <select class="select" name="empleado_rrhh" id="selectDeptos_edit" onchange="selectValor_edit()">
                                      <option value="">Seleccione la gerenica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Area <span class="text-danger">*</span></label>
                                    <select class="select" name="area" id="area_edit">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Tipo empleado<span class="text-danger">*</span></label>
                                    <select class="select" name="tipo_empleado" id="tipo_empleado_edit">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre del cargo <span class="text-danger">*</span></label>
                                    <input class="form-control" name="cargo_nombre" type="text" id="cargo_edit">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Funciones del cargo <span class="text-danger">*</span></label>
                                     <br>

                                    <span id="add_field_edit" value="adicionar" class="btn btn-success"><i class="fa fa-plus text-white"></i></span>
                                    <br>
                                    <div id="listas_edit" class="mt-1">
                                        <div id="area_funciones" class="">
                                           
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                       
                        <div class="text-center" >
                            <button id="edit_cargo" class="btn btn-warning submit-btn text-white text-center">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  Fin ventana modal edit cargos --}}

    {{-- VENTANA MODAL CARGOS --}}
    <div id="vw_cargos" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Cargo</h5>
                    <button type="button" class="close bg-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gerencia <span class="text-danger">*</span></label>
                                    <input class="form-control"  id="vwgerencia" type="text" disabled>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Area <span class="text-danger">*</span></label>
                                    <input class="form-control"  id="vwarea" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Tipo empleado<span class="text-danger">*</span></label>
                                    <input class="form-control"  id="vw_empleado" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre del cargo <span class="text-danger">*</span></label>
                                    <input class="form-control"  id="vwcargo" type="text" disabled>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <td colspan="8" class="text-center">
                                        <h4>Funciones del cargo:</h4>                                           
                                        <div id="areafunciones" class="grade-span">
                                            
                                        </div>
                                    </td>
                                </div>
                            </div>
                      
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- FIN DE VENTANA MODAL CARGOS --}}
    
</div>

@section('script')



<script>



$('#tbl_cargos').DataTable({
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
    "ajax": "/cargos/listar",
    "columns": [
        {data:'cargo'},
        {data:'area'},
        {data:'gerencia'},
        {data:'funciones'},
        {data:'action'}
    ]});


function CierraPopup(modal) {
    $("#"+modal).modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }


  $(document).ready(function() {


    


// funcion para cerra modal
function CierraPopup(modal) {
    $("#"+modal).modal('hide');//ocultamos el modal
    $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
    $('.modal-backdrop').remove();//eliminamos el backdrop del modal
  }
// fin de funcion para cerrar modal



// para adicionar funciones del colaborador

var campos_max = 16;   //max de 10 campos



        var x = 2;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas').append('<div class="input-group mb-3 mt-1 reducir_input"><span class="input-group-text reducir_input"><b>i.</b></span>\
                                <input type="text" class="form-control reducir_input" name="funciones[]" aria-label="Funciones del empleado">\
                                <span class="input-group-text bg-danger reducir_input"><a  class="remover_campo btn btn-danger reducir_input"><i class="fa fa-minus fa-1x text-white reducir_input"></i></a></span></div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent().parent('div').remove();
                x--;
        });




  


 $('#crearcargo').click(function (e) { 
    e.preventDefault();
  
     guardar();
 });

    function guardar() {  
    // console.log('datos: ', $("#idPic").serialize());
          var modalID = 'crear_cargos';
            var data = new FormData($('#form_contrato').get(0));
            $.ajax({
            type:"POST",
            url: "/cargos/guardar",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){  
                // $('#form_contrato').reset();
                // document.getElementById("form_contrato").reset();
                
               
             cargaDeptos();
               
              $('#area').empty();
              $('#cargo').val('');
              $('#listas').html('');
                
              CierraPopup(modalID);
              alert();
              $('#tbl_cargos').DataTable().ajax.reload();
    
            },
            error: function (jqXHR, textStatus, errorThrown) {
        
            
                console.log(jqXHR, textStatus, errorThrown);
            }
        })
        }

 



function cargo(data){
     var html_select =' <option selected value="" disabled >Seleccione la gerencia</option>';
     for (var i=0; i<data.length; ++i)
       html_select += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'
      
       $('#empleado_rrhh').html(html_select)
 }

// cargo la gerencia

 (cargaDeptos)();

function renderDeptos(data){
    var html_select_deptos ='<option value="" selected>Seleccione la gerencia</option>';
    for (var i=0; i<data.length; ++i){
        html_select_deptos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
        }
    $('#selectDeptos').html(html_select_deptos)
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
            // console.log(data);
            renderDeptos(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        }
    });
}
// fin de la gerencia








// =============================================================================



// funcion alerta todo bien
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



// edito los cargos
function editar() {  
    // console.log('datos: ', $("#idPic").serialize());
          var modalID = 'editar_cargos';
            var data = new FormData($('#form_contrato_edit').get(0));
            $.ajax({
            type:"POST",
            url: "/cargos/edit",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            dataType:"json",
            success: function(data){  
                // $('#form_contrato').reset();
                // document.getElementById("form_contrato").reset();

                $('#tbl_cargos').DataTable().ajax.reload();
              CierraPopup(modalID);
              alert_edit();
            
    
            },
            error: function (jqXHR, textStatus, errorThrown) {
        
            
                console.log(jqXHR, textStatus, errorThrown);
            }
        })
        }




        
 $('#edit_cargo').click(function (e) { 
    e.preventDefault();
    editar();
 });
// fin edito los cargos
// =============================================================================





});






// listo las areas
function selectValor(){
            var idDepto = document.getElementById("selectDeptos").value;
            cargoarea(idDepto);
        }


        function cargoarea(idDepto){
            $.ajax({
                type:"GET",
                url: "/area/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    // console.log(data);
                    renderarea(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderarea(data){
            var html_select_municipio ='<option selected="selected">Seleccione area</option>';
            for (var i=0; i<data.length; ++i){
                html_select_municipio += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#area').html(html_select_municipio)
        }
// fin de las areas


// inicio para listar los cargos
function setcargo(id){
          
            cargoarea_vista(id);
        }


        function cargoarea_vista(id){
            $.ajax({
                type:"GET",
                url: "/cargos/muestra/"+id,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    // console.log(data.funciones[0].nombre);
                     vistafunciones(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function vistafunciones(data){
             $('#vwcargo').val(data.cargo[0].cargo);
             $('#vwgerencia').val(data.cargo[0].gerencia);
             $('#vwarea').val(data.cargo[0].area);
             $('#vw_empleado').val(data.cargo[0].tipo_empleado);
             



            var funciones = '' ;
                i= 0;
                data.funciones.forEach(dat => {
                    i++;
                    funciones += '<span class="badge bg-inverse-success mt-1">i.'+dat.nombre+' </span> <br>';
                });
            $('#areafunciones').html(funciones)
        }

// 


// editar cargos

function editcargo(id){
          
          cargoarea_edit(id);
        
      }


      function cargoarea_edit(id){
          $.ajax({
              type:"GET",
              url: "/cargos/muestra/"+id,
              contentType: false,
              cache: false,
              processData:false,
              dataType:"json",
              success: function(data){
                  // console.log(data.funciones[0].nombre);
                   vistafunciones_edit(data);
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  console.log(jqXHR, textStatus, errorThrown);
              }
          });
      }

      function vistafunciones_edit(data){

        //   console.log(data.cargo[0].gerencia);
           $('#cargo_edit').val(data.cargo[0].cargo);
           $('#vw_empleado').val(data.cargo[0].tipo_empleado);
           $('#id_cargo').val(data.cargo[0].id_cargo);

    //   llamo a la funcion listar funciones
    listarfunciones(data.funciones);

            //    listo gerencias
            id_gerencia = data.cargo[0].id_gerencia;
            
                $.ajax({
                    type:"GET",
                    url: "/empleado/deptos",
                    contentType: false,
                    cache: false,
                    processData:false,
                    dataType:"json",
                    success: function(data){
                         
                        renderDeptos_edit(data, id_gerencia);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
         
        // fin gerencias
        id_area = data.cargo[0].id_area;
      
        $.ajax({
                type:"GET",
                url: "/area/"+id_gerencia,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    // console.log(id_area);
                    //  console.log(data);
                    renderarea_edit_dinamic(data, id_area);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });

        
         
        // areas

        // fin areas


        // pinto tipo empleado
        id_empleado_tipo = data.cargo[0].id_empleado_tipo;
        var tipo_array = data.tipo_empleado;
            tipo_empleado= '';

            for (var i=0; i<tipo_array.length; ++i){
                if (tipo_array[i].id=== id_empleado_tipo) {
                    tipo_empleado += '<option selected="selected" value="'+tipo_array[i].id+'" ">'+tipo_array[i].nombre+'</option>';
                } else {
                    tipo_empleado += '<option value="'+tipo_array[i].id+'" ">'+tipo_array[i].nombre+'</option>';
                }

                }
            $('#tipo_empleado_edit').html(tipo_empleado)
         
        // fin tipo empleado


          var funciones = '' ;
              i= 0;
              data.funciones.forEach(dat => {
                  i++;
                  funciones += '<span class="badge bg-inverse-success mt-1">i.'+dat.nombre+' </span> <br>';
              });
          $('#areafunciones').html(funciones)
          
      }



    //   listar areas

    function renderarea_edit_dinamic(data, id){
        areas= '';
            for (var i=0; i<data.length; ++i){
                if (data[i].id=== id) {
                    areas += '<option selected="selected" value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                } else {
                    areas += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }

                }
            $('#area_edit').html(areas)
        }
    // fin listar areas



        function renderDeptos_edit(data, id){
            html_select_deptos = '';
            for (var i=0; i<data.length; ++i){
                if (data[i].id=== id) {
                    html_select_deptos += '<option selected="selected" value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                } else {
                    html_select_deptos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }

                }
            $('#selectDeptos_edit').html(html_select_deptos)
        }



        // listo las areas
function selectValor_edit_area(){
            var idDepto = document.getElementById("selectDeptos_edit").value;
            cargoarea_edit_area(idDepto);
        }


        function cargoarea_edit_area(idDepto){
            $.ajax({
                type:"GET",
                url: "/area/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    // console.log(data);
                    renderarea(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderarea_edit(data){
            var html_select_municipio ='<option selected="selected">Seleccione area</option>';
            for (var i=0; i<data.length; ++i){
                html_select_municipio += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#area_edit').html(html_select_municipio)
        }
// fin de las areas



// mostrar departamentos editar


// listo las areas
function selectValor_edit(){
            var idDepto = document.getElementById("selectDeptos_edit").value;
            cargoarea_edit_t(idDepto);
        }


        function cargoarea_edit_t(idDepto){
            $.ajax({
                type:"GET",
                url: "/area/"+idDepto,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    // console.log(data);
                    renderarea_t(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }

        function renderarea_t(data){
            var html_select_municipio ='<option selected="selected">Seleccione area</option>';
            for (var i=0; i<data.length; ++i){
                html_select_municipio += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#area_edit').html(html_select_municipio)
        }
// fin de las areas




// fin editar cargos






//  funciones del empleado
 function listarfunciones(data){
    var list_fun ='';
 for (var i=0; i<data.length; ++i){
     list_fun += '<div id="fun'+data[i].id+'" class="input-group mb-3"><span  class="input-group-text reducir_input">i.</span><input value="'+data[i].nombre+'" type="text" class="form-control reducir_input"  aria-label="Funciones del empleado" name="funciones[]"><a  class="btn bg-danger text-white"> <i onclick="eliminar_funciones('+data[i].id+')" class="fa fa-trash"></i></a> </div>'
   
     }

 $('#area_funciones').html(list_fun);
 


 // aumentar funciones edit

 var campos_max_edit = 16;   //max de 10 campos



var x = data.length;
$('#add_field_edit').click (function(e) {
        e.preventDefault();     //prevenir novos clicks
        if (x < campos_max_edit) {
                $('#listas_edit').append('<div class="input-group mb-3 mt-1 reducir_input"><span class="input-group-text reducir_input"><b>'+x+'.</b></span>\
                        <input type="text" class="form-control reducir_input" name="funciones[]" aria-label="Funciones del empleado">\
                        <span class="input-group-text bg-danger reducir_input"><a  class="remover_campo btn btn-danger reducir_input"><i class="fa fa-minus fa-1x text-white reducir_input"></i></a></span></div>');
                x++;
        }
});
// Remover o div anterior
$('#listas_edit').on("click",".remover_campo",function(e) {
        e.preventDefault();
        $(this).parent().parent('div').remove();
        x--;
});

// fin aumentar funciones edit


}


//  fin funciones del empleado


// ================================ DELETE ====================================
// eliminar funciones 

function eliminar_funciones(id){
            $.ajax({
                type:"GET",
                url: "/cargos/funciones/eliminar/"+id,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                 
                    $('fun'+data.id_data).hidden();

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }



// fin eliminar funciones





</script>
@endsection