

<!doctype html>
<html lang="en">
	<head>
		<title>Ingreso</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Busca la conexion a la BD
			include 'conexion/conexion.php';	

			// Valida conexion a la BD
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Información enviada desde el formulario de login
			$correo = $_POST['correo']; 
			$contrasena = $_POST['contrasena'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT cedula, correo, contrasena, cod_perfil FROM usuario WHERE correo = '$correo'");
			
			// Variable $row contiene el resultado de la consulta a la BD
      $row = mysqli_fetch_assoc($result);
	  $num_row = mysqli_num_rows($result);
	  
			
			// Variable $hash toma la contraseña encriptada para poder ser verificada
			$hash = $row['contrasena'];
			
			/* 
			password_Verify() Función que verifica que si la contraseña ingresada por el usuario coincide con la contraseña encriptada en la base de datos
			Sí todo esta OK la sesión es creada por 1 minuto.  $_SESSION[start] para cambiar tiempo asigne un numero.
			*/
			if (password_verify($_POST['contrasena'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['start'] = 5;
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
				
			
        if ($num_row > 0) {
          $_SESSION['cedula'] = $row['cedula'];
          if ($row['cod_perfil'] == 1) {
            header('location:home.php');
          } else if ($row['cod_perfil'] == 2) {
            header('location:index2.php');
          } else if ($row['cod_perfil'] == 3) {
            header('location:Index.html');
          }
        }
			
			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>Correo o Contraseña incorrectos !
				<p><a href='login.html'><strong>Por favor intente de nuevo!</strong></a></p></div>";			
			
			}
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>