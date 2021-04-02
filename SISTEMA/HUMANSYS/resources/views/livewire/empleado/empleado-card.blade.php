<div>
    <div class="row filter-row">
     {{--    <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input wire:model="searchIdentidad" type="text" id="identidad" name="identidad" class="form-control floating">
                <label class="focus-label">Número de identidad</label>
            </div>
        </div> --}}
        <div class="col-sm-6 col-md-6">
            <div class="form-group form-focus">
                <input wire:model="searchNombre" type="text" id="nombre" name="nombre" class="form-control floating">
                <label class="focus-label">Busqueda de empleado por nombre/Identidad</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <select class="select floating" id="selectDeptos" name="selectDeptos"></select>
                <label class="focus-label">Departamento</label>
            </div>
        </div>
{{--         <div class="col-sm-4 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Buscar </a>
        </div> --}}
    </div>
    <div class="row staff-grid-row">
        @if($empleados->count())
            @foreach($empleados as $empleado)
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="{{ route('empleado.perfil',$empleado->id) }}" class="avatar" {{-- onclick="enviarId({{$empleado->id}})" --}}><img src="assets/img/user.jpg" alt="" ></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('empleado.perfil',$empleado->id) }}" {{-- data-toggle="modal" data-target="#edit_employee" --}}><i class="fa fa-pencil m-r-5"></i>Editar/Eliminar</a>
                                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a> --}}
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{ route('empleado.perfil',$empleado->id) }}">{{ $empleado->nombre }}</a></h4>
                        <div class="small text-muted">{{ $empleado->email }}</div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                No se encuentran resultados para {{$searchNombre}}
            </div>
        @endif
        
    </div>

    <script>
       /*  function enviarId(idEmpleado){
            $.ajax({
                type:"GET",
                url: "/empleado/deptos",
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    renderDeptos(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });


        } */
        (cargaDeptos)()

        function renderDeptos(data){
            var html_select_deptos ='<option selected="selected">Buscar por Departamentos</option>';
            for (var i=0; i<data.length; ++i){
                html_select_deptos += '<option value="'+data[i].id+'" ">'+data[i].nombre+'</option>';
                }
            $('#selectDeptos').html(html_select_deptos);
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
                    console.log(data);
                    renderDeptos(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                }
            });
        }
    </script>




    {{ $empleados->links() }}
</div>
