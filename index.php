<?php  
include ("conexion/conexion.php");

$modelo = new Db();
$conexion = $modelo->conectar();
$sentencia = "SELECT * FROM productos";
$resultado = $conexion->prepare($sentencia);

$resultado->execute();
$lista = $resultado->fetchAll();




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Rapid Bootstrap Template - Index</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Rapid - v2.2.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top topbar-transparent">
        <div class="container d-flex justify-content-end">
            <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.html">MediK</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="main-nav d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.html">Inicio</a></li>
                    <li><a href="#about">Sobre nosotros</a></li>
                    <li><a href="#services">Servicios</a></li>
                    
                </ul>
            </nav>
            <!-- .main-nav-->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Portege tu salud<br>Pide desde casa con <span>Seguridad plena</span></h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Iniciar sesion</a>
                    </div>
                </div>

                <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/n_intro-img.png" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Servicios</h3>
                    <p>Con esta aplicacion puedes realizar pedidos directamente a tu farmacia favorita</p>
                </header>

                <div class="row">

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <div class="icon" style="background: #fff0da;"><i class="ion-ios-cart" style="color: #e98e06;"></i></div>
                            <h4 class="title"><a href="formularios/form_pedido.php">Realiza un pedido</a></h4>
                            <p class="description">Puedes realizar un pedido agregando productos al carrito!</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <div class="icon" style="background: #fff0da;"><i class="ion-ios-medkit" style="color: #e98e06;"></i></div>
                            <h4 class="title"><a href="#productos">Ver productos</a></h4>
                            <p class="description">Puedes ver todos los productos disponibles en tu farmacia favorita!</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
                            <h4 class="title"><a href="vistas/vista_pedidos.php">Mis pedidos</a></h4>
                            <p class="description">Puedes ver el estado de tus pedidos para hacer un seguimiento constante!</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">

        </section>
        <section id="productos" class="services section-bg">
            <div class="container" data-aos="zoom-out">


                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad disponible</th>
                                            <th>Precio</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lista as $dato){?>
                                        <tr>
                                            <td><?php echo $dato['nombre_producto'];?></td>
                                            <td><?php echo $dato['cantidad_disponible'];?></td>
                                            <td><?php echo $dato['precio_ud'];?></td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->


        <!-- ======= Call To Action Section ======= -->


        <!-- ======= Portfolio Section ======= -->

        <!-- ======= Team Section ======= -->


        <!-- ======= Clients Section ======= -->


        <!-- ======= F.A.Q Section ======= -->




        <!-- ======= Footer ======= -->
        <footer id="footer " class="section-bg ">
            <div class="footer-top ">
                <div class="container ">

                    <div class="row ">

                        <div class="col-lg-6 ">

                            <div class="row ">

                                <div class="col-sm-6 ">




                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="container ">
                    <div class="copyright ">
                        &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
                    </div>
                    <div class="credits ">
                        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
      -->
                        Designed by <a href="https://bootstrapmade.com/ ">BootstrapMade</a>
                    </div>
                </div>
        </footer>
        <!-- End  Footer -->

        <a href="# " class="back-to-top "><i class="fa fa-chevron-up "></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js "></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js "></script>
        <script src="assets/vendor/php-email-form/validate.js "></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js "></script>
        <script src="assets/vendor/counterup/counterup.min.js "></script>
        <script src="assets/vendor/venobox/venobox.min.js "></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js "></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js "></script>
        <script src="assets/vendor/aos/aos.js "></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js "></script>


        <!-- Bootstrap core JavaScript-->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/js/demo/datatables-demo.js"></script>

</body>

</html>