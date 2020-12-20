
<div class="wrapper">
  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Tests</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['is_admin'])){?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo base_url('admin');?>" class="nav-link">Admin</a>
            </li>
        <?php }?>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('logout');?>" class="nav-link">Logout</a>
        </li>
    </ul>
  </nav>

