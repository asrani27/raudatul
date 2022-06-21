<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/home/superadmin" class="nav-link {{ Request::is('home/superadmin*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/superadmin/jurusan" class="nav-link {{ Request::is('superadmin/jurusan*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Jurusan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/superadmin/stakeholder"
                class="nav-link {{ Request::is('superadmin/stakeholder*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Stakeholder
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/superadmin/alumni" class="nav-link {{ Request::is('superadmin/alumni*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Alumni
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/superadmin/kuesioner" class="nav-link {{ Request::is('superadmin/kuesioner*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Kuesioner
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/superadmin/hasilkuis" class="nav-link {{ Request::is('superadmin/hasilkuis*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Hasil Kuesioner
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/superadmin/hasilnilai"
                class="nav-link {{ Request::is('superadmin/hasilnilai*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Hasil Penilaian
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/superadmin/laporan" class="nav-link {{ Request::is('superadmin/laporan*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/superadmin/gantipass" class="nav-link {{ Request::is('superadmin/gantipass*') ? 'active' : '' }}">
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