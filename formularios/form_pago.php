<?php
    include("../Procesos/control_pago.php");
    $tipo=new consultas;
    $lista=$tipo->buscar_tipos();
    $carrito=new carrito_pago;
    if(isset($_GET['cod_carrito'])){
        $cod_carrito=$_GET['cod_carrito'];
        $valor_total=$_GET['valor_total'];
        $lista_carrito= $carrito->ver_carrito($cod_carrito);


    }

    if(isset($_POST['pagar'])){

        $carrito->carrito_cerrar($cod_carrito);
        header("Location: http://localhost/medik");
    }
    
    

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Inner Page - Rapid Bootstrap Template</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

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
                    <li><a href="#footer">Contacto</a></li>
                </ul>
            </nav>
            <!-- .main-nav-->

        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="index.html">Inicio</a></li>

                </ol>
                <h2>Realizar pago!</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="inner-page pt-4">
            <div class="container">

                <div class="row">

                    <div class="col-6">

                        <div class="form">


                            <p>Completa la información para realizar el pago</p>

                            <form action="" method="post" role="form" class="php-email-form">

                                <div class="form-group">
                                    <label for="name">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" id="name" value="JUAN DAVID" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <label for="primer_ap">Primer apellido</label>
                                    <input type="text" name="primer_ap" class="form-control" id="primer_ap" value="DIAZ" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <label for="segundo_ap">Segundo apellido</label>
                                    <input type="text" name="segundo_ap" class="form-control" id="segundo_ap" value="VASQUEZ" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly="disabled"/>
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <label for="segundo_ap">Fecha</label>
                                    
                                    <input type="date" name="fecha" class="form-control" id="fechap" value="" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">


                                    <label for="m_pago">Medio de pago</label>
                                    <select class="form-control" name="m_pago" id="m_pago">
                                        <?php  
                                            foreach ($lista as $dato){  ?>
                                                
                                            <option><?php echo $dato['descripcion']; ?></option>
                                         <?php } ?> 

                                    </select>
                                                
                                    <div class="validate"></div>
                                </div>

                                 <div class="row-cols-2">
                                     <button type="submit" class="btn btn-primary" name="pagar">Efectuar pago</button>
                                     <button type="button" class="btn btn-secondary">Cancelar</button>
                                 </div>   
                                 
                                
                            </form>

                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card">


                            <div class="card-body">
                                <div calss="container">

                                    <div class="row">
                                        <div class="col-9">
                                            <h4 class="card-title">Pedido No.</h4><br>

                                        </div>
                                        <div class="col-3">

                                            <h4 class="card-title"><?php  echo $cod_carrito; ?></h4>
                                        </div>

                                    </div>

                                </div>



                                <div class="form-group">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Valor total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($lista_carrito as $dato){ ?>
                                            <tr>
                                                <td scope="row"><?php  echo $dato['nombre_producto']; ?></td>
                                                <td><?php  echo $dato['cantidad']; ?></td>
                                                <td><?php  echo $dato['valor']; ?></td>
                                                

                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>Sub-total</td>
                                                <td></td>
                                                <td><?php  echo $valor_total; ?></td>

                                            </tr>
                                            <tr>
                                                <td>Impuestos</td>
                                                <td>19%</td>
                                                <td><?php  echo $valor_total*0.19; ?></td>

                                            </tr>

                                            <tr>
                                                <td>Total a pagar</td>
                                                <td></td>
                                                <td><?php  echo $valor_total*1.19; ?></td>

                                            </tr>
                                        </tbody>
                                    </table>


                                </div>




                            </div>
                        </div>


                    </div>
                </div>

            </div>

            
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
      -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>