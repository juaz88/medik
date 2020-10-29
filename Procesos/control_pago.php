<?php 
  
  
  include ("../conexion/conexion.php");
 
    class consultas{

        public function insertar_pago($codigo, $descripcion, $estado)
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

        public function buscar_tipos()
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM tipo_pago";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;
        }



    }

    class carrito_pago{
        public function ver_carrito($cod_carrito){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT productos.nombre_producto,cantidad,valor from carrito_producto JOIN productos ON productos.cod_producto=carrito_producto.cod_producto where carrito_producto.cod_carrito=(:cod_carrito) ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->execute();
            $lista = $resultado->fetchAll();
            if (!$lista){
                return "";

            }else{
                return $lista;
            }

        }

        public function carrito_cerrar($cod_carrito){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE carrito SET estado=0 where cod_carrito=(:cod_carrito)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam('cod_carrito',$cod_carrito);
            $resultado->execute();

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
  