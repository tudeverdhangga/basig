<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <p class="menu-title mb-0">Dashboard</p>
      </a>
    </li>
    <li class="nav-item {{ active_class(['tables/basic-table']) }}">
      <a class="nav-link" href="{{ url('/hotel') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <p class="menu-title mb-0">Data Hotel</p>
      </a>
    </li>
    <!-- <li class="nav-item {{ active_class(['tables/basic-table']) }}">
      <a class="nav-link" href="{{ url('/tables/basic-table') }}">
        <i class="menu-icon mdi mdi-table-large"></i>
        <p class="menu-title mb-0">Tables</p>
      </a>
    </li> -->
  </ul>
</nav>