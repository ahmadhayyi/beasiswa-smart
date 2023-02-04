<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center text-capitalize {{ Request::is('home*') ? 'active' : '' }}" aria-current="page" href="/home">
                    <i class="bi bi-house-fill me-2"></i>
                    dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center text-capitalize {{ Request::is('jurusan*') ? 'active' : '' }}" href="/jurusan">
                    <i class="bi bi-grid-fill me-2"></i>
                    jurusan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center text-capitalize {{ Request::is('siswa*') ? 'active' : '' }}" href="/siswa">
                    <i class="bi bi-person-fill me-2"></i>
                    siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center text-capitalize {{ Request::is('bobot*') ? 'active' : '' }}" href="/bobot">
                    <i class="bi bi-basket3-fill me-2"></i>
                    kriteria
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center text-capitalize {{ Request::is('smart*') ? 'active' : '' }}" href="/smart">
                    <i class="bi bi-front me-2"></i>
                    smart
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
