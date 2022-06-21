<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/home/stakeholder" class="nav-link {{ Request::is('home/stakeholder*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/stakeholder/penilaian"
                class="nav-link {{ Request::is('stakeholder/penilaian*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Penilaian Alumni
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/stakeholder/gantipass"
                class="nav-link {{ Request::is('stakeholder/gantipass*') ? 'active' : '' }}">
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