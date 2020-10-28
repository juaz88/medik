<?php 
  
  
  include ("../conexion/conexion.php");
 
    class pedido{

        public function insertar_pedido($codigo, $descripcion, $estado)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO tipo_pago (
            id_tipo_pago,
            descripcion,
            estado
            ) VALUES (:id_tipo_pago,:descripcion,:estado)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_tipo_pago', $codigo);
            $resultado->bindParam(':descripcion', $descripcion);
            $resultado->bindParam(':estado', $estado);

            if (!$resultado) {
                return "error al crear el registro";
            } else {
                $resultado->execute();

                return "registro exitoso!!";
            }
        }

        public function borrar_tipo_pago($codigo)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "DELETE FROM tipo_pago WHERE id_tipo_pago=:id_tipo_pago";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_tipo_pago', $codigo);
            $resultado->execute();
        }

        public function actualizar_pedido($codigo, $descripcion, $estado)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE tipo_pago SET descripcion=:descripcion, estado=:estado WHERE id_tipo_pago=:id_tipo_pago";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_tipo_pago', $codigo);
            $resultado->bindParam(':descripcion', $descripcion);
            $resultado->bindParam(':estado', $estado);
            if (!$resultado) {
                return "error al crear el registro";
            } else {
                $resultado->execute();

                return "registro exitoso!!";
            }
        }

    

        public function buscar_productos()
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM productos";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }



    }

    class carrito{
        public function agregar($codigo, $descripcion, $estado)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO tipo_pago (
            id_tipo_pago,
            descripcion,
            estado
            ) VALUES (:id_tipo_pago,:descripcion,:estado)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_tipo_pago', $codigo);
            $resultado->bindParam(':descripcion', $descripcion);
            $resultado->bindParam(':estado', $estado);
            }
    }   

 
?>    
  