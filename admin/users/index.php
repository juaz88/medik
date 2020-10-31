<?php
$page_title = 'Usuarios';
require_once('../../config/load.php');
if (!$session->isUserLoggedIn(true)) {
    redirect('index.php', false);
}
if (isset($_POST['modal']) && !empty($_POST['modal'])) {
    $result = array();
    $id = (int)$_POST['id'];

    $name = remove_junk($db->escape($_POST['name']));
    $lastName = remove_junk($db->escape($_POST['last_name']));
    $second_surname = remove_junk($db->escape($_POST['second_surname']));
    $birthdate = remove_junk($db->escape($_POST['birthdate']));
    $phone = remove_junk($db->escape($_POST['telephone']));
    $email = remove_junk($db->escape($_POST['email']));
    $password = remove_junk($db->escape($_POST['password']));
    $address = remove_junk($db->escape($_POST['address']));
    $birthdate = ($birthdate==NULL ? "NULL" : "'$birthdate'");
    if ($id === 0) {
        $password = sha1(md5($password));
       
        $sql = "INSERT INTO users (name, last_name, second_surname, address, cell_phone, birthdate, email , password) 
        VALUES ('{$name}', '{$lastName}', '{$second_surname}', '{$address}', '{$phone}', {$birthdate}, '{$email}', '{$password}')";
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
        echo $result;
        exit();
    } else {

        $conditional = !empty($password) ? ", password='" . sha1(md5($password)) . "'" : " ";
        $sql = "UPDATE users SET name='{$name}', last_name='{$lastName}', second_surname='{$second_surname}', address='{$address}',
             cell_phone='{$phone}', birthdate={$birthdate}, email='{$email}' {$conditional} WHERE id={$db->escape($id)}";
        $result = $db->query($sql);
        if ($result) {
            $result = json_encode(array(
                "estatus" => true,
                "message" => "Usuario guardado",
                "type" => "success",
                "date" => date('Y-m-d H:i:s'),
                "data" => json_decode($result)
            ));
        } else {
            $result = json_encode(array(
                "estatus" => false,
                "message" => 'Error al actualizar usuario',
                "type" => "info",
                "date" => date('Y-m-d H:i:s'),
                "data" => ""
            ));
        }
        echo $result;
        exit();
    }
} else if (isset($_REQUEST['delete']) && !empty($_REQUEST['delete'])) {
    $today = date('Y-m-d H:i:s');
    $id = (int)$_REQUEST['id'];
    $sql = "UPDATE users SET active=0 WHERE id={$db->escape($id)}";
    $result = $db->query($sql);
    if ($result) {
        $result = json_encode(array(
            "estatus" => true,
            "message" => "Usuario desactivado",
            "type" => "success",
            "date" => date('Y-m-d H:i:s'),
            "data" => array()
        ));
        echo $result;
        exit();
    } else {
        $result = json_encode(array(
            "estatus" => false,
            "message" => 'Error al desactivar al usuario',
            "type" => "info",
            "date" => date('Y-m-d H:i:s'),
            "data" => array()
        ));
        echo $result;
        exit();
    }
} else if (isset($_REQUEST['active']) && !empty($_REQUEST['active'])) {
    $today = date('Y-m-d H:i:s');
    $id = (int)$_REQUEST['id'];
    $sql = "UPDATE users SET active=1 WHERE id={$db->escape($id)}";
    $result = $db->query($sql);
    if ($result) {
        $result = json_encode(array(
            "estatus" => true,
            "message" => "Usuario activado",
            "type" => "success",
            "date" => date('Y-m-d H:i:s'),
            "data" => array()
        ));
        echo $result;
        exit();
    } else {
        $result = json_encode(array(
            "estatus" => false,
            "message" => 'Error al activar al usuario',
            "type" => "info",
            "date" => date('Y-m-d H:i:s'),
            "data" => array()
        ));
        echo $result;
        exit();
    }
}

$users = find_all('users');
?>
<?php include_once('../../' . HEADER); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . 'home' ?>">Inicio</a></li>
                        <li class="breadcrumb-item">Configuracion</li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tblUsers" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Estatus</th>
                                        <th class="text-right">
                                            <a href="#" id="nuevo" name="nuevo" class="btn btn-sm btn-primary nuevo"><i class="fa fa-plus"></i> Nuevo</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['name'] . '' . $value['last_name'] . ' ' . $value['second_surname'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td><?= $value['cell_phone'] ?></td>
                                            <td><?= $value['address'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($value['active']) {
                                                ?>
                                                    <span class="right badge badge-success">Activo</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="right badge badge-danger">Inactivo</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($value['active']) {
                                                ?>
                                                    <a href="javascript:void(0)" data-user="<?= htmlspecialchars(json_encode($value), ENT_QUOTES, 'UTF-8') ?>" data-id="<?= $value['id'] ?>" class="btn btn-sm btn-success edit"><i class="fa fa-edit"></i> Editar</a>
                                                    <a href="javascript:void(0)" data-id="<?= $value['id'] ?>" class="btn btn-sm btn-danger cancel"><i class="fa fa-trash"></i> Desactivar</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="javascript:void(0)" data-id="<?= $value['id'] ?>" class="btn btn-sm btn-warning active"><i class="far fa-check-square"></i> Activar</a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title  title-modal"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="UserForm" method="POST">
                        <input type="hidden" name="id" id="id" value="0">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Paterno</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellido paterno" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido Materno</label>
                                        <input type="text" name="second_surname" id="second_surname" class="form-control" placeholder="Apellido materno" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" name="address" id="address" maxlength="100" class="form-control" placeholder="Dirección">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="tel" name="telephone" id="telephone" maxlength="10" class="form-control" placeholder="Teléfono">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha Cumpleaños</label>
                                        <input type="date" name="birthdate" id="birthdate" maxlength="10" class="form-control" placeholder="Teléfono">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required>
                                        <div class="text-muted">El correo funciona como usuario para iniciar sesión</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" autocomplete="off">
                                        <div class="text-muted hide_new">La contraseña solo se modificara si escribes algo.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" id="modal" name="modal" value="modal">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button id="btnSave" name="btnSave" value="btnSave" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include_once('../../' . FOOTER); ?>
<script>
    $("#tblUsers").DataTable({
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
    });

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

    $('.edit').on('click', function(e) {
        e.preventDefault();
        let _id = $(this).data('id');
        let _data = $(this).data('user');
        $('.hide_new').show();
        $('.title-modal').html('Editar usuario');
        $('#id').val(_data.id);
        $('#name').val(_data.name)
        $('#email').val(_data.email)
        $('#last_name').val(_data.last_name);
        $('#second_surname').val(_data.second_surname);
        $('#address').val(_data.address);
        $('#birthdate').val(_data.birthdate);
        $('#telephone').val(_data.cell_phone);

        $('#modal-default').modal('show');

    });

    $('#nuevo').on('click', function(e) {
        e.preventDefault();
        $('.title-modal').html('Nuevo usuario');
        $('.hide_new').hide();
        $('#id').val(0);
        $('#name').val('')
        $('#email').val('')
        $('#last_name').val('');
        $('#second_surname').val('');
        $('#address').val('');
        $('#birthdate').val('');
        $('#telephone').val('');
        $('#password').prop('required', true)
        $('#modal-default').modal('show');
    });

    $('.cancel').on('click', function(e) {
        e.preventDefault();
        let _id = $(this).data('id');
        Swal.fire({
            title: 'Estas seguro?',
            text: "No puedes revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar!',
            cancelButtonText: 'No, Cancelar!'
        }).then((result) => {
            if (result.value) {
                cancel(_id).then(response => {
                    let r = JSON.parse(response)
                    if (r.estatus) {
                        Swal.fire({
                            title: 'Cancelado!',
                            text: r.message,
                            type: 'success'
                        }).then(() => {
                            location.reload()
                        })
                    } else {
                        Swal.fire('error', r.message, r.type);
                    }
                }).catch(error => console.log(error))

            }
        })
    });

    $('.active').on('click', function(e) {
        e.preventDefault();
        let _id = $(this).data('id');
        Swal.fire({
            title: 'Estas seguro?',
            text: "No puedes revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Continuar!',
            cancelButtonText: 'No, Cancelar!'
        }).then((result) => {
            if (result.value) {
                active(_id).then(response => {
                    let r = JSON.parse(response)
                    if (r.estatus) {
                        Swal.fire({
                            title: 'Activado!',
                            text: r.message,
                            type: 'success'
                        }).then(() => {
                            location.reload()
                        })
                    } else {
                        Swal.fire('error', r.message, r.type);
                    }
                }).catch(error => console.log(error))

            }
        })
    })

    $('#UserForm').on('submit', function(e) {
        e.preventDefault();

        let _id = $('#id').val();
        let _data = $(this).serialize();
        let name = $('#name').val();
        let email = $('email').val();
        let password = $('#password')
        if (_id == 0) { //is new
            if (name == '' || email == '' || password == '') {
                toastr.error('(*) Campos requeridos');
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
        } else { // is edit

            if (name == '' || email == '') {
                toastr.error('(*) Campos requeridos');
                return false;
            }
            edit(_data).then(response => {
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
        }

    })

    const edit = function(data) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '<?= BASE_URL . "/admin/users/index.php" ?>',
                method: 'post',
                type: 'json',
                data: data
            }).done(resolve).fail(reject)
        });
    }

    const add = function(data) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '<?= BASE_URL . "/admin/users/index.php" ?>',
                method: 'post',
                type: 'json',
                data: data
            }).done(resolve).fail(reject)
        });
    }

    const cancel = function(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '<?= BASE_URL . "/admin/users/index.php" ?>',
                method: 'post',
                type: 'json',
                data: {
                    id: id,
                    delete: 'delete'
                }
            }).done(resolve).fail(reject)
        });
    }

    const active = function(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '<?= BASE_URL . "/admin/users/index.php" ?>',
                method: 'post',
                type: 'json',
                data: {
                    id: id,
                    active: 'active'
                }
            }).done(resolve).fail(reject)
        });
    }
</script>