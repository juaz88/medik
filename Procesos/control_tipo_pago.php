<?php 
  
  
  include ("../conexion/conexion.php");
 
    class consultas{

        public function insertar_tipo_pago($codigo, $descripcion, $estado)
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

        public function actualizar_tipo_pago($codigo, $descripcion, $estado)
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
        public function buscar($codigo)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM tipo_pago WHERE id_tipo_pago=:id_tipo_pago";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':id_tipo_pago', $codigo);
            $resultado->execute();
            $lista = $resultado->fetch();
            return $lista;
        }

    }

  if(isset($_GET['id_tipo_pago'])){
        $cod=$_GET['id_tipo_pago'];
        $accion=$_GET['accion'];
        
        if ($accion==2){

            //   echo($cod);
            $consultas=new consultas();
            $mensaje=$consultas->borrar_tipo_pago($cod);
            header ("location: http://localhost/medik/admin/tipo_pago.php"); 
        
            
       
        } 
    }
?>    
  