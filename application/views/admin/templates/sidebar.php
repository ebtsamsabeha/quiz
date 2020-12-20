<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('/');?>" class="nav-link">Site</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('admin/logout');?>" class="nav-link">Logout</a>
        </li>
    </ul>
  </nav>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url('admin/users'); ?>" class="nav-link ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url('admin/tests'); ?>" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Tests</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url('admin/questions'); ?>" class="nav-link ">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Questions</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-2">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


