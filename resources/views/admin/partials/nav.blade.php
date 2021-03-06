<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>

	<li {{ request()->is('admin') ? 'class=active' : ''}}>
		<a href="{{route('dashboard')}}">
		<i class="fa fa-dashboard"></i> <span>Inicio</span>
		</a>
	</li>
	@can('ver convocatorias', new \Spatie\Permission\Models\Role)
	<li class="treeview {{ request()->is('admin/combocatorias*') ? 'active' : ''}}">

				<a href="#"><i class="fa fa-book"></i> <span>Convocatorias</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li {{ request()->is('admin/combocatorias') ? 'class=active' : ''}} >
								<a href="{{ route('admin.combocatorias.index') }}">
									<i class="fa fa-eye"></i> Ver todos las convocatorias
								</a>
							</li>
							@can('crear convocatorias', new \Spatie\Permission\Models\Role)
							<li {{ request()->is('admin/combocatorias/create') ? 'class=active' : ''}} >
								<a href="{{route('admin.combocatorias.create')}}" >
									<i class="fa fa-pencil"></i>Crear una convocatoria
								</a>
							</li>
							@endcan
						</ul>
    </li>
	<li class="treeview {{ request()->is('admin/departamentos*') || request()->is('admin/carreras*') || request()->is('admin/unidades*')? 'active' : ''}}">

				<a href="#"><i class="fa fa-book"></i> <span>Departamentos</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li {{ request()->is('admin/departamentos/departamento') ? 'class=active' : ''}} >
								<a href="{{ route('admin.departamentos.index') }}">
									<i class="fa fa-list"></i> Departamentos
								</a>
							</li>
							
							<li {{ request()->is('admin/carreras/carrera') ? 'class=active' : ''}} >
								<a href="{{ route('admin.carreras.index') }}" >
									<i class="fa fa-pencil"></i>Carreras
								</a>
							</li>
							<li {{ request()->is('admin/unidades/unidad') ? 'class=active' : ''}} >
								<a href="{{ route('admin.unidades.index') }}" >
									<i class="fa fa-pencil"></i>Unidades
								</a>
							</li>
						</ul>
    </li>
	@endcan
	@can('calificar postulantes', new \Spatie\Permission\Models\Role)
	<li class="treeview {{ request()->is('admin/calificaciones*') ? 'active' : ''}}">

				<a href="#"><i class="fa fa-book"></i> <span>Calificaciones</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li {{ request()->is('admin/calificaciones') ? 'class=active' : ''}} >
								<a href="{{ route('admin.calificaciones.index') }}">
									<i class="fa fa-eye"></i> Calificar Convocatorias
								</a>
							</li>
						</ul>
    </li>
	@endcan
	@can('ver roles', new \Spatie\Permission\Models\Role)
		<li class="treeview  {{ request()->is('admin/roles*') ? 'active' : ''}} ">

				<a href="#"><i class="fa fa-edit"></i> <span>Roles</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
						<ul class="treeview-menu">
							<li {{ request()->is('admin/roles') ? 'class=active' : ''}} >
								<a href="{{ route('admin.roles.index')}}">
									<i class="fa fa-eye"></i> Ver todos los Roles
								</a>
							</li>
							@can('crear roles', new \Spatie\Permission\Models\Role)
							<li {{ request()->is('admin/roles/create') ? 'class=active' : ''}} >
								<a href="{{ route('admin.roles.create')}}" >
									<i class="fa fa-pencil"></i>Crear un Rol
								</a>
							</li>
							@endcan
							@can('asignar roles', new \Spatie\Permission\Models\Role)
							<li {{ request()->is('admin/roles/asignar') ? 'class=active' : ''}} >
								<a href="{{ route('admin.roles.asignar')}}" >
									<i class="fa fa-list"></i>Asignar un Rol a Usuarios
								</a>
							</li>
							@endcan
						</ul>
    	</li>
    @endcan
	@can('ver usuarios', new \Spatie\Permission\Models\Role)
		<li class="treeview  {{ request()->is('admin/personas*') ? 'active' : ''}} ">

	    	<a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li {{ request()->is('admin/personas') ? 'class=active' : ''}}  >
					<a href="{{ url('admin/personas') }}">
						<i class="fa fa-eye"></i> Ver todos los Usuarios
					</a>
				</li>
				
				@can('registrar estudiantes especiales', new \Spatie\Permission\Models\Role)
				<li {{ request()->is('admin/personas/create') ? 'class=active' : ''}}>
					<a href="{{ url('admin/personas/create')}}" >
						<i class="fa fa-pencil"></i>Registrar estudiantes Especiales
					</a>
				</li>
				@endcan
			</ul>
		</li>
	@endcan

	
</ul>