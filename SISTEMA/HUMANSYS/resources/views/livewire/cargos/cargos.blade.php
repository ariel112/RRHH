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
                    <a href="create-invoice.html" class="btn add-btn" data-toggle="modal" data-target="#crear_cargos" ><i class="fa fa-plus"></i> Crear cargo</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">  
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">Desde</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">A</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3"> 
                <div class="form-group form-focus select-focus">
                    <select class="select floating"> 
                        <option>Selecione estatus</option>
                        <option>Activos</option>
                        <option>Inactivos</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">  
                <a href="#" class="btn btn-success btn-block"> Buscar </a>  
            </div>     
        </div>
        <!-- /Search Filter -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cargo</th>
                                <th>Area</th>
                                <th>Departamento</th>
                                <th>Estatus</th>
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="invoice-view.html">#INV-0002</a></td>
                                <td>Delta Infotech</td>
                                <td>11 Mar 2019</td>
                                <td>17 Mar 2019</td>
                                <td>$2099</td>
                                <td><span class="badge bg-inverse-danger">Vencidos</span></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                            <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> Vista</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-file-pdf-o m-r-5"></i> Descargas</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                           
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
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Tipo empleado<span class="text-danger">*</span></label>
                                    <select class="select" name="tipo_empleado" id="tipo_empleado">
                                        <option value=""></option>
                                        <option value="1">Trabajador</option>
                                        <option value="2">Patrono</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="col-form-label">Nombre del cargo <span class="text-danger">*</span></label>
                                    <input class="form-control" name="num_contrato" type="text">
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
                                            <div class="input-group mb-3" >
                                                <span  class="input-group-text reducir_input">1.</span>
                                                <input type="text" class="form-control reducir_input"  aria-label="Funciones del empleado" name="funciones[]">
                                                {{-- <span class="input-group-text">.00</span> --}}
                                              </div>
                                            
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

    
    
</div>

@section('script')


<script>
  $(document).ready(function() {

// para adicionar funciones del colaborador

var campos_max          = 16;   //max de 10 campos



        var x = 2;
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        $('#listas').append('<div class="input-group mb-3 mt-1 reducir_input"><span class="input-group-text reducir_input"><b>'+x+'.</b></span>\
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
            //  console.log(data);
    
            },
            error: function (jqXHR, textStatus, errorThrown) {
        
            
                console.log(jqXHR, textStatus, errorThrown);
            }
        })
        }

 



function cargo(data){
     var html_select =' <option selected value="" disabled >Seleccione el departamento</option>';
     for (var i=0; i<data.length; ++i)
       html_select += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'
      
       $('#empleado_rrhh').html(html_select)
 }



 (cargaDeptos)()

function renderDeptos(data){
    var html_select_deptos ='<option selected="selected">Mostrar por Departamentos</option>';
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




</script>
@endsection