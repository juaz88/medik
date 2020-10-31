


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
                    <li>
					<a href="#" data-toggle="modal" data-target="#myModal2">
						<span class="fa fa-pencil-square-o"></span> Registrarse </a>
				</li>
                    
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
                    
                </div>

                <div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/n_intro-img.png" alt="" class="img-fluid">
                </div>
                
            </div>

        </div>
    </section>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Regístrate</h3>
						<p>
						<h4 class="agileinfo_sign">Crea tu cuenta.</h4>
						</p>
						<form action="Crear_Cuenta.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="cedula" placeholder="Cedula" required>
							</div>
							<div class="styled-input">
								<input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
							</div>
							<div class="styled-input">
								<input type="text" name="segundo_apellido" placeholder="Segundo Apellido" required>
							</div>
							<div class="styled-input">
								<input type="text" name="primer_nombre" placeholder="Primer Nombre" required>
							</div>
							<div class="styled-input">
								<input type="text" name="segundo_nombre" placeholder="Segundo Nombre">
							</div>
							<div class="styled-input">
								<input type="text" name="direccion" placeholder="Dirección" required>
							</div>
							<div class="styled-input">
								<input type="text" name="celular" placeholder="Celular" required>
							</div>
							<div class="styled-input">
								<input type="text" name="telefono" placeholder="Teléfono" required>
							</div>
							<div class="styled-input">
								<label for="">Fecha Nacimiento</label>
								<input type="date" name="fecha_nacimiento" placeholder="Fecha Nacimiento" required>
							</div>
							<div class="styled-input">

							</div>
							<div class="styled-input">

							</div>
							<div class="styled-input">
								<input type="email" name="correo" aria-describedby="emailHelp"
									placeholder="Correo Electronico" required="">
							</div>
							<div class="styled-input">
								<input type="password" name="contrasena" placeholder="Contraseña" required>
							</div>
							<div class="styled-input">
								<input type="text" name="id_perfil" placeholder="Perfil" required>
							</div>

							<input type="submit" value="Crear Cuenta">
						</form>

					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>

    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->


        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

               


        </section>
        <
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
