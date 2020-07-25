<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">

    <span class="brand-text font-weight-light" style="color: #3c8dbc">
      <img src="{{asset("assets/icons/OdotnoMisionesLogo.png")}}" class="brand-image img-circle" style="opacity: 1">
      <b>Odonto Misiones</b>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Usuario</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview {{ (request()->routeIs('incidencias.*')) ? 'menu-open active' : '' }}">
          <a href="#" class="nav-link"
            style="{{ (request()->routeIs('indicencias.*')) ? 'background-color: #3c8dbc; color: white;' : '' }}">
            <i class="nav-item fas fa-tasks"></i>
            <p>
               Incidentes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('incidencias.index')}}" class="nav-link"
                style="{{ (request()->routeIs('incidencias.index')) ? 'color: #3c8dbc;' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver incidentes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('tipos_incidencias.index')}}" class="nav-link"
                style="{{ (request()->routeIs('tipo_incidencias.index')) ? 'color: #3c8dbc;' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver tipos de incidentes</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ (request()->routeIs('clientes.*')) ? 'menu-open active' : '' }}">
          <a href="#" class="nav-link"
            style="{{ (request()->routeIs('clientes.*')) ? 'background-color: #3c8dbc; color: white;' : '' }}">
            <i class="nav-item fas fa-users"></i>
            <p>
              Clientes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('clientes.index')}}" class="nav-link"
                style="{{ (request()->routeIs('clientes.index')) ? 'color: #3c8dbc;' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver clientes</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ (request()->routeIs('equipos.*')) ? 'menu-open active' : '' }}">
          <a href="#" class="nav-link"
            style="{{ (request()->routeIs('equipos.*')) ? 'background-color: #3c8dbc; color: white;' : '' }}">
            <i class="nav-item fas fa-dolly"></i>
            <p>
              Equipos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('equipos.index')}}" class="nav-link"
                style="{{ (request()->routeIs('equipos.index')) ? 'color: #3c8dbc;' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver equipos</p>
              </a>
            </li>
          </ul>
        </li>
        <li
          class="nav-item has-treeview {{ (request()->routeIs('partes.*') ||request()->routeIs('proveedores.*')) ? 'menu-open active' : '' }}">
          <a href="#" class="nav-link"
            style="{{ (request()->routeIs('partes.*') ||request()->routeIs('proveedores.*')) ? 'background-color: #3c8dbc; color: white;' : '' }}">
            <i class="nav-item fas fa-people-carry"></i>
            <p>
              Proveedores y partes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('proveedores.index')}}" class="nav-link"
                style="{{ (request()->routeIs('proveedores.index')) ? 'color: #3c8dbc;' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver proveedores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('partes.index')}}" class="nav-link"
                style="{{ (request()->routeIs('partes.index')) ? 'color: #3c8dbc;' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ver partes</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
