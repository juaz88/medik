
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MiniMarket</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Menu -->
    <div class="menu"></div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
        <p>Perfil Administrador</p>
          <?php /*}*/ ?>
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración
                </a>
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de Establecimientos</h6>
              <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="forms/nuevo_tipo_establecimiento.php" role="button">Nuevo</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Ubicación</th>
                      <th>Nombre Propietario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>MiniMarket</td>
                      <td>Robledo</td>
                      <td>Edwin Garzón</td>
                      <td>
                        <button class="btn btn-warning" title="Editar"><i class="fa fa-pencil-alt"></i></button>
                        <button class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>


      </div>
      <!-- Begin Page Content -->

      <!-- /.container-fluid -->

    </div>
  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; MiniMarket 2020</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      $('.menu').load('menu_component.php');
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.nav').load('nav_component.php');
    });
  </script>

</body>

</html>