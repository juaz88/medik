<?php
class InventarioProducto {
  private $pdo;
  
  public function __construct() {
    require_once '../conexion/conexion.php';
    try {
      $this->pdo = Db::conectar();
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function obtenerTodos() {
    try {
      /*$busqueda=$_POST['busqueda'];*/
      $sql = "select * from tipo_producto where id_estado = 1";
      $prep = $this->pdo->prepare($sql);
      $prep->execute();
      return $prep->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  public function obtenerPago() {
    try {
      /*$busqueda=$_POST['busqueda'];*/
      $sql = "select * from tipo_pago where id_estado = 1";
      $prep = $this->pdo->prepare($sql);
      $prep->execute();
      return $prep->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  /*public function agregar($inventario) {
    try {
      $sql = "insert into inventario (cod_empleado, apellidos, nombres, ref_laptop, serial_laptop, serial_mouse, ref_diadema, site) values (?, ?, ?, ?, ?, ?, ?, ?)";
      $this->pdo->prepare($sql)->execute(array(
		  
          $inventario->getCod_empleado(),
          $inventario->getApellidos(),
          $inventario->getNombres(),
          $inventario->getRef_laptop(),
          $inventario->getSerial_laptop(),
          $inventario->getSerial_mouse(),
		  $inventario->getRef_diadema(),
		  $inventario->getSite()
      ));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }*/
  
    public function obtenerPorCodigo($cod_tipo_producto) {
    try {
      $sql = "select * from tipo_producto where cod_tipo_producto = ?";
      $prep = $this->pdo->prepare($sql);
      $prep->execute(array($cod_tipo_producto));
      return $prep->fetch(PDO::FETCH_OBJ);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
  
  public function modificar($tipo_producto) {
    try {
      $sql = "update tipo_producto set descripcion_producto = ?, id_estado = ? where cod_tipo_producto = ?";
      $this->pdo->prepare($sql)->execute(array(
            $marca->getDescripcion_producto(),
            $marca->getId_estado(),
            $marca->getCod_tipo_producto()

      ));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  public function eliminar($cod_tipo_producto) {
    try {
      $sql = "update tipo_producto set id_estado = 2 where cod_tipo_producto = ?";
      $prep = $this->pdo->prepare($sql);
      $prep->execute(array($cod_tipo_producto));
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
}