<?php 

require_once "conexion.php";

class Platillos extends Conexion{

	static public function vistaPlatillosModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE vigencia_platos = 1 AND id_platos > 0");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();
	}

	static public function vistaPlatillosEditarModel($tabla,$txtID)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE `id_platos` = $txtID AND vigencia_platos = 1");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();
	}

	static public function EditarPlatillosEditarModel($tabla, $datos) {
		// Preparar la consulta SQL para insertar datos en la tabla especificada
		// $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, id_perfil, id_sexo, digito_rut, nombres, paterno, materno, email, id_region, id_provincia, id_comuna, direccion, telefono, telefono2, nacimiento, observaciones, avatar, password) VALUES (:id_usuario, :id_perfil, :id_sexo, :digito_rut, :nombres, :paterno, :materno, :email, :id_region, :id_provincia, :id_comuna, :direccion, :telefono, :telefono2, :nacimiento, :observaciones, :avatar, :password)");
		$stmt = Conexion::conectar()->prepare(
			            "	UPDATE $tabla
							SET 
								`nombre_platos` = :nombre,
								`descripcion_platos` = :desc,
								`precio_platos` = :precio,
								`foto_platos` = :foto
							WHERE 
								`id_platos` = :id"
			        );
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":desc", $datos["desc"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	static public function eliminarPlatillosEditarModel($tabla, $datos) {
		
		$stmt = Conexion::conectar()->prepare("	UPDATE 
													$tabla
												SET 
													`vigencia_platos` = 0
												WHERE 
													`id_platos` = $datos");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	static public function crearPlatillosEditarModel($tabla, $datos) {
		
		$stmt = Conexion::conectar()->prepare("	INSERT INTO `tbl_platos`(`nombre_platos`, `descripcion_platos`, `precio_platos`, `foto_platos`) 
												VALUES (:nombre,:desc,:precio,:foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":desc", $datos["desc"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}
}