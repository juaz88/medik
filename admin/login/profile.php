<?php
$page_title = 'Mi perfil';
require_once('../../config/load.php');
if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}
$user_id = $_SESSION['user_id'];
if (empty($user_id)) :
    redirect('index.php', false);
else :
    if (isset($_POST['saveProfile'])) {
        $name = remove_junk($db->escape($_POST['inputName']));
        $email = remove_junk($db->escape($_POST['inputEmail']));
        $password = remove_junk($db->escape($_POST['inputPassword']));
        $conditional = !empty($password) ? ", password='" . sha1(md5($password)) . "'" : " ";
        $sql = "UPDATE users SET name='{$name}', email='{$email}' {$conditional} WHERE id='{$db->escape($user_id)}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            if (!empty($password)) {
                redirect('logout');
            } else {
                $session->msg('s', "Cuenta actualizada");
                redirect('profile', false);
            }
        } else {
            $session->msg('d', ' Lo siento no se actualizó los datos.');
        }
    } else {
        $user = find_by_id('users', $user_id);
    }
endif;
?>
<?php include_once('../../' . HEADER); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil usuario</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="post" class="form-vertical" id="ProfileForm" action="profile.php" role="form">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img id="inputProfile" class="profile-user-img img-fluid img-circle" src="<?= BASE_URL ?>/uploads/profiles/profile.png" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center"><?= $user['name'] ?></h3>
                                <p class="text-muted text-center"><?= $user['email'] ?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="settings">
                                        <div> <?php echo display_msg($msg); ?> </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre" value="<?= $user['name'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Usuario</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Usuario" value="<?= $user['email'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>
                                            <div class="col-sm-10">
                                                <input id="inputPassword" name="inputPassword" type="password" class="form-control" placeholder="Contraseña" autocomplete="off">
                                                <div class="text-muted">La contraseña solo se modificara si escribes algo. Recuerda que una vez se cambie la contraseña se cierra la sesión actúal.</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button id="saveProfile" name="saveProfile" value="saveProfile" type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('../../' . FOOTER); ?>