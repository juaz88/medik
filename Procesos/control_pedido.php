<?php 
  
  
  include ("../conexion/conexion.php");
 
    class pedido{


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

        public function buscar_pedidos()
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM pedidos";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetchAll();
            return $lista;

        }

        public function actualizar_estado($cod_pedido,$estado_pedido)
        {
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE pedidos SET estado=(:estado_pedido) WHERE cod_pedido=(:cod_pedido)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_pedido',$cod_pedido);
            $resultado->bindParam(':estado_pedido',$estado_pedido);
            $resultado->execute();
           
            

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
        public function crear_carrito($estado)
        {

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO carrito (
            estado
            ) VALUES (:estado)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':estado', $estado);
            $resultado->execute();
           

        }


        
        public function validar_ult_carrito(){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT * FROM carrito WHERE (SELECT MAX(cod_carrito) FROM carrito) = cod_carrito ";
            $resultado = $conexion->prepare($sentencia);
            
            $resultado->execute();
            $lista = $resultado->fetch();
            if (!$lista){
                return "sin carrito";

            }else{
                return $lista;
            }
           

        } 

        public function agregar_a_carrito($cod_carrito,$cod_producto,$cantidad,$valor){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia =  "INSERT INTO carrito_producto (cod_carrito,cod_producto,cantidad,valor) VALUES (:cod_carrito,:cod_producto,:cantidad,:valor)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->bindParam(':cantidad',$cantidad);
            $resultado->bindParam(':valor', $valor);
            $resultado->execute();

        }

        public function contar_carrito_producto($cod_carrito,$cod_producto){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "SELECT count(*) FROM carrito_producto WHERE cod_carrito=(:cod_carrito) and cod_producto=(:cod_producto) ";
           
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->execute();
            $count = $resultado->fetchColumn();
            return $count;

        }

        public function actualizar_carrito($cod_carrito,$cod_producto,$cantidad,$valor){
            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "UPDATE carrito_producto SET cantidad=(:cantidad), valor=(:valor) WHERE cod_carrito=(:cod_carrito) and cod_producto=(:cod_producto)  ";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->bindParam(':cod_producto',$cod_producto);
            $resultado->bindParam(':cantidad',$cantidad);
            $resultado->bindParam(':valor', $valor);
            $resultado->execute();
                     
        }

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

        public function carrito_cancelar($cod_carrito){

            $modelo = new Db();
            $conexion = $modelo->conectar();
            $sentencia = "DELETE FROM carrito_producto WHERE cod_carrito=(:cod_carrito)";
            $resultado = $conexion->prepare($sentencia);
            $resultado->bindParam(':cod_carrito', $cod_carrito);
            $resultado->execute();
            

        }

      







    }   

 
?>    
  