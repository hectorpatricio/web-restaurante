<?php
    $usuario = ControladorUsuarios::vistaUsuarios(); 
?>

<style>
/* Evitar scroll horizontal en toda la página */
body {
    overflow-x: hidden;
}

/* Ajuste de filas y columnas para que no generen overflow */
.pc-content .row {
    margin-left: 0;
    margin-right: 0;
}

.pc-content .col-md-12 {
    overflow-x: hidden;
}
</style>

<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row gy-4">
                <div class="col-md-12">
                    
                <div class="d-flex justify-content-center mt-3">
                                    <div style="width: 100%; max-width: 1200px;"> <!-- ancho máximo para que no se estire demasiado -->
                                        <table id="example" class="table table-striped text-center table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Direccion</th>
                                                    <th>Perfil</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($usuario as $key => $value) { 
                                                $badgeClasses = [
                                                    1 => 'rounded-pill text-bg-success',
                                                    2 => 'rounded-pill text-bg-primary',
                                                    'default' => 'rounded-pill text-bg-info',
                                                ];
                                                $estadoClass = $badgeClasses[$value["id_perfil"]] ?? $badgeClasses['default'];
                                                $perfil = "<span class='badge {$estadoClass}'>{$value["des_perfil"]}</span>";
                                            ?>
                                                <tr>
                                                    <td><?= $value["nombre_completo"]?></span></td>
                                                    <td><?= $value["rut"]?></td>
                                                    <td><?= $value["email"]?></td>
                                                    <td><?= $value["telefono"]?></td>
                                                    <td><?= $value["direccion"]?></td>
                                                    <td><?= ucfirst($value["des_perfil"])?></td>
                                                    <td>
                                                        <a href="index.php?ruta=usuarioDetalle&cliente=<?= $value['id'] ?>" 
                                                        class="btn btn-primary btn-sm" 
                                                        data-original-title="Editar" 
                                                        data-bs-toggle="tooltip" 
                                                        data-bs-placement="bottom" 
                                                        title="Ver detalles">
                                                            <i class="ti ti-eye"></i> Modificar
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div> 
                                </div>









                </div>
            </div>
        </div>
    </div>
</div>
