<?php 

require_once "conexion.php";

class Usuarios extends Conexion{


	static public function vistaUsuariosModel($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT
				id,
				id_usuario,
    			CONCAT(u.id_usuario, '-', u.digito_rut) AS rut,
				CONCAT(u.nombre, ' ', u.paterno, ' ', u.materno) AS nombre_completo,
				u.email,
				u.telefono,
                u.direccion,
				p.id_perfil,
                p.des_perfil
			FROM $tabla u
				INNER JOIN perfil p ON p.id_perfil = u.id_perfil
			WHERE  u.activo = 1");
			

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();


	}

	static public function vistaPerfilUsuarioModel($tabla, $id_cliente){

		$stmt = Conexion::conectar()->prepare("
		SELECT
				id,
				id_usuario,
    			CONCAT(u.id_usuario, '', u.digito_rut) AS rut,
				u.nombre, 
				u.paterno, 
				u.materno,
				u.email,
				u.telefono,
                u.direccion,
				u.id_perfil,
                p.des_perfil,
				u.password,
				u.activo 
			FROM $tabla u
				INNER JOIN perfil p ON p.id_perfil = u.id_perfil
			WHERE id = $id_cliente
			AND  u.activo = 1");
		// show_var($stmt);exit;
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

	}

	// perfil 
	static public function mdlMostrarPerfil($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_perfil, des_perfil FROM $tabla WHERE activo = 1");
		$stmt->execute();
		$resultados = $stmt->fetchAll();
		$stmt = null; // Aquí liberamos la instancia de PDOStatement
		return $resultados;
	}


	static public function registroUsuariosModel($datosModel, $tabla){

		// Preparar la consulta SQL
		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla (id_usuario, digito_rut, nombre, paterno, materno, email, password, telefono, direccion)
			 VALUES (:id_usuario, :digito_rut, :nombre, :paterno, :materno, :email, :password, :telefono, :direccion)"
		);
	
		// Bindear los parámetros a la consulta SQL
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":digito_rut", $datosModel["digito_rut"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $datosModel["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $datosModel["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR); // Asegúrate de encriptar la contraseña
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
	
		// Ejecutar la consulta
		if($stmt->execute()){
			return "success"; // Si la consulta fue exitosa
		} else {
			return "error"; // Si hubo un error
		}
	
		// Cerrar la sentencia
		$stmt->close();
	}
	

	

	static public function mdlActualizaUsuario($datosModel, $tabla) {
		$stmt = Conexion::conectar()->prepare("
			UPDATE $tabla 
			SET id_usuario = :id_usuario, 
				digito_rut = :digito_rut,
				nombre = :nombre, 
				paterno = :paterno, 
				materno = :materno, 
				email = :email, 
				telefono = :telefono, 
				direccion = :direccion, 
				id_perfil = :id_perfil, 
				password = :password
			WHERE id = :id
		");
	
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_usuario", $datosModel["id_usuario"], PDO::PARAM_INT);
		$stmt->bindParam(":digito_rut", $datosModel["digito_rut"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $datosModel["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $datosModel["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_perfil", $datosModel["id_perfil"], PDO::PARAM_INT);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
	
		return $stmt->execute() ? "success" : "error";
	}
	

	static public function mdlEmailUsuario($datosModel, $tabla){
		// Preparar la consulta
		$stmt = Conexion::conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
	
		// Vincular el parámetro correcto
		$stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
	
		// Ejecutar la consulta
		$stmt->execute();
	
		// Obtener el resultado
		$resultado = $stmt->fetch();
	
		// Cerrar el cursor
		$stmt->closeCursor();
	
		// Retornar el resultado
		return $resultado;
	
		// Liberar recursos
		$stmt = null;
	}

	static public function mdlRutUsuario($datosModel, $tabla){
		// Preparar la consulta
		$stmt = Conexion::conectar()->prepare("SELECT id_usuario FROM $tabla WHERE id_usuario = :id_usuario");
	
		$stmt->bindParam(":id_usuario", $datosModel, PDO::PARAM_STR);
		$stmt->execute();
		$resultado = $stmt->fetch();
		$stmt->closeCursor();
		return $resultado;
		$stmt = null;
	}

	



}