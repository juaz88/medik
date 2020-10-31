<?php include_once('../../config/load.php'); ?>
<?php
$req_fields = array('email', 'password');
validate_fields($req_fields);
$username = remove_junk($_POST['email']);
$password = remove_junk($_POST['password']);

if (empty($errors)) {
  $user_id = authenticate($username, $password);
  if ($user_id) {
    //create session with id
    $session->login($user_id);
    //Update Sign in time
    $session->msg("s", "Bienvenido a Sistema Medik.");
    redirect('/admin/home/index.php', false);
  } else {
    $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
    redirect('index.php', false);
  }
} else {
  $session->msg("d", $errors);
  redirect('index.php', false);
}

?>
