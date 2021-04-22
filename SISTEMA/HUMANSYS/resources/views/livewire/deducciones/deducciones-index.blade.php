<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Deducciones</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a >Dashboard</a></li>
                        <li class="breadcrumb-item active">Deducciones</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a  class="btn add-btn text-white" data-toggle="modal" data-target="#add_deduccion" ><i class="fa fa-plus"></i>crear deducción</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="deducciones">
                        <thead>
                            <tr>
                                <th> <b>PERFIL</b> </th>
                                <th> <b>NOMBRE</b>  </th>
                                <th class="text-right"> <b>ACCION</b> </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

                <!-- Add deducción -->
				<div class="modal custom-modal fade" id="add_deduccion" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Deducción</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="form-group" id="formDeduccionesGenerales" data-parsley-validate>
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
									<div class="form-group">
										<label>Nombre<span class="text-danger">*</span></label>
										<input class="form-control" required type="text" id="nombre_deduccion" name="nombre_deduccion">
									</div>
                                    <div class="form-group">
										<label>Imagen<span class="text-danger">*</span></label>
										<input class="form-control" required type="text" id="imagen_deduccion" name="imagen_deduccion">
									</div>
									<div class="submit-section">
										<button class="btn btn-success submit-btn"  {{-- onclick="agregarDeduccion_general()" --}}>Crear</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add deducción -->

				<!-- Edit Holiday Modal -->
				<div class="modal custom-modal fade" id="editar_deduc" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Editar deduccion</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>Holiday Name <span class="text-danger">*</span></label>
										<input class="form-control" value="New Year" type="text">
									</div>
									<div class="form-group">
										<label>Holiday Date <span class="text-danger">*</span></label>
										<div class="cal-icon"><input class="form-control datetimepicker" value="01-01-2019" type="text"></div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Holiday Modal -->

				<!-- Delete Holiday Modal -->
				<div class="modal custom-modal fade" id="delete_holiday" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Holiday</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Holiday Modal -->

    </div>
</div>

@section('script')
        <script>
            $('#deducciones').DataTable({
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
        "ajax": "/deducciones_listar",
        "columns": [
            {data:'perfil'},
            {data:'nombre'},
            {data:'action'}
        ]});

        $('#formDeduccionesGenerales').submit(function(e){
            e.preventDefault();
            agregarDeduccion_general();
        });

       function agregarDeduccion_general(){
            var data = new FormData($('#formDeduccionesGenerales').get(0));
            $.ajax({
                type:"POST",
                url: "/deducciones/guardar",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                dataType:"json",
                success: function(data){
                    console.log(data);
                    $('#formDeduccionesGenerales').trigger("reset");
                    $('#add_deduccion').modal('hide');
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
    </script>
@endsection
