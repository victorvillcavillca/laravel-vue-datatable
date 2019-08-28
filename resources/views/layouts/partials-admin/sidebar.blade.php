<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img src="{{ asset(auth()->user()->photo) }}" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5">{{ auth()->user()->name }}</h2><span>Web Developer</span>
      </div>
      <!-- Small Brand information, appears on minimized sidebar-->
      <div class="sidenav-header-logo"><a href="{{route('admin')}}" class="brand-small text-center"> <strong>C</strong><strong class="text-primary">C</strong></a></div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <div class="main-menu">
      <h5 class="sidenav-heading">Principal</h5>
      <ul id="side-main-menu" class="side-menu list-unstyled">
        {{-- <li><a href="index.html"> <i class="icon-home"></i>Home                             </a></li>
        <li><a href="forms.html"> <i class="icon-form"></i>Forms                             </a></li>
        <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
        <li><a href="tables.html"> <i class="icon-grid"></i>Tables                             </a></li> --}}
        <li class="{{ request()->is('admin/profiles') || request()->is('admin/profiles/*')? 'active' : ''}}"><a href="{{ route('profiles.index') }}">
            <i class="icon-interface-windows"></i>Profile</a></li>
        <li class="{{ request()->is('admin/home') || request()->is('admin/home/*')? 'active' : ''}}"><a href="{{ route('admin') }}">
            <i class="icon-interface-windows"></i>Inicio</a></li>

        {{-- <li id="menu_scores" class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>VIII CAMPORI MOB (Puntajes)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="submenu_scores"><a href="{{ URL::to('admin/scores') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/camporiclub.scores') !!}</a></li>
            <li id="submenu_requirement"><a href="{{ URL::to('admin/requirements') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/requirement.requirements') !!}</a></li>
            <li id="submenu_requirementarea"><a href="{{ URL::to('admin/requirementareas') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/requirementarea.requirementareas') !!}</a></li>
            <li id="submenu_camporiclub"><a href="{{ URL::to('admin/camporiclubs') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/club.clubs') !!}</a></li>
            <li id="submenu_qualification"><a href="{{ URL::to('admin/qualifications') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/qualification.qualifications') !!}</a></li>
          </ul>
        </li> --}}


        <li><a href="#dropdownDropdown_post" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Publicaciones</a>
          <ul id="dropdownDropdown_post" class="collapse list-unstyled
            {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/categories') || request()->is('admin/categories/*') || request()->is('admin/tags') || request()->is('admin/tags/*')? 'show' : ''}}
            ">

            <li class="{{ request()->is('admin/posts') || request()->is('admin/posts/*')? 'active' : ''}}"><a href="{{ route('posts.index') }}">
            <i class="icon-interface-windows"></i>Posts</a></li>

            <li class="{{ request()->is('admin/categories') || request()->is('admin/categories/*')? 'active' : ''}}"><a href="{{ route('categories.index') }}">
            <i class="icon-interface-windows"></i>Categorias</a></li>

            <li class="{{ request()->is('admin/tags') || request()->is('admin/tags/*')? 'active' : ''}}"><a href="{{ route('tags.index') }}">
            <i class="icon-interface-windows"></i>Etiquetas</a></li>
          </ul>
        </li>



      

       {{--  <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page                             </a></li>
        <li> <a href="#"> <i class="icon-mail"></i>Demo
            <div class="badge badge-warning">6 New</div></a></li> --}}
      </ul>
    </div>
    <div class="admin-menu">
      <h5 class="sidenav-heading">Roles y Permisos</h5>
      <ul id="side-admin-menu" class="side-menu list-unstyled">
        <li class="{{ request()->is('admin/users') || request()->is('admin/users/*')? 'active' : ''}}"><a href="#">
            {{-- <i class="icon-user"></i> --}}
            <i class="fa fa-users"></i>
            {{-- <i class="fa fa-table mr-3"></i> --}}
          Usuarios</a></li>

        <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*')? 'active' : ''}}"> <a href="#"> <i class="icon-flask"> </i>Roles
            <div class="badge badge-info">Special</div></a></li>
      </ul>
    </div>
  </div>
</nav>