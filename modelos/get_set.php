<?php

class Marca {
  private $cod_marca;	
  private $nombre_marca;
  private $id_estado;
  
  function __construct() {
  }
  
 function getCod_marca() {
    return $this->cod_marca;
}
  
 function getNombre_marca() {
    return $this->nombre_marca;
}

 function getId_estado() {
    return $this->id_estado;
}

 function setCod_marca($cod_marca) {
    $this->cod_marca = $cod_marca;
}

 function setNombre_marca($nombre_marca) {
    $this->nombre_marca = $nombre_marca;
}

 function setId_estado($id_estado) {
    $this->id_estado = $id_estado;
}


}