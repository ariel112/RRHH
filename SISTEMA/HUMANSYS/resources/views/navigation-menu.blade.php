
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
					<h3>HUMANSYS</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">
				
				
				
					<!-- Notifications -->
					<li class="nav-item dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-02.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-03.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-06.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
													<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-17.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="activities.html">
											<div class="media">
												<span class="avatar">
													<img alt="" src="assets/img/profiles/avatar-13.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
													<p class="noti-time"><span class="notification-time">2 days ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="activities.html">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
				
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
						<div class="dropdown-menu">
							<a class="dropdown-item" > 
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                                </x-jet-responsive-nav-link>
                            </a>
							<a class="dropdown-item" >
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-jet-responsive-nav-link>
                                @endif
                            </a>
							<a class="dropdown-item">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                
                                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
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
						<a class="dropdown-item" >
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-jet-responsive-nav-link>
                        </a>
						<a class="dropdown-item" >
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                            @endif
                        </a>
						<a class="dropdown-item" >
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
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
							
							<li class="submenu">
								<a href="#" class="noti-dot"><i class="la la-user"></i> <span> Empleados</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{ route('empleado.index') }}" :active="request()->routeIs('empleado.index')" >Buscar Empleados</a></li>
									<li><a href="holidays.html">Vacaciones</a></li>
									<li><a href="leaves.html">Solicitud de vacaciones <span class="badge badge-pill bg-primary float-right">1</span></a></li>
									<li><a href="leaves-employee.html">Hojas Empleados</a></li>
									<li><a href="leave-settings.html">Leave Settings</a></li>
									<li><a href="attendance.html">Asistencia (Admin)</a></li>
									<li><a href="attendance-employee.html">Asistencia (Empleado)</a></li>
									<li><a href="departments.html">Departamentos</a></li>
									<li><a href="designations.html">Designaciones</a></li>
									<li><a href="timesheet.html">Hojas de horas</a></li>
									<li><a href="overtime.html">Horas extra</a></li>
								</ul>
							</li>
						
						
							
							<li class="menu-title"> 
								<span>HR</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-files-o"></i> <span> Cuentas </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="estimates.html">Estimados</a></li>
									<li><a href="invoices.html">Facturas</a></li>
									<li><a href="payments.html">Pagos</a></li>
									<li><a href="expenses.html">Gastos</a></li>
									<li><a href="provident-fund.html">Fondo de previsión</a></li>
									<li><a href="taxes.html">Impuestos</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-money"></i> <span> Nominas de sueldos </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="salary.html"> Salario Empleado</a></li>
									<li><a href="salary-view.html"> Nómina </a></li>
									<li><a href="payroll-items.html"> Elementos de nómina </a></li>
								</ul>
							</li>
							<li> 
								<a href="policies.html"><i class="la la-file-pdf-o"></i> <span>Politicas</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-pie-chart"></i> <span> Informes </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="expense-reports.html"> Informe de gastos </a></li>
									<li><a href="invoice-reports.html"> Informe de facturas </a></li>
								</ul>
							</li>
							
							<li class="menu-title"> 
								<span>Administration</span>
							</li>
							<li> 
								<a href="assets.html"><i class="la la-object-ungroup"></i> <span>Activos</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="la la-briefcase"></i> <span> Trabajos </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="jobs.html"> Administrar Trabajos </a></li>
									<li><a href="job-applicants.html"> Candidatos Aplicados</a></li>
								</ul>
							</li>
							<li> 
								<a href="activities.html"><i class="la la-bell"></i> <span>Actividades</span></a>
							</li>
							<li> 
								<a href="users.html"><i class="la la-user-plus"></i> <span>Usuarios</span></a>
							</li>
							<li> 
								<a href="settings.html"><i class="la la-cog"></i> <span>Ajustes</span></a>
							</li>
						
						</ul>
					</div>
                </div>
            </div>
</div>