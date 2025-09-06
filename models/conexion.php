<?php

class Conexion{

	static public function conectar(){

		//$link = new PDO("mysql:host=localhost;dbname=inicio_prueba","root","");
		$link = new PDO("mysql:host=localhost;port=3307;dbname=inicio_prueba", "root", "");

		$link->exec("set names utf8");

		return $link;

	}

}
