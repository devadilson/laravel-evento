<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('empresa') }}'><i class='nav-icon la la-bank'></i> Empresas</a></li>
@endif
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('campu') }}'><i class='nav-icon la la-bank'></i> Campus</a></li>
@endif
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('evento') }}'><i class='nav-icon la la-bookmark'></i> Eventos</a></li>
@endif
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('participante') }}'><i class='nav-icon la la-group'></i> Participantes</a></li>
@endif
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('certificate') }}'><i class='nav-icon la la-certificate'></i> Certificados</a></li>
@endif
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('curso') }}'><i class='nav-icon la la-mortar-board'></i> Cursos</a></li>
@endif
@if (backpack_user()->hasRole(['Root','Admin']))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('type') }}'><i class='nav-icon la la-star'></i> Perfis</a></li>
@endif
<!-- Users, Roles, Permissions -->
@if (backpack_user()->hasRole(['Root']))
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
	<ul class="nav-dropdown-items">
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
	  <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>
@endif