{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Dashboard')</title>

    <link rel="icon" type="image/x-icon" href="/logo-bppk.ico">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- SB Admin 2 (Bootstrap 4) -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Trix Editor -->
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            font-weight: 600;
            border-radius: 8px;
        }

        .sidebar .nav-link.active i {
            color: #fff !important;
        }
    </style>
</head>

<body id="page-top">

<div id="wrapper">

    {{-- ================= SIDEBAR ================= --}}
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Panel</div>
        </a>

        <hr class="sidebar-divider my-0">

        <div class="sidebar-heading">Menu Admin</div>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge-high"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.mobil.*') ? 'active' : '' }}"
               href="{{ route('admin.mobil.index') }}">
                <i class="fa-solid fa-car"></i>
                <span>Kelola Mobil</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}"
               href="{{ route('admin.blog.index') }}">
                <i class="fa-solid fa-newspaper"></i>
                <span>Kelola Blog</span>
            </a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    {{-- ================= END SIDEBAR ================= --}}

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            {{-- ================= TOPBAR ================= --}}
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto align-items-center">

                    {{-- USER DROPDOWN --}}
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle d-flex align-items-center"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">

                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                Admin
                            </span>
                            <i class="fa-solid fa-user-shield fa-lg"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fa-solid fa-right-from-bracket fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </form>

                        </div>
                    </li>

                </ul>
            </nav>
            {{-- ================= END TOPBAR ================= --}}

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="sticky-footer bg-white py-3">
            <div class="container text-center">
                <span>
                    Copyright ©
                    Berkah Putra Putri Karawang {{ date('Y') }}
                </span>
            </div>
        </footer>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

{{-- ================= SCRIPTS ================= --}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

@stack('scripts')

</body>
</html>
