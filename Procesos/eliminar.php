<?php

  require_once '../modelos/control_metodos.php';
  $inventarioProducto = new InventarioProducto();
  $inventarioProducto->eliminar($_REQUEST['cod_tipo_producto']);
  
  header('Location: ../admin/tipo_producto.php');


?>