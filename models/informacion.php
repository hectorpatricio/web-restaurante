<?php 

require_once "conexion.php";

class Informacion extends Conexion{

	static public function vistaInformacionModel($tabla, $codigoMesa)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigoVerificador_orden = $codigoMesa AND vigencia_orden = 1");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}
}