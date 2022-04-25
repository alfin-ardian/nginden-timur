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
    <li class="nav-item {{ Request::is('personal') ? 'active' : ''}}">
        <a class="nav-link" href="/personal">
            <i class="fa-solid fa-house"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('personal/riwayat*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/personal/riwayat">
            <i class="fa-solid fa-calendar-days"></i>
            <span>Riwayat</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('personal/pengumuman*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/personal/pengumuman">
            <i class="fa-regular fa-bell"></i>
            <span>Pengumuman</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('personal/jadwal*') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="/admin/jadwal">
            <i class="fa-solid fa-user-large"></i>
            <span>Akun</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
