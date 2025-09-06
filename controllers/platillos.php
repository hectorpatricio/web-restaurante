<?php

class ControladorPlatillos
{

    static public function ctrPlatillos()
    {
        $tabla = "tbl_platos";
        $respuesta = Platillos::vistaPlatillosModel($tabla);
        return $respuesta;
    }

    static public function ctrPlatillos_editar($txtID)
    {
        $tabla = "tbl_platos";
        $respuesta = Platillos::vistaPlatillosEditarModel($tabla,$txtID);
        return $respuesta;
    }

    static public function editarPlatilloSeleccionado()
	{
		//Genera la imagen y guarda la imagen en los archivos correspondiente. 
		//-------------------------------------------------------------------------------------------
		if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
			$nombreArchivo = $_FILES['foto']['name'];
			$rutaTemporal = $_FILES['foto']['tmp_name'];
		
			// Validar que el archivo temporal existe
			if (!file_exists($rutaTemporal)) {
				echo "El archivo temporal no existe.";
				exit();
			}
		
			// Validar que el archivo se subió correctamente
			if (!is_uploaded_file($rutaTemporal)) {
				echo "El archivo no se subió correctamente.";
				exit();
			}
		
			// Generar un nombre único para la imagen
			$fecha_foto = new DateTime();
			$nombre_foto = $fecha_foto->getTimestamp() . "_" . preg_replace('/[^A-Za-z0-9_\-.]/', '', $nombreArchivo);
		
			// Verificar y crear el directorio de destino
			$rutaDestinoDir = realpath(dirname(__FILE__) . '/../views/dist/images/conf_platos/') . "/";
			if (!is_dir($rutaDestinoDir)) {
				if (!mkdir($rutaDestinoDir, 0777, true)) {
					echo "Error al crear el directorio de destino.";
					exit();
				}
			}
		
			$rutaDestino = $rutaDestinoDir . $nombre_foto;
		
			// Mover la imagen al destino
			if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
				$foto = $nombre_foto;
			} else {
				echo "Error al mover la imagen.";
				var_dump(error_get_last());
				exit();
			}
		} else {
			// Validar errores en la carga del archivo
			if (isset($_FILES['foto']['error']) && $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
				// echo "Error al cargar el archivo: " . $_FILES['foto']['error'];
			}
		
			// Recuperar la imagen actual si no se subió una nueva
			$foto = $_POST['foto_actual'] ?? null;
		}
		//-------------------------------------------------------------------------------------------

		$datos = [
			"nombre" => $_POST['nombre'] ?? '', // Valor predeterminado si no existe
			"desc" => $_POST['desc'] ?? '',
			"precio" => $_POST['precio'] ?? 0,
			"foto" => $foto ?? '',
			"id" => $_POST['id'] ?? null,
		];
		$tabla = "tbl_platos";
		$respuesta = Platillos::EditarPlatillosEditarModel($tabla, $datos);
		return $respuesta;
	}

	static public function eliminarPlatilloSeleccionado($txtID)
	{
		$tabla = "tbl_platos";
        $respuesta = Platillos::eliminarPlatillosEditarModel($tabla,$txtID);
        return $respuesta;
	}

	static public function crearPlatilloSeleccionado()
	{
				//Genera la imagen y guarda la imagen en los archivos correspondiente. 
		//-------------------------------------------------------------------------------------------
		if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
			$nombreArchivo = $_FILES['foto']['name'];
			$rutaTemporal = $_FILES['foto']['tmp_name'];
		
			// Validar que el archivo temporal existe
			if (!file_exists($rutaTemporal)) {
				echo "El archivo temporal no existe.";
				exit();
			}
		
			// Validar que el archivo se subió correctamente
			if (!is_uploaded_file($rutaTemporal)) {
				echo "El archivo no se subió correctamente.";
				exit();
			}
		
			// Generar un nombre único para la imagen
			$fecha_foto = new DateTime();
			$nombre_foto = $fecha_foto->getTimestamp() . "_" . preg_replace('/[^A-Za-z0-9_\-.]/', '', $nombreArchivo);
		
			// Verificar y crear el directorio de destino
			$rutaDestinoDir = realpath(dirname(__FILE__) . '/../views/dist/images/conf_platos/') . "/";
			if (!is_dir($rutaDestinoDir)) {
				if (!mkdir($rutaDestinoDir, 0777, true)) {
					echo "Error al crear el directorio de destino.";
					exit();
				}
			}
		
			$rutaDestino = $rutaDestinoDir . $nombre_foto;
		
			// Mover la imagen al destino
			if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
				$foto = $nombre_foto;
			} else {
				echo "Error al mover la imagen.";
				var_dump(error_get_last());
				exit();
			}
		} else {
			// Validar errores en la carga del archivo
			if (isset($_FILES['foto']['error']) && $_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
				echo "Error al cargar el archivo: " . $_FILES['foto']['error'];
			}
		
			// Recuperar la imagen actual si no se subió una nueva
			$foto = $_POST['foto_actual'] ?? null;
		}
		//-------------------------------------------------------------------------------------------
		
		$datos = [
			"nombre" => $_POST['nombre'] ?? '', // Valor predeterminado si no existe
			"desc" => $_POST['desc'] ?? '',
			"precio" => $_POST['precio'] ?? 0,
			"foto" => $foto ?? '',
		];
		$tabla = "tbl_platos";
        $respuesta = Platillos::crearPlatillosEditarModel($tabla,$datos);
        return true;
	}


}