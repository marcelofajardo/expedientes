<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        <!-- SIDEBAR AVATAR 1 -->
        </div>
        <div class="pull-left info">
          <!-- SOCIAL NAME SIDEBAR 1 -->
          <!-- Status -->
          @if (Auth::user())
          <a href="{{ route('user.show',Auth::user()->id ) }}"><i class="fa fa-circle text-success"></i> Online</a>
          @endif
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li <?php echo current_page('home') ? "class='active'" : "";?>><a href="{{ url('home')}}"><i class="fa fa-link"></i> <span>Inicio</span></a></li>
        @if (Auth::user())

        <li><a href={{ route('rol.index') }}> <i class="fa fa-address-card"></i>Roles</a></li>
        <li><a href={{ route('user.index') }}> <i class="fa fa-group"></i>Usuarios</a></li>
        <li><a href={{ route('notificacion.index') }}> <i class="fa fa-bell-o"></i>Notificaciones</a></li>
        <li><a href={{ route('task.index') }}> <i class="fa fa-bell-o"></i>Tareas</a></li>

        @endif


        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
