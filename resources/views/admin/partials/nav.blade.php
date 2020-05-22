<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>

	<li {{ request()->is('admin') ? 'class=active' : ''}}>
		<a href="{{route('dashboard')}}">
		<i class="fa fa-dashboard"></i> <span>Inicio</span>
		</a>
	</li>

	<li class="treeview {{ request()->is('admin/combocatorias*') ? 'active' : ''}}">

				<a href="#"><i class="fa fa-book"></i> <span>conbocatorias</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li {{ request()->is('admin/combocatorias') ? 'class=active' : ''}} >
								<a href="{{ route('admin.combocatorias.index') }}">
									<i class="fa fa-eye"></i> Ver todos las combocatorias
								</a>
							</li>
							<li {{ request()->is('admin/combocatorias/create') ? 'class=active' : ''}} >
								<a href="{{route('admin.combocatorias.create')}}" >
									<i class="fa fa-pencil"></i>Crear una combocatoria
								</a>
							</li>
						</ul>
    </li>

	<li class="treeview ">

				<a href="#"><i class="fa fa-edit"></i> <span>roles</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li >
								<a href="{{ route('roles')}}">
									<i class="fa fa-eye"></i> Ver todos los roles
								</a>
							</li>
							<li>
								<a href="#" >
									<i class="fa fa-pencil"></i>Crear un rol
								</a>
							</li>
						</ul>
    </li>

	<li class="treeview ">

	    	<a href="#"><i class="fa fa-users"></i> <span>ususarios</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu">
					<li  >
						<a href="#">
							<i class="fa fa-eye"></i> Ver todos los ususarios
						</a>
					</li>
					<li>
						<a href="#" >
							<i class="fa fa-pencil"></i>Crear un ususario
						</a>
					</li>
				</ul>
	</li>

	
</ul>