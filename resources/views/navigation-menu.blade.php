
<div class="main-wrapper">
<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo">
						{{-- <img src="assets/img/logo.png" width="40" height="40" alt=""> --}}
					</a>
                </div>
				<!-- /Logo -->

				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<!-- Header Title -->
                <div class="page-title-box">
                    <div class="row">
                        <div class="col-12"><h3>TALENTO HUMANO BECAS 2020</h3></div>
                        {{-- <div class="col-2"><img class="animate__animated animate__fadeInDown" src="../assets/img/logo-Programa-2020.png" alt=""></div> --}}
                    </div>
                </div>
				<!-- /Header Title -->

				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

				<!-- Header Menu -->
				<ul class="nav user-menu">




					<!-- /Message Notifications -->

					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">

                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                            <span class="user-img mt-3">
                                <img  src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            <span class="status online"></span>
                            </span>

                            @endif


							{{-- <span class="status online"></span> --}}
							</span>
							<span>{{ Auth::user()->name }}</span>
						</a>
                        @php
                        $empleado = DB::SELECTONE("select * from empleado where identidad= '".Auth::user()->identidad."'");
                    @endphp
						<div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('empleado.perfil',$empleado->id) }}">Perfil</a>
							{{-- <a class="dropdown-item" >
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Perfil') }}
                                </x-jet-responsive-nav-link>
                            </a> --}}
							{{-- <a class="dropdown-item" >
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-jet-responsive-nav-link>
                                @endif
                            </a> --}}
							<a class="dropdown-item">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Salir') }}
                                    </x-jet-responsive-nav-link>
                                </form>
                            </a>
						</div>

					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">


                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                            <span class="user-img" style="width:30px; heigth:35px; margin-top:12px;">
                                <img  src="{{ Auth::user()->profile_photo_url }}" style="border-radius:60%;"  />
                            <span class="status online"></span>
                            </span>

                            @endif


							{{-- <span class="status online"></span> --}}
							</span>


					</a>

					<div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('empleado.perfil',$empleado->id) }}">Perfil</a>
						{{-- <a class="dropdown-item" >
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Perfil') }}
                            </x-jet-responsive-nav-link>
                        </a> --}}
						{{-- <a class="dropdown-item" >
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                            @endif
                        </a> --}}
						<a class="dropdown-item" >
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Salir') }}
                                </x-jet-responsive-nav-link>
                            </form>
                        </a>
					</div>
				</div>
				<!-- /Mobile Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Menu</span>
							</li>

                            @if (Auth::user()->id_tipo_user == 1|| Auth::user()->id_tipo_user == 3)
                                <li class="submenu">
                                    <a href="#" ><i class="fas fa-user-check"></i> <span>Usuarios</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">

                                            <li><a href="{{ route('user.users') }}" :active="request()->routeIs('user.users')" >Gestión usuarios</a></li>

                                    </ul>
                                </li>
                            @endif
							<li class="submenu">
								<a href="#" ><i class="fas fa-user-friends"></i> <span> Empleados</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
                                    @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                        <li><a href="{{ route('empleado.index') }}" :active="request()->routeIs('empleado.index')" >Gestión Empleados</a></li>
									    <li><a href="{{ route('cargos.index') }}" :active="request()->routeIs('cargos.index')" >Puestos de trabajo</a></li>
                                        <li><a href="{{ route('empleado.depidos') }}">Despidos</a></li>
                                        @php
                                            $empleado = DB::SELECTONE("select * from empleado where identidad= '".Auth::user()->identidad."'");
                                        @endphp
                                        @if (Auth::user()->id_tipo_user == 3 || Auth::user()->id_tipo_user == 1)
                                        @php
                                            $empleado = DB::SELECTONE("select * from empleado where identidad= '".Auth::user()->identidad."'");
                                        @endphp
                                            <li><a href="{{ route('empleado.perfil',$empleado->id) }}" >Perfil</a></li>
                                        @endif
                                    @else

                                        <li><a href="{{ route('empleado.perfil',$empleado->id) }}" >Perfil</a></li>
                                    @endif

								</ul>
							</li>
                            @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                <li class="submenu">
                                    <a href="#" ><i class="la la-file-text"></i> <span> Contratos</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{ route('contratos.index') }}" :active="request()->routeIs('contratos.index')" >Gestiones</a></li>
                                        <li><a href="{{ route('contratos.adendas') }}" :active="request()->routeIs('contratos.index')" >Adendas</a></li>
                                    </ul>
                                </li>
                            @endif

							<li class="submenu">
								<a href="#" {{-- class="noti-dot" --}}><i class="fas fa-address-book"></i> <span> Permisos</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
                                    @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                        <li><a href="{{ route('permisos.index_rrhh') }}" :active="request()->routeIs('permisos.index_rrhh')" >Bandeja RRHH</a></li>
                                        <li><a href="{{ route('permisos.index') }}" :active="request()->routeIs('permisos.index')" >Bandeja Jefe Inmediato</a></li>
                                    @endif
									    <li><a href="{{ route('permisos.index_empleado') }}"  >Permisos</a></li>
								</ul>
							</li>
							<li class="menu-title">
								<span>HR</span>
							</li>
                            @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-calendar-day"></i> <span> Feriados </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{ route('feriados.feriados') }}" :active="request()->routeIs('feriados.feriados')">Gestión</a></li>
                                    </ul>
                                </li>
                            @endif
							<li class="submenu">
								<a href="#"><i class="fas fa-users"></i> <span> Asistencias </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
                                    @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                        {{-- <li><a href="{{ route('asistencia.index') }}" :active="request()->routeIs('asistencia.index')">Buscar</a></li> --}}
                                        <li><a href="{{ route('asistencia.marcaje') }}" :active="request()->routeIs('asistencia.marcaje')">Marcar</a></li>
                                        <li><a href="{{ route('salida.index') }}" :active="request()->routeIs('salida.index')">Medio Día</a></li>
                                        {{--<li><a href="{{ route('AsistenciaDelPersonal.index') }}" :active="request()->routeIs('AsistenciaDelPersonal.index')">Marcaje personal</a></li>--}}

                                        <li><a href="{{ route('AsistenciaDelPersonal.index') }}" :active="request()->routeIs('AsistenciaDelPersonal.index')">Asistencia general</a></li>
                                    @endif
                                    <li><a href="{{ route('asistencia.marcaje-empleado') }}" :active="request()->routeIs('asistencia.marcaje-empleado')">Marcaje personal</a></li>
									<li><a href="{{ route('matriz.index') }}" :active="request()->routeIs('matriz.index')">Matriz de asistencia</a></li>

									{{-- <li><a href="expenses.html">Otros</a></li> --}}
								</ul>
							</li>
                            @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-hand-holding-usd"></i> <span> Deducciones </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        {{-- <li><a href="{{ route('deducciones.deducciones-index') }}" :active="request()->routeIs('deducciones.deducciones-index')">Gestión de deducciones</a></li> --}}
                                        <li><a href="{{ route('deducciones.deducciones-variables') }}" :active="request()->routeIs('deducciones.deducciones-variables')">Añadir deducciones Variables</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                <li class="submenu">
                                    <a href="#"><i class="la la-money"></i> <span> Nóminas de sueldos </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{route('generar.index')}}"> Generar Planilla </a></li>
                                        <li><a href="{{route('planilla.historico-planilla')}}"> Histórico de Planillas </a></li>
                                        <li><a href="{{route('planilla.voucher')}}"> Voucher de sueldos </a></li>
                                        {{-- <li><a href="{{route('planilla.reembolso')}}"> Reembolsos </a></li> --}}

                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->id_tipo_user == 1 || Auth::user()->id_tipo_user == 3)
                                <li class="submenu">
                                    <a href="#"><i class="fas fa-search-dollar"></i> <span> Reembolsos </span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{route('planilla.reembolso')}}"> Gestionar </a></li>
                                        <li><a href="{{route('planilla.reembolso-historico')}}"> Histórico reembolsos </a></li>
                                    </ul>
                                </li>
                            @endif
						</ul>
                    </div>

                </div>
                <img style="display:block; margin-top:-60%; margin-left:5%;" src="../../assets/img/logo_becas_sidebar.png" alt="">
            </div>

</div>
