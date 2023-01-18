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
                <a class="nav-link {{ Request::is('bobot*') ? 'active' : '' }}" href="/bobot">
                    <i class="bi bi-basket3-fill me-2"></i>
                    Kriteria
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('smart*') ? 'active' : '' }}" href="/smart">
                    <i class="bi bi-front me-2"></i>
                    Smart
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('setting*') ? 'active' : '' }}" href="/setting">
                    <i class="bi bi-gear-fill me-2"></i>
                    Setting
                </a>
            </li>
        </ul>
    </div>
</nav>
