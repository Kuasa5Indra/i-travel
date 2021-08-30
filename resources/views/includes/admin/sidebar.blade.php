<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-passport"></i>
        </div>
        <div class="sidebar-brand-text mx-3">i-Travel Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ set_active('admin.dashboard') }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item  -->
    <li class="nav-item {{ set_active('admin.travel-package.*') }}">
        <a class="nav-link" href="{{ route('admin.travel-package.index') }}">
            <i class="fas fa-fw fa-map"></i>
            <span>Paket Travel</span></a>
    </li>

    <!-- Nav Item  -->
    <li class="nav-item {{ set_active('admin.gallery.*') }}">
        <a class="nav-link" href="{{ route('admin.gallery.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Galeri Travel</span></a>
    </li>

    <!-- Nav Item  -->
    <li class="nav-item {{ set_active('admin.transaction.*') }}">
        <a class="nav-link" href="{{ route('admin.transaction.index') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->