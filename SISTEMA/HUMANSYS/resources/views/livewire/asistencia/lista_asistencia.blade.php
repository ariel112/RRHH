<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table table-nowrap mb-0">
                <thead>
                    <tr>
                        <th>Empleado</th>
                    @for ($i =1 ; $i <=$fin ; $i++)
                        <th>{{ $i }}</th>
                    @endfor
                   
                        
                        
                    </tr>
                </thead>
                <tbody>
                 
                    @foreach ($matriz as $ma )
                        <tr>
                            <td>
                                <h2 class="table-avatar">
                                    <a class="avatar avatar-xs" href="profile.html"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                    <a href="profile.html">{{ $ma['nombre'] }}</a>
                                </h2>
                            </td>
                            @foreach ($ma['dia'] as $dia )
                                
                            <td>
                                @if($dia['asistencia']==1)
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                @else
                                <i class="fa fa-close text-danger"></i> 
                                @endif
                            </td>
                            @endforeach
                           
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td>
                            <h2 class="table-avatar">
                                <a class="avatar avatar-xs" href="profile.html"><img alt="" src="assets/img/profiles/avatar-09.jpg"></a>
                                <a href="profile.html">John Doe</a>
                            </h2>
                        </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td>
                            <div class="half-day">
                                <span class="first-off"><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></span> 
                                <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                            </div>
                        </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><i class="fa fa-close text-danger"></i> </td>
                        <td><i class="fa fa-close text-danger"></i> </td>
                        <td><i class="fa fa-close text-danger"></i> </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><i class="fa fa-close text-danger"></i> </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td>
                            <div class="half-day">
                                <span class="first-off"><i class="fa fa-close text-danger"></i></span> 
                                <span class="first-off"><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></span>
                            </div>
                        </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><i class="fa fa-close text-danger"></i> </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><i class="fa fa-close text-danger"></i> </td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                        <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                    </tr> --}}
                    
                   
                </tbody>
            </table>
        </div>
    </div>
</div>