<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vit Vendas</title>
    @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/css/bootstrap/bootstrap.min.css',
            'resources/adminLTE/css/adminlte.min.css',
            'resources/plugins/fontawesome-free/css/all.min.css',
            'resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
            'resources/plugins/jquery/jquery.min.js',
            'resources/plugins/bootstrap/js/bootstrap.bundle.min.js',
            'resources/adminLTE/js/adminlte.js',
            'resources/plugins/jquery-mousewheel/jquery.mousewheel.js',
            'resources/plugins/raphael/raphael.min.js',
            'resources/plugins/jquery-mapael/jquery.mapael.min.js',
            'resources/plugins/jquery-mapael/maps/usa_states.min.js',
            'resources/plugins/jquery-mask/jquery.mask.min.js',
    ])
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="icon" type="image/png" href="{{ asset('storage/carrinho.png') }}" sizes="16x16" />
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble animation__slow img-circle elevation-3" src={{asset("storage/logo.jpg")}} alt="JobFree" height="150" width="150">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="text-transform:uppercase; font-weight:bold;" class="nav-link">{{auth()->user()->name}}</a>
        </li>
    </ul>

    <!-- Fullscreen -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                    @csrf
                    <button type="submit" class="btn">
                        <i class="fas fa-arrow-left mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
    </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src={{asset("storage/logo.jpg")}} alt="JobFree" class="brand-image img-circle elevation-3" style="opacity:1.8">
        <span class="brand-text font-weight-light"><i>Vit Vendas</i></span>
    </a>

    <div class="sidebar">
        <div class="form-inline" style="margin-top: 5px;">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href='{{route('home')}}' class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li> --}}
                        <!-- <li class="nav-item">
                            <a href='' class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>Perfil</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active" style="background-color: #FFC476">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Vendas
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href='{{route('venda')}}' class="nav-link">
                                <i class="nav-icon fa fa-shopping-cart"></i>
                                <p>Vendas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='{{route('cliente')}}' class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='{{route('produto')}}' class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
  </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('conteudo')
            </div>
        </section>
    </div>

@yield('scripts')
</body>
</html>