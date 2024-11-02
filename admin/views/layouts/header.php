<?php
session_start();

// Verificar si existe la variable de sesión
if (!isset($_SESSION['user_autenticate'])) {
  // Redirigir al inicio si no existe la sesión
  header("Location: ../../");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin WaykiBot</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Incluye los estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Incluye el estilo de DataTables con integración a Bootstrap -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">



</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="user.php" class="nav-link">Reporte</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php" role="button">
            Cerra sesión <i class="fa-solid fa-lock"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin WaykiBot</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Administrador</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Clientes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','clientes/add_clientes_view.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registro</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','clientes/tabla_clientes.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Historial</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Servicios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','servicios/add_servicios_view.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registro</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','servicios/tabla_servicios.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Historial</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Servicios categorias
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','categoria_servicios/add_cat_servicios_view.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registro</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','categoria_servicios/tabla_cat_servicios.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Historial</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Servicios subCategorias
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','subcategoria_servicios/add_subcat_servicios_view.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registro</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','subcategoria_servicios/tabla_subcat_servicios.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Historial</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Reservas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','reservas/add_reservas_view.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registro</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="CargarContenido('content-wrapper','reservas/tabla_reservas.php')" class="nav-link active" style="cursor:pointer;">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Historial</p>
                  </a>
                </li>
              </ul>
            </li>


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>