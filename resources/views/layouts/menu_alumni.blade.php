<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/home/alumni" class="nav-link {{ Request::is('home/alumni*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/alumni/tracer" class="nav-link {{ Request::is('alumni/tracer*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Tracer Study
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/alumni/gantipass" class="nav-link {{ Request::is('alumni/gantipass*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-key"></i>
                <p>
                    Ganti Password
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>