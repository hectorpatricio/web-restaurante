<?php
$id_cliente = $_GET['cliente'];
$usuario    = ControladorUsuarios::ctrlPerfilUsuario($id_cliente);

$perfil     = ControladorUsuarios::ctrMostrarPerfil();
// $estado     = ControladorReporte::ctrMostrarEstadoReportes();
// show_var($usuario);exit;
?>

<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Historial de Reportes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">Historial de Reportes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Reportes Realizados por usuarios</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gy-4">
                            <div class="col-md-12">

                                <form method="POST" novalidate>
                                    <input type="hidden" name="id" value="<?= $usuario[0]['id'] ?>">
                                    <div class="row gy-3">
                                        <!-- ID Usuario (RUT) -->
                                        <div class="col-md-4 mt-4">
                                            <label for="id_usuario" class="form-label">RUT</label>
                                            <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="<?= formatRutChile($usuario[0]['rut']) ?>" required oninput="formatearRut(this)">
                                        </div>
                                        <!-- Nombre -->
                                        <div class="col-md-4 mt-4">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario[0]['nombre'] ?>" required>
                                        </div>
                                        <!-- Apellido Paterno -->
                                        <div class="col-md-4 mt-4">
                                            <label for="paterno" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="paterno" name="paterno" value="<?= $usuario[0]['paterno'] ?>" required>
                                        </div>
                                        <!-- Apellido Materno -->
                                        <div class="col-md-4 mt-4">
                                            <label for="materno" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="materno" name="materno" value="<?= $usuario[0]['materno'] ?>" required>
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-4 mt-4">
                                            <label for="email" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $usuario[0]['email'] ?>" required>
                                        </div>

                                        <!-- Teléfono -->
                                        <div class="col-md-4 mt-4">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="number" class="form-control" id="telefono" name="telefono" value="<?= $usuario[0]['telefono'] ?>" required>
                                        </div>
                                        <!-- Dirección -->
                                        <div class="col-md-4 mt-4">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $usuario[0]['direccion'] ?>" required>
                                        </div>
                                        <!-- Perfil -->
                                        <div class="col-md-4 mt-4">
                                            <label for="id_perfil" class="form-label">Perfil</label>
                                            <select class="form-control" id="id_perfil" name="id_perfil" required>
                                                <option value="" selected disabled>Seleccione Perfil</option>
                                                <!-- Opciones de perfil -->
                                                <?php
                                                foreach ($perfil as $key => $value) {
                                                    echo '<option value="' . $value["id_perfil"] . '" ' . ($value["id_perfil"] == $usuario[0]['id_perfil'] ? 'selected' : '') . '>' . primeraLetra($value["des_perfil"]) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Contraseña -->
                                        <div class="col-md-4 mt-4">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <input class="form-control" id="pass1" type="password" minlength="6">
                                        </div>
                                        <!-- Confirmar Contraseña -->
                                        <div class="col-md-4 mt-4">
                                            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                                            <input class="form-control" id="pass2" type="password" name="password" onkeyup="checkPass(); return false;">
                                            <span id="confirmMessage" class="confirmMessage"></span>
                                            <input type="hidden" name="passwordActual" value="<?= $usuario[0]['password'] ?>">
                                        </div>
                                       
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary p-2" id="enviar">Editar Perfil</button>
                                    </div>
                                    <?php
                                        $suaurio  = new ControladorUsuarios();
                                        $suaurio->ctrActualizaUsuario();
                                    ?>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>