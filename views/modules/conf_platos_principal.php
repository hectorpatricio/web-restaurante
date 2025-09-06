<?php
    $lista_colaboradores = ControladorPlatillos::ctrPlatillos(); 
?>

<?php
    if (isset($_GET['txtID'])) 
    {
        $id_plato = $_GET['txtID'];
        $usaurio = new ControladorPlatillos();
        $usaurio->eliminarPlatilloSeleccionado($id_plato);
        header("Location: index.php?ruta=conf_platos_principal"); 
        exit(); 
    }
?>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Configuración (Platillos)</h5>
                    <a href="index.php?ruta=conf_platos_crear" class="btn btn-success">Agregar Registro</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Foto</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($lista_colaboradores as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $value['id_platos']; ?></td>
                                        <td>
                                            <img src="views/dist/images/conf_platos/<?= $value['foto_platos']; ?>" 
                                                 alt="Imagen de <?php echo $value['foto_platos']; ?>" 
                                                 style="width: 100px; height: auto;">
                                        </td>
                                        <td><?php echo $value['nombre_platos']; ?></td>
                                        <td><?php echo $value['descripcion_platos']; ?></td>
                                        <td><?php echo $value['precio_platos']; ?></td>
                                        <td><?php echo $value['foto_platos']; ?></td>
                                        <td>
                                            <a href="index.php?ruta=conf_platos_editar&txtID=<?php echo $value['id_platos']; ?>" class="btn btn-primary">Editar</a>
                                        </td>

                                        <td>
                                            <a href="index.php?ruta=conf_platos_principal&txtID=<?php echo $value['id_platos']; ?>" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </div>
    </div>
</div>
