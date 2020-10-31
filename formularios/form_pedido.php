<?php
include("../Procesos/control_pedido.php");
$product = new pedido;
$carrito = new carrito;
$valor_total = 0;
$lista = $product->buscar_productos();
$lista_carrito=array();
$validacion = $carrito->validar_ult_carrito();
$excede = "";


if ($validacion['estado'] == 1) {
    $cod_carrito = $validacion['cod_carrito'];
} else {
    $carrito->crear_carrito(1);
    $validacion = $carrito->validar_ult_carrito();
    $cod_carrito = $validacion['cod_carrito'];
}


if(isset($_GET['cancelar'])){
    echo "si esta ";
    $carrito->carrito_cancelar($cod_carrito);
    $lista_carrito = $carrito->ver_carrito($cod_carrito);
    header("Location: http://localhost/medik");
    
}


$lista_carrito = $carrito->ver_carrito($cod_carrito);

if (isset($_GET['codigo']) && $_GET['cantidad'] != "") {
    $cantidad = $_GET['cantidad'];
    $cod_producto = $_GET['codigo'];
    $precio = $_GET['precio'];
    $disponible = $_GET['disponible'];
    $nombre = $_GET['nombre'];

    $valor = $precio * $cantidad;
    //valida que la cantidad no exceda el disponible
    if ($cantidad <= $disponible) {
        //valida si esta relacion ya existe para actualizarla de lo contrario la agrega nueva
        $contar = $carrito->contar_carrito_producto($cod_carrito, $cod_producto);
        if ($contar == 0) {

            $carrito->agregar_a_carrito($cod_carrito, $cod_producto, $cantidad, $valor);
            $lista_carrito = $carrito->ver_carrito($cod_carrito);
            //echo "agregado";
        } else {
            $carrito->actualizar_carrito($cod_carrito, $cod_producto, $cantidad, $valor);
            $lista_carrito = $carrito->ver_carrito($cod_carrito);
            // echo "actualizado";
        }
    } else {

        $excede = "excede la cantidad disponible de " . $nombre;
    }

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

            <h1 class="logo mr-auto"><a href="index.php">MediK</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="main-nav d-none d-lg-block">
                <ul>
                    <li class="active"><a href="../index.php">Inicio</a></li>
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
                    <li><a href="../index.php">Inicio</a></li>

                </ol>
                <h2>Pedidos</h2>

            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="inner-page pt-4">
            <div class="container">


                <div class="form">

                    <h4></h4>
                    <p>Selecciona la cantidad del producto que deseas agregar al carrito</p>

                    <div class="container-fluid">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
                                <span class="text-danger"><?php echo $excede; ?></span>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad disponible</th>
                                                <th>Precio</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($lista as $dato) { ?>
                                                <tr>
                                                    <td><?php echo $dato['nombre_producto'] ?></td>
                                                    <td><?php echo $dato['cantidad_disponible'] ?></td>
                                                    <td><?php echo $dato['precio_ud'] ?></td>
                                                    <td>
                                                        <form action="" method="GET">
                                                            <input type="number" min="0" name="cantidad" id="cantidad" style="width : 60px">
                                                            <input type="hidden" name="codigo" id="codigo" value=<?php echo $dato['cod_producto'] ?>>
                                                            <input type="hidden" name="precio" id="precio" value=<?php echo $dato['precio_ud'] ?>>
                                                            <input type="hidden" name="nombre" id="nombre" value=<?php echo $dato['nombre_producto'] ?>>
                                                            <input type="hidden" name="disponible" id="disponible" value=<?php echo $dato['cantidad_disponible'] ?>>
                                                            <a href="form_pedido.php?cod=codigo&cantidad=cantidad&precio=precio&disponible=disponible&nombre=nombre"> <button class="btn btn-primary" title="Carrito"><i class="fa fa-shopping-cart"> </i></button></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card w-50">
                            <div class="card-header py-2">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="m-0 font-weight-bold text-primary">Carrito</h6>

                                        </div>
                                        <div class="col-6">


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Valor</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if (!empty($lista_carrito)) {   
                                                
                                                foreach ($lista_carrito as $dato) { ?>
                                                <tr>
                                                    <td><?php echo $dato['nombre_producto']; ?></td>
                                                    <td><?php echo $dato['cantidad']; ?></td>
                                                    <td><?php echo $dato['valor']; ?></td>
                                                    <?php $valor_total = $valor_total + $dato['valor']; ?>
                                                </tr>

                                         <?php } 
                                         } else{?>
                                          <tr>
                                              
                                                <td><p class="font-italic text-black-50">Carrito Vacío</p></td>
                                                <td></td>
                                                <td></td>
                                                
                                            </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-header py-2">
                                <h6 class="m-0 font-weight-bold "><?php echo "Valor total de su pedido es " . $valor_total; ?></h6>
                            </div>

                            <div class="card-footer">
                                <a href="form_pago.php?cod_carrito=<?php echo $cod_carrito. '&valor_total='.$valor_total; ?>"><button type="button" class="btn btn-outline-success" <?php if($valor_total>0){echo "enabled";}else{echo "disabled";} ?>>Confirmar pedido</button></a>
                                <a href="form_pedido.php?cancelar=True"><button type="button" class="btn btn-outline-danger">Cancelar pedido</button></a>

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