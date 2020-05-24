<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>

	<li {{ request()->is('admin') ? 'class=active' : ''}}>
		<a href="{{route('dashboard')}}">
		<i class="fa fa-dashboard"></i> <span>Inicio</span>
		</a>
	</li>
	@can('ver convocatorias', new \Spatie\Permission\Models\Role)
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
							@can('crear convocatorias', new \Spatie\Permission\Models\Role)
							<li {{ request()->is('admin/combocatorias/create') ? 'class=active' : ''}} >
								<a href="{{route('admin.combocatorias.create')}}" >
									<i class="fa fa-pencil"></i>Crear una combocatoria
								</a>
							</li>
							@endcan
						</ul>
    </li>
	@endcan
	@can('ver roles', new \Spatie\Permission\Models\Role)
	<li class="treeview  {{ request()->is('admin/roles*') ? 'active' : ''}} ">

				<a href="#"><i class="fa fa-edit"></i> <span>roles</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li {{ request()->is('admin/roles') ? 'class=active' : ''}} >
								<a href="{{ route('admin.roles.index')}}">
									<i class="fa fa-eye"></i> Ver todos los roles
								</a>
							</li>
							@can('crear roles', new \Spatie\Permission\Models\Role)
							<li {{ request()->is('admin/roles/create') ? 'class=active' : ''}} >
								<a href="{{ route('admin.roles.create')}}" >
									<i class="fa fa-pencil"></i>Crear un rol
								</a>
							</li>
							@endcan
						</ul>
    </li>
    @endcan
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