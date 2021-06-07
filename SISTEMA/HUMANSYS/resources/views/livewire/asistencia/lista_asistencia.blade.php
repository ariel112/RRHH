<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">

            <table class="table animate__animated animate__bounceInUp" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th>Empleado</th>
                        @for ($i =1 ; $i <=$fin ; $i++)
                            <th>{{ $i }}</th>
                        @endfor
                    </tr>
                </thead class="table-dark">
                <tbody>
                    @foreach ($matriz as $ma )
                            <tr>
                                <td>
                                    <h2 class="table-avatar">
                                        <a class="avatar avatar-xs"><img alt="" src="assets/img/user.jpg"></a>
                                        <a>{{ $ma['nombre'] }}</a>
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
                </tbody>
            </table>
        </div>
    </div>
{{--     {{ $matriz->links() }} --}}
</div>

