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
                    <table class="table table-striped custom-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th class="text-center"> <b>DEDUCCIÓN</b> </th>
                                <th class="text-center"> <b>RANGO INICIO</b> </th>
                                <th class="text-center"> <b>RANGO FINAL</b> </th>
                                <th class="text-center"> <b>PORCENTAJE</b> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="holiday-upcoming">
                                <td>1</td>
                                <td class="text-center">imagen.jpg</td>
                                <td class="text-center">IHSS</td>
                                <td class="text-center">Lps. 13,550.00</td>
                                <td class="text-center">Lps. 19,700.00</td>
                                <td class="text-center">2.5 %</td>
                            </tr>
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
								<form id="formDeduccionesGenerales" data-parsley-validate>
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
									<div class="form-group">
										<label>Nombre<span class="text-danger">*</span></label>
										<input class="form-control" required type="text" id="nombre_deduccion" name="nombre_deduccion">
									</div>
                                    <div class="form-group">
										<label>Porcentaje<span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="porcentaje_techo" name="porcentaje_techo">
									</div>
                                    <div class="form-group">
										<label>Rango de inicio<span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="rangoInicio_techo" name="rangoInicio_techo">
									</div>
                                    <div class="form-group">
										<label>Rango FInal<span class="text-danger">*</span></label>
										<input class="form-control" type="text" id="rangoFinal_techo" name="rangoFinal_techo">
									</div>
									<div class="submit-section">
										<button class="btn btn-success submit-btn"  onclick="agregarDeduccion_general()">Crear</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add deducción -->

				<!-- Edit Holiday Modal -->
				<div class="modal custom-modal fade" id="edit_holiday" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Holiday</h5>
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
        $('#formDeduccionesGenerales').submit(function(e){
            e.preventDefault();
            var data = new FormData($('#formDeduccionesGenerales').get(0));
            console.log(data);
        });

       function agregarDeduccion_general(){
        event.preventDefault();
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
