<?php

$txtID          =   $_GET['txtID'];
$lista_platos   =   ControladorPlatillos::ctrPlatillos_editar($txtID); 

?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> 
            <div class="card">
                <div class="card-header">
                   Editar Plato
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="foto_actual" value="<?php echo $lista_platos[0]['foto_platos'] ?>">
                    <input type="hidden" name="id" value="<?php echo $txtID  ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="<?php echo $lista_platos[0]['nombre_platos'];?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" name="desc" id="desc" aria-describedby="helpId" placeholder="" value="<?php echo $lista_platos[0]['descripcion_platos'];?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Precio:</label>
                            <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="" value="<?php echo $lista_platos[0]['precio_platos'];?>">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto actual:</label>
                            <?php if (!empty($lista_platos[0]['foto_platos'])) { ?>
                                <div class="mb-2">
                                    <img src="views/dist/images/conf_platos/<?php echo $lista_platos[0]['foto_platos']; ?>" style="width: 150px; height: auto;">
                                </div>
                            <?php } else { ?>
                                <p>No hay imagen disponible.</p>
                            <?php } ?>
                            <label for="foto" class="form-label">Subir nueva foto:</label>
                            <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <?php
                            $respuesta  = new ControladorPlatillos();
                            $respuesta -> editarPlatilloSeleccionado();

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if ($respuesta) {
                                    // Redirige a otra página si la respuesta es exitosa
                                    header('Location: index.php?ruta=conf_platos_principal');
                                    exit(); // Importante para detener la ejecución
                                } else {
                                    // Mantiene la misma página y muestra un error
                                    echo "<p style='color: red;'>Error al crear la bebida. Inténtalo nuevamente.</p>";
                                }
                            }
                        ?>
                        <a name="" id="" class="btn btn-danger" href="index.php?ruta=conf_platos_principal" role="button">Cancelar</a>
                    </form>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </div>
    </div>
</div>

