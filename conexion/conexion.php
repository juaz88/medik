<!-- Conexión BD -->
<?php
    $conn = mysqli_connect("localhost", "root", "", "medik");
    $conn -> set_charset("utf8");

    // Existe un error o fallo en la conexión
    if ($conn->connect_errno) {
        echo "Lo sentimos, este sitio web está experimentando problemas.";
        echo "Error: Fallo al conectarse a MySQL debido a: \n";
        echo "Errno: " . $conn->connect_errno . "\n";
        echo "Error: " . $conn->connect_error . "\n";
        exit;
    }else{
      //echo "Coenxión experiencehub exitosa! :D";
    }

class Db {
    public static function conectar() {
        $pdo = new PDO('mysql:host=localhost;dbname=medik;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>