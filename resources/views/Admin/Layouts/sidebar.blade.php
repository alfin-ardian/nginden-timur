<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Data Center</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : ''}}">
        <a class="nav-link" href="/admin">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/user*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/user">
            <i class="fa-solid fa-user-large"></i>
            <span>User</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/dapukan*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/dapukan">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Dapukan</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/jadwal">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Jadwal</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/laporan/absensi*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/laporan/absensi">
            <i class="fa-solid fa-print"></i>
            <span>Laporan Absensi</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/pengumuman*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/pengumuman">
            <i class="fa-regular fa-bell"></i>
            <span>Pengumuman</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/wa*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/wa">
            <i class="fa-brands fa-whatsapp"></i>
            <span>Blast WA</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('admin/email*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/email">
            <i class="fa-regular fa-envelope"></i>
            <span>Blast Email</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
