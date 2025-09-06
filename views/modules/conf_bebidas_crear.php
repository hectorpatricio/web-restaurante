<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> <!-- Ajusta el tamaño de la tarjeta aquí -->
            <div class="card">
                <div class="card-header">
                   Agregar Bebidas
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="desc" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" name="desc" id="desc" required>
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="text" class="form-control" name="precio" id="precio" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto:</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>

                        <button type="submit" class="btn btn-primary">Crear</button>
                        <a name="" id="" class="btn btn-danger" href="index.php?ruta=conf_bebidas_principal" role="button">Cancelar</a>
                    </form>

                    <!-- Procesamiento del formulario -->
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $suaurio = new ControladorBebidas();
                            $respuesta = $suaurio->crearBebidasSeleccionado();

                            if ($respuesta) {
                                // Redirige a otra página si la respuesta es exitosa
                                header('Location: index.php?ruta=conf_bebidas_principal');
                                exit(); // Importante para detener la ejecución
                            } else {
                                // Mantiene la misma página y muestra un error
                                echo "<p style='color: red;'>Error al crear la bebida. Inténtalo nuevamente.</p>";
                            }
                        }
                    ?>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </div>
    </div>
</div>
