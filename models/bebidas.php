<?php 

require_once "conexion.php";

class Bebidas extends Conexion{

	static public function vistaBebidasModel($tabla)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE vigencia_bebidas = 1 AND id_bebidas > 0");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();
	}

	static public function vistaBebidasEditarModel($tabla,$txtID)
	{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE `id_bebidas` = $txtID AND vigencia_bebidas = 1");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();
	}

	static public function EditarBebidasEditarModel($tabla, $datos) {
	
		$stmt = Conexion::conectar()->prepare(
			            "	UPDATE $tabla
							SET 
								`nombre_bebidas` = :nombre,
								`descripcion_bebidas` = :desc,
								`precio_bebidas` = :precio,
								`foto_bebidas` = :foto
							WHERE 
								`id_bebidas` = :id"
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

	static public function crearBebidasEditarModel($tabla, $datos) {
		
		$stmt = Conexion::conectar()->prepare("	INSERT INTO $tabla (`nombre_bebidas`, `descripcion_bebidas`, `precio_bebidas`, `foto_bebidas`) 
												VALUES (:nombre,:desc,:precio,:foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":desc", $datos["desc"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	static public function eliminarBebidasEditarModel($tabla, $datos) {
		
		$stmt = Conexion::conectar()->prepare("	UPDATE 
													$tabla
												SET 
													`vigencia_bebidas` = 0
												WHERE 
													`id_bebidas` = $datos");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}
}