<?php
    $lista_colaboradores = ControladorBebidas::ctrBebidas(); 
?>

<?php
    if (isset($_GET['txtID'])) 
    {
        $id_bebidas = $_GET['txtID'];
        $usaurio = new ControladorBebidas();
        $usaurio->eliminarBebidasSeleccionado($id_bebidas);
        header("Location: index.php?ruta=conf_bebidas_principal"); 
        exit(); 
    }
?>

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Configuración (Bebidas)</h5>
                    <a href="index.php?ruta=conf_bebidas_crear" class="btn btn-success">Agregar Registro</a>
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
                                        <td><?php echo $value['id_bebidas']; ?></td>
                                        <td>
                                            <img src="views/dist/images/conf_bebidas/<?= $value['foto_bebidas']; ?>" 
                                                 alt="Imagen de <?php echo $value['foto_bebidas']; ?>" 
                                                 style="width: 100px; height: auto;">
                                        </td>
                                        <td><?php echo $value['nombre_bebidas']; ?></td>
                                        <td><?php echo $value['descripcion_bebidas']; ?></td>
                                        <td><?php echo $value['precio_bebidas']; ?></td>
                                        <td><?php echo $value['foto_bebidas']; ?></td>
                                        <td>
                                            <a href="index.php?ruta=conf_bebidas_editar&txtID=<?php echo $value['id_bebidas']; ?>" class="btn btn-primary">Editar</a>
                                        </td>

                                        <td>
                                            <a href="index.php?ruta=conf_bebidas_principal&txtID=<?php echo $value['id_bebidas']; ?>" class="btn btn-danger">Eliminar</a>
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
