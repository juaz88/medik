<!--Conexión BD-->
<?php 
include '../conexion/conexion.php';

  //var_dump($conn);
    
  if(isset($_POST["guardar_tipo_producto"])){

    //Inserta datos en tabla "marca"
    $insertar_tipo_producto = "INSERT INTO tipo_producto (
      cod_tipo_producto,
      descripcion_producto,
      id_estado
      ) VALUES (
      '".$_POST["cod_tipo_producto"]."',
      '".$_POST["descripcion_producto"]."',
      '".$_POST["id_estado"]."'
    )";
    echo $insertar_tipo_producto;
    if (!$crear_tipo_producto = $conn -> query($insertar_tipo_producto)) {
      echo "Marca ingresada correctamente";
      echo $insertar_tipo_producto;
      header("Location: ../admin/tipo_producto.php"); 
  } else {
      echo "Error: " . $insertar_tipo_producto . "<br>" . $conn->error;
      header("Location: ../admin/tipo_producto.php");
  }
   

    $conn->close();
  }
?>