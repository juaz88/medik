<!--Conexión BD-->
<?php 
include '../conexion/conexion.php';

  //var_dump($conn);
    
  if(isset($_POST["guardar_producto"])){

    //Inserta datos en tabla "marca"
    $insertar_producto = "INSERT INTO productos (
      cod_producto,
      nombre_producto,
      cod_tipo_producto,
      precio_ud,
      cantidad_disponible,
      estado
      ) VALUES (
      '".$_POST["cod_producto"]."',
      '".$_POST["nombre_producto"]."',
      '".$_POST["cod_tipo_producto"]."',
      '".$_POST["precio_ud"]."',
      '".$_POST["cantidad_disponible"]."',
      '".$_POST["id_estado"]."'
    )";
    echo $insertar_producto;
    if (!$crear_producto = $conn -> query($insertar_producto)) {
      echo "Marca ingresada correctamente";
      echo $insertar_producto;
      header("Location: ../index.php"); 
  } else {
      echo "Error: " . $insertar_producto . "<br>" . $conn->error;
      header("Location: ../index.php");
  }
   

    $conn->close();
  }
?>