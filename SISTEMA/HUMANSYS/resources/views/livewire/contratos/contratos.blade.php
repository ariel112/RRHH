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
                                <th>Numero de Memo</th>
                                <th>Empleado</th>
                                <th>Inicio contrato</th>
                                <th>Fin contrato</th>
                                <th>Meses</th>
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
        <div class="col-sm-6">
            <div class="form-group">
                <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                <input wire:model="searchNombre" type="text" class="form-control floating" placeholder="Nombre del colaborador">
                {{-- <select class="js-data-example-ajax" wire:model="searchNombre" style="width: 350px; height:40px;" name="empleado_id"> --}}
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
        </div>
    </div>
    <!-- /Page Content -->




    <!-- Add Employee Modal -->
    <div id="crear_contratos" class="modal custom-modal fade" role="dialog" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear contratos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_contrato">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label"># Contrato <span class="text-danger">*</span></label>
                                    <input class="form-control" name="num_contrato" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Gerente de Talento Humano</label>
                                    <select class="select" name="empleado_rrhh" id="empleado_rrhh">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"># delegación <span class="text-danger">*</span></label>
                                    <input class="form-control"  type="text">
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-form-label">Fecha de contrato <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input class="form-control floating datetimepicker" type="text" name="fecha_inicio">
                                                </div>
                                                <label class="focus-label">Inicio de contrato <span class="text-danger" >*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input class="form-control floating datetimepicker" type="text" name="fecha_fin">
                                                </div>
                                                <label class="focus-label">Fin de contrato <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Días de vaciones <span class="text-danger">*</span></label>
                                    <select class="select" name="vacaciones">
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
                                <div class="form-group">
                                    <label class="col-form-label focus-label">Colaborador <span class="text-danger">*</span></label>
                                    <input wire:model="searchNombre" type="text" class="form-control floating" placeholder="Nombre del colaborador">
                                    {{-- <select class="js-data-example-ajax" wire:model="searchNombre" style="width: 350px; height:40px;" name="empleado_id"> --}}
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
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Identidad <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="0705199400130" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Sueldo <span class="text-danger">*</span></label>
                                    <input class="form-control" name="sueldo" type="text" value="15000 LPS">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gerencia <span class="text-danger">*</span></label>
                                    <select class="select" disabled>
                                        <option>Administración</option>
                                        <option>Operaciones</option>
                                        <option>Comunicaciones</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Cargo </label>
                                    <input class="form-control" type="text" value="Adminstrador de sistemas" disabled>
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
    </div>
    <!-- /Add Employee Modal -->



</div>

@section('script')


<script>
  $(document).ready(function() {


    $('.js-data-example-ajax').select2({
        ajax: {
            url: '/empleado_contrato',
            processResults: function (data) {
            // Transforms the top-level key of the response object from 'items' to 'results'
            console.log(data[0].nombre);

            return {
                results: data.nombre.items
            };
            }
        }
});


 $('#crearcontrato').click(function (e) {
     e.preventDefault();
     guardar();
 });

    function guardar() {
    // console.log('datos: ', $("#idPic").serialize());

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
        console.log(data);
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









});
</script>
@endsection
