<?php

require_once "conexion.php";

class ModeloIngreso{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlIngresoUsuario($tabla, $item, $valor) {
		// show_var($tabla);
		// show_var($item);
		// show_var($valor);exit;
		if ($item != null) {
			$stmt = Conexion::conectar()->prepare("
			SELECT
				id_usuario,
    			CONCAT(u.id_usuario, '-', u.digito_rut) AS rut,
				u.nombre AS primer_nombres,
				CONCAT(u.nombre, ' ', u.paterno, ' ', u.materno) AS nombre_completo,
				u.email,
				u.telefono,
                u.direccion,
                u.id_perfil,
                p.des_perfil,
				u.activo,
				u.password
			FROM $tabla u
				INNER JOIN perfil p ON p.id_perfil = u.id_perfil
			WHERE u.email = :$item
			AND u.activo = 1"
			);
			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
			// show_var($stmt);exit;
			$stmt->execute();
			$result = $stmt->fetch();
			// Liberar recursos
			$stmt = null;
	
			return $result;
		}
	
		return null;
	}
	
	

	//	ACTUALIZAR INGRESO

	static public function mdlActualizarIngreso($tabla, $id_usuario) {

		// Preparar la consulta con un parámetro para evitar inyecciones SQL
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ultimo_login = SYSDATE() WHERE id_usuario = :id_usuario");
		// Vincular el parámetro de manera segura
		$stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
	
		// Ejecutar la consulta y manejar el resultado
		if ($stmt->execute()) {
			// Liberar recursos
			$stmt = null;
			return "ok";
		} else {
			// Liberar recursos
			$stmt = null;
			return "error";
		}
	}
	

}