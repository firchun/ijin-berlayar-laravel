<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-ship"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'SIPETA') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Nav::isRoute('home') }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (Auth::user()->role != 'Pimpinan')
        @php
            $check_berkas = App\Models\BerkasUser::where('id_user', Auth::id())->latest()->first();

            if ($check_berkas) {
                $menu_user = true;
            } else {
                $menu_user = false;
            }
        @endphp
        @if ($menu_user == true && $check_berkas->diterima == 1)
            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Informasi') }}
            </div>
            <li class="nav-item {{ Nav::isRoute('berkas_user.update') }}">
                <a class="nav-link"href="{{ route('berkas_user.update') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ __('Update Bekas') }}</span>
                </a>
            </li>
            <li class="nav-item {{ Nav::isRoute('kapal') }}">
                <a class="nav-link"href="{{ route('kapal') }}">
                    <i class="fas fa-fw fa-ship"></i>
                    <span>{{ __('Data Kapal') }}</span>
                </a>
            </li>
            <li class="nav-item {{ Nav::isRoute('spb') }}">
                <a class="nav-link"href="{{ route('spb') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>{{ __('Pengajuan SPB') }}</span>
                </a>
            </li>
            <li class="nav-item {{ Nav::isRoute('jadwal') }}">
                <a class="nav-link"href="{{ route('jadwal') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>{{ __('Update Jadwal ') }}</span>
                </a>
            </li>
            <li class="nav-item {{ Nav::isRoute('logistik') }}">
                <a class="nav-link"href="{{ route('logistik') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>{{ __('Rekomendasi Logistik') }}</span>
                </a>
            </li>
        @endif
    @endif
    @if (Auth::user()->role == 'Staff')
        <li class="nav-item {{ Nav::isRoute('spb') }}">
            <a class="nav-link"href="{{ route('spb') }}">
                <i class="fas fa-fw fa-file"></i>
                <span>{{ __('Pengajuan SPB') }}</span>
            </a>
        </li>
        <li class="nav-item {{ Nav::isRoute('kepulangan') }}">
            <a class="nav-link"href="{{ route('kepulangan') }}">
                <i class="fas fa-fw fa-ship"></i>
                <span>{{ __('Verfikasi Kepulangan') }}</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->role == 'Pimpinan')
        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('SPB') }}
        </div>
        <li class="nav-item {{ Nav::isRoute('spb') }}">
            <a class="nav-link"href="{{ route('spb') }}">
                <i class="fas fa-fw fa-file"></i>
                <span>{{ __('Verifikasi SPB') }}</span>
            </a>
        </li>
        <div class="sidebar-heading">
            {{ __('Pengguna') }}
        </div>

        <!-- Nav Item - admin -->
        <li class="nav-item {{ Nav::isRoute('users.admin') }}">
            <a class="nav-link" href="{{ route('users.admin') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Admin') }}</span>
            </a>
        </li>
        <!-- Nav Item - admin -->
        <li class="nav-item {{ Nav::isRoute('users.staff') }}">
            <a class="nav-link" href="{{ route('users.staff') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Staff') }}</span>
            </a>
        </li>
        <!-- Nav Item - admin -->
        <li class="nav-item {{ Nav::isRoute('users.user') }}">
            <a class="nav-link" href="{{ route('users.user') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('User') }}</span>
            </a>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Settings') }}
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item {{ Nav::isRoute('profile') }}">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('Profile') }}</span>
        </a>
    </li>

    <!-- Nav Item - About -->
    <li class="nav-item {{ Nav::isRoute('about') }}">
        <a class="nav-link" href="{{ route('about') }}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>{{ __('About') }}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
