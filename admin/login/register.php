<?php
ob_start();
require_once('../../config/load.php');

if (isset($_POST['register']) && $_POST['register'] === 'register') {
    $name = remove_junk($db->escape($_POST['name']));
    $email = remove_junk($db->escape($_POST['email']));
    $password = remove_junk($db->escape($_POST['password']));

    if (!empty($name) && !empty($email) && !empty($password)) {
        $password = sha1(md5($password));
        $sql = "INSERT INTO users (name, last_name, second_surname, address, cell_phone, birthdate, email , password) 
        VALUES ('{$name}', '', '', '', '', null, '{$email}', '{$password}')";
        if ($db->query($sql)) {
            $result = json_encode(array(
                "estatus" => true,
                "message" => "Usuario Guardado",
                "type" => "success",
                "date" => date('Y-m-d H:i:s'),
                "data" => $_POST
            ));
        } else {
            $result = json_encode(array(
                "estatus" => false,
                "message" => 'Error al guardar usuario!',
                "type" => "info",
                "date" => date('Y-m-d H:i:s'),
                "data" => ""
            ));
        }
    } else {
        $result = json_encode(array(
            "estatus" => false,
            "message" => 'Completa los campos!',
            "type" => "info",
            "date" => date('Y-m-d H:i:s'),
            "data" => ""
        ));
    }
    echo $result;
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medik | Página de registro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/adminLTE/plugins/toastr/toastr.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="/">
                <img width="100px" src="<?= BASE_URL ?>/uploads/Logo/logo.png">
                <b>Medik</b>
            </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrarse</p>
                <form id="UserForm" action="<?= BASE_URL ?>/admin/login/register" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Correo eléctronico" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirmar contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="register" id="register" value="register">
                            <button id="save" name="save" type="button" class="btn btn-primary btn-block">Registrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
            <div class="card-footer">
                <a href="<?= BASE_URL ?>/admin/login/index" class="text-center">Ya tengo una cuenta</a>
            </div>
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= BASE_URL ?>/assets/adminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE_URL ?>/assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE_URL ?>/assets/adminLTE/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= BASE_URL ?>/assets/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?= BASE_URL ?>/assets/adminLTE//Plugins/toastr/toastr.min.js"></script>
    <script>
        $(function() {
            //Initialize toastr
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            $('#save').on('click', function(e) {
                e.preventDefault();

                let _data = $('#UserForm').serialize();
                let name = $('#name').val();
                let email = $('email').val();
                let password = $('#password')

                if (name == '' || email == '' || password == '') {
                    toastr.error('Todos los campos son requeridos');
                    return false;
                }

                add(_data).then(response => {
                    let r = JSON.parse(response);
                    if (r.estatus) {
                        Swal.fire({
                            icon: 'success',
                            text: r.message,
                            type: r.type
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire('error', r.message, r.type);
                    }
                }).catch(error => console.log(error))


            })
            var password = document.getElementById("password"),
                confirm_password = document.getElementById("confirm_password");

            function validatePassword() {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Las contraseñas no coinciden");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;

            const add = function(data) {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: '<?= BASE_URL . "/admin/login/register.php" ?>',
                        method: 'post',
                        type: 'json',
                        data: data
                    }).done(resolve).fail(reject)
                });
            }
        });
    </script>
</body>

</html>