<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home*') ? 'active' : '' }}" aria-current="page" href="/home">
                    <i class="bi bi-house-fill me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('siswa*') ? 'active' : '' }}" href="/siswa">
                    <i class="bi bi-person-fill me-2"></i>
                    Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('mapel*') ? 'active' : '' }}" href="/mapel">
                    <i class="bi bi-person-fill me-2"></i>
                    Mapel
                </a>
            </li>
        </ul>
    </div>
</nav>
