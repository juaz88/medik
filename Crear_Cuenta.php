<!doctype html>
<html lang="en">
  <head>
    <title>Crear Cuenta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

<div class="container">

	<?php

	include 'conexion/conexion.php';

	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Query to check if the email already exist
	$validarcorreo = "SELECT * FROM usuario WHERE correo = '$_POST[correo]' ";

	// Variable $result hold the connection data and the query
	$resultado = $conn-> query($validarcorreo);

	// Variable $count hold the result of the query
	$contar = mysqli_num_rows($resultado);

	// If count == 1 that means the email is already on the database
	if ($contar == 1) {
	echo "<div class='alert alert-danger mt-4' role='alert'>
					<p>Este correo ya existe en la base de datos.</p>
					<p><a href='login.html'>Por favor ingrese aquí</a></p>
				</div>";
	} else {	
	
	/*
	If the email don't exist, the data from the form is sended to the
	database and the account is created
	*/
	$cedula = $_POST['cedula'];
	$primer_apellido = $_POST['primer_apellido'];
	$segundo_apellido = $_POST['segundo_apellido'];
	$primer_nombre = $_POST['primer_nombre'];
	$segundo_nombre = $_POST['segundo_nombre'];
	$direccion = $_POST['direccion'];
	$celular = $_POST['celular'];
	$telefono = $_POST['telefono'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$id_perfil = $_POST['id_perfil'];
	$id_estado = 1;
	
	// The password_hash() function convert the password in a hash before send it to the database
	$passHash = password_hash($contrasena, PASSWORD_DEFAULT);
	
	// Query to send Name, Email and Password hash to the database
	$query = "INSERT INTO usuario (cedula, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, direccion, celular, telefono, fecha_nacimiento, correo, contrasena, cod_perfil, id_estado) 
	VALUES ('$cedula', '$primer_apellido', '$segundo_apellido', '$primer_nombre', '$segundo_nombre', '$direccion', '$celular', '$telefono', '$fecha_nacimiento', '$correo', '$passHash', '$id_perfil', '$id_estado')";

	if (mysqli_query($conn, $query)) {
		echo "<div class='alert alert-primary mt-4' role='alert'><h3>Su cuenta ha sido creada. BIENVENIDO a MEDIK</h3>
		<a class='btn btn-outline-primary' href='login.html' role='button'>Ingresar</a></div>";	
		


		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	?>
</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>